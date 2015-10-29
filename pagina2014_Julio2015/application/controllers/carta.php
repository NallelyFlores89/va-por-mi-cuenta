<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$MAIL_BASEDIR = APPPATH."services/mail.php";
include $MAIL_BASEDIR;
class Carta extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url', 'form'));
        $this->load->library(array('session'));
        $this->load->model(array("padrinos", "apadrina_modelo", "ninos_padrinos")); //Cargando el modelo
        require_once("MPDF/mpdf.php");

    }

    function index(){
        if($this->session->userdata("is_login")==1){
            $padrino = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
            $nino = $this->ninos_padrinos->dameNinoApadrinado($this->session->userdata("idUsuario"));
            $arreglo = array(
                "padrino" =>$padrino,
                "nino" => $nino,
            );
            $this->load->view("carta", $arreglo);
        }
        else{

            $this->load->view("login", array("pag_antes" => current_url()));
        }
    }

    function creaPDF(){
        $html = $this->input->post("html");
        $nombreNino = $this->input->post("nombreNino");
        $nombrePadrino = $this->input->post("nombrePadrino");
	     $idNino = $this->input->post("idParino");
        $idPadrino = $this->input->post("idNino");
		  $nombreArchivo = $idNino."-".$idPadrino.".pdf";
        $img = $this->input->post("img");

        $cabecera = '<div><img src="http://yosoypadrinovapormicuenta.com/media/img/logovxmc.png" style="float:left">';
        $cabecera = $cabecera.'<img src="http://yosoypadrinovapormicuenta.com/media/img/logoalsea.png" style="float:right"></div><br><br>';
        $para = '<div><br> Para:'.$nombreNino.'<br><br></div>';
        $de = '<div style="text-align:center;"><br>Atte:<br>'.$nombrePadrino.'</div>';
        $footer = '<div style="position: absolute; text-align: center; width: 90%; bottom: 10px; width: 90%;"><img src="http://yosoypadrinovapormicuenta.com/media/img/'.$img.'" style="vertical-align:bottom; float:right; margin-top:-30px"></div>';
		$this->apadrina_modelo->agregaMovimiento($idPadrino, $idNino, -1, -1, "carta");
        $mpdf=new mPDF();
		  $mpdf->WriteHTML($cabecera.$para.$html.$de.$footer);
        $mpdf->Output(FCPATH.'cartas/'.$nombreArchivo,'F');
        //$mpdf->WriteHTML($cabecera.$para.$html.$de.$footer);
        //$mpdf->Output(FCPATH.'cartas/filename2.pdf','F');
        chmod(FCPATH.'cartas/filename2.pdf', 0777);
        $m = new Mail();
        $m->From("Yo soy padrino 'Va por mi cuenta'" . " <" . "anjudark89@gmail.com" . ">");
        $m->To('vapormicuenta@alsea.com.mx, alsea@deklan.net, anjudark89@gmail.com');
		  //$m->To('osvaldo172@gmail.com, alsea@deklan.net, anjudark89@gmail.com');
        $m->Subject("Nueva Carta");
        $m->attach(FCPATH.'cartas/'.$nombreArchivo);
        $m->Body("Nueva carta de $nombrePadrino");
        if($m->Send()){
            redirect("carta/cartaEnviada");
        }
        else{
            $response = "Mensaje no enviado";
        }
        echo $response;
        //$mpdf->Output();
        exit;
        return true;
    }

    function cartaEnviada(){
        $data['header']=$this->load->view("header", null, true);
        $data['footer']=$this->load->view("footer", null, true);    

        $this->load->view("carta_enviada",$data);
    }

}
?>