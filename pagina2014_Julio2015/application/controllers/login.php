<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        $this->load->helper(array('html', 'url', 'form'));
        $this->load->library(array('session','form_validation'));
        $this->load->model(array("padrinos", "apadrina_modelo")); //Cargando el modelo
    }

    function index(){
        if($this->session->userdata('is_login')==0){
            if(isset($_SERVER['HTTP_REFERER'])){
                $data['pag_antes'] = $_SERVER['HTTP_REFERER'];
            }else{
                $data['pag_antes'] = base_url()."index.php/yo_apadrino";
            }
            $this->load->view("login", $data);
        }
        else{
            redirect("yo_apadrino");
        }
    }

    function loginNormal(){
        if($this->session->userdata('is_login')==0){
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $ant = $this->input->post('pag_anterior');
            $padrino = $this->padrinos->login($email, $pass);
            if($padrino==NULL){
                $data = array (
                    "mensajeError" => "Ingresa nuevamente tu información"
                );
                $this->load->view("paso1", $data);
                return 0;
            }
            else{
                $this->guardaSesion($padrino[0]["idpadrinos"], $padrino[0]["correo"]);
                if($ant!="null"){
                    //echo $ant;
                    echo "<script>
                        window.location = '".$ant."'
                    </script>";
                }
                $data = array (
                  "mensajeError" => "Usuario y contraseña incorrectos. Por favor registra tu mail corporativo"
                );
                $this->load->view("paso1", $data);
            }
        }
        else{
            echo "ustedes ya esta logueado";
            redirect("index");
        }
    }

    function guardaSesion($id, $email){
        $this->session->set_userdata(array('is_login' => 1));
        $this->session->set_userdata(array('idUsuario'=>$id));
        $this->session->set_userdata(array('email'=>$email));
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_userdata(array('is_login' => 0));
        //$this->index();
        redirect("/login");
    }

    function paso1(){
        if($this->session->userdata('is_login')==0){
            $this->load->view("paso1");
        }else{
            redirect("apadrina/paso2");
        }
    }

    function registrar(){
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->form_validation->set_rules('email', 'Correo', 'required|email|trim');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim');
        $this->form_validation->set_message('required', 'El campo es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('paso1');
        }else{
            if($this->padrinos->existeNumEmpleado($pass)){
                if($this->padrinos->actualizaCorreoPadrino($pass, $email)){
                    $padrino = $this->padrinos->login($email, $pass);
                    $this->guardaSesion($padrino[0]["idpadrinos"], $padrino[0]["correo"]);
                }
                if($padrino[0]["padrino"]==1){
                    header ("Location:".base_url("index.php/yo_apadrino"));
                }
                else{
                    $paso2 = base_url()."index.php/apadrina";
                    echo "<script>
                            window.location = '".$paso2."'
                        </script>";
                }
            }
            else{
                echo "El padrino no existe en la base de datos. Por favor, contactar con el administrador de la página para que se te dé de alta.";
            }
        }
    }
}