<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Yo_apadrino extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();			
			$this->load->helper(array('html', 'url', 'form'));	
			$this->load->model(array("apadrina_modelo","inicio_modelo")); //Cargando el modelo
			$this->load->library(array('session','email')); //Validación de formularios
	   	}

	   	function index(){
	   		if (($this->session->userdata("is_login") == FALSE)){
			echo "<html><head><meta charset='utf-8'></head><body><script>
                window.location = '".base_url()."index.php/login'</script></body></html>";  
        	}else{
		   		$data['header']=$this->load->view("header", null, true);
		   		$data['footer']=$this->load->view("footer", null, true);
		   		$data['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
		   		if($data['padrino']['padrino'] == 1){
		   			$data['padrino']['nino_apadrinado'] = $this->apadrina_modelo->padrinos_ninos($this->session->userdata("idUsuario"));
		   			$data['cuadrosInfo']=$this->load->view("cuadrosInfo", $data, true);
		   			$this->load->view("v_panel_padrino",$data);      		
		   		}else{
		   			$this->load->view("v_panel_padrino2",$data);      		
		   		}
        	}
	   	}

	   	function apadrinar(){
			$idpadrino = $this->session->userdata("idUsuario");
	   		if($_POST != NULL){
	   			if($this->apadrina_modelo->esPadrino($idpadrino)){
	   				echo "<script>alert('Tu ya apadrinas a un niño. Para conocerlo, escribirle o aumentar tu aportación, ve a la sección “Yo apadrino a…”')</script>";
	   				$this->index();
	   			}else{
		   			$donacion = $_POST['cantidad'];
		   			$numcomidas = $donacion/35;
		   			$idnino = $_POST['idnino'];
	   				$this->apadrina_modelo->apadrinar($idnino, $idpadrino, $donacion, $numcomidas);
	   				$this->apadrina_modelo->agregaMovimiento($idpadrino,$idnino,$donacion, $numcomidas,"alta");
	   				$this->altaPadrinoEmail();
	   			}
	   		}else{
	   			echo "error";
	   		}
	   	}

	   	function gracias_padrino(){
	   		if (($this->session->userdata("is_login") == FALSE)){
			echo "<html><head><meta charset='utf-8'></head><body><script>
                window.location = '".base_url()."index.php/login'</script></body></html>";  
        	}else{
		   		$data['header']=$this->load->view("header", null, true);
		   		$data['footer']=$this->load->view("footer", null, true);
		   		$data['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
	   			$data['padrino']['nino_apadrinado'] = $this->apadrina_modelo->padrinos_ninos($this->session->userdata("idUsuario"));
	   			$data['cuadrosInfo'] = $this->load->view("cuadrosInfo", $data, TRUE);
	   			$this->load->view("bienvenidoPadrino",$data);   	
        	}
	   	}

	   	function donar_otra_cantidad(){
	   		if($_POST != NULL){
				$idpadrino = $this->session->userdata("idUsuario");
	   			if(isset($_POST['idnino'])){
	   				$data['idnino'] = $_POST['idnino'];	   				
	   			}else{
	   				$data['idnino'] = $this->apadrina_modelo->ninoXpadrino($idpadrino);
	   			}
	   			$data['idpadrino'] = $idpadrino;
	   			$data['header'] = $this->load->view("header",NULL,TRUE);
	   			$data['footer'] = $this->load->view("footer",NULL,TRUE);
		   		$data['terminoscondiciones']=$this->load->view("terminos_y_condiciones", null, true);
	   			$this->load->view("otra_cantidad", $data);
	   		}else{
	   			echo "nada";
	   		}
	   	}

	   	function cambiar_cantidad(){
	   		if($_POST != NULL){
				$idpadrino = $this->session->userdata("idUsuario");
	   			if(isset($data['idnino'])){
	   				$data['idnino'] = $_POST['idnino'];	   				
	   			}else{
	   				$data['idnino'] = $this->apadrina_modelo->ninoXpadrino($idpadrino);
	   			}
		   		$data['terminoscondiciones']=$this->load->view("terminos_y_condiciones", null, true);
	   			$data['idpadrino'] = $idpadrino;
	   			$data['header'] = $this->load->view("header",NULL,TRUE);
	   			$data['footer'] = $this->load->view("footer",NULL,TRUE);
	   			$this->load->view("otraCantidad2", $data);
	   		}else{
	   			echo "error";
	   		}	   		
	   	}

	   	function cambiar_donacion(){
	   		if($_POST != NULL){
	   			$data['header'] = $this->load->view("header",NULL,TRUE);
	   			$data['footer'] = $this->load->view("footer",NULL,TRUE);
		   		$data['terminoscondiciones']=$this->load->view("terminos_y_condiciones", null, true);
	   			$data['donacion'] = $_POST['donacion'];
	   			$data['comidas'] = $_POST['numComidas'];
	   			$this->load->view("cambiar_donacion",$data);
	   		}else{
	   			echo "error";
	   		}
	   	}

	   	function cambio(){
	   		if($_POST != NULL){
	   			$idpadrino = $this->session->userdata("idUsuario");
	   			if($_POST['cantidad'] <= 0){ //Baja del padrino
			   		$this->bajaPadrinoEmail();
		   			$idnino = $this->apadrina_modelo->ninoXpadrino($idpadrino);	   				
	   				$this->apadrina_modelo->bajaPadrino($idpadrino);
	   				$this->apadrina_modelo->agregaMovimiento($idpadrino,$idnino,0, 0,"baja");
	   				redirect ("yo_apadrino/despedida_padrino");
	   			}else{
	   				$donacion = $_POST['cantidad'];
		   			$numcomidas = $donacion/35;
		   			$idnino = $this->apadrina_modelo->ninoXpadrino($idpadrino);
	   				$this->apadrina_modelo->cambiaDonacion($idpadrino, $_POST);
	   				$this->apadrina_modelo->agregaMovimiento($idpadrino, $idnino, $donacion, $numcomidas,"cambio");
	   				$this->modificacionPadrinoEmail();
	   				redirect ("yo_apadrino");
	   			}
	   		}else{
	   			echo "nada";
	   		}
	   	}

	   	function despedida_padrino(){
	   		$data['header'] = $this->load->view("header",NULL,TRUE);
	   		$data['footer'] = $this->load->view("footer",NULL,TRUE);
	   		$this->load->view("despedidaPadrino",$data);
	   	}

	   	// FUNCIONES PARA ENVIAR CORREO

		function altaPadrinoEmail(){
			$data['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
   			$data['padrino']['nino_apadrinado'] = $this->apadrina_modelo->padrinos_ninos($this->session->userdata("idUsuario"));
			$config['mailtype'] = 'html';
	    	$this->email->initialize($config);
			$this->email->from('pacoylili@yosoypadrinovapormicuenta.com', 'Va por mi cuenta');
			$this->email->to('vapormicuenta@alsea.com.mx, alsea@deklan.net');
			$this->email->subject('Alta como padrino va por mi cuenta');
			$mensaje = $this->load->view("nuevoPadrinoEmail",$data, TRUE);
			$this->email->message($mensaje);
			if($this->email->send()){
   				$this->gracias_padrino();					
			}else{	
				echo "<html><head><meta charset='utf-8'></head><body><script>alert('No se pudo enviar el correo. Intentarlo más tarde')</script></body></html>";
			}
	   	}

		function modificacionPadrinoEmail(){
			$data['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
   			$data['padrino']['nino_apadrinado'] = $this->apadrina_modelo->padrinos_ninos($this->session->userdata("idUsuario"));
			$config['mailtype'] = 'html';
	    	$this->email->initialize($config);
			$this->email->from('pacoylili@yosoypadrinovapormicuenta.com', 'Va por mi cuenta');
			$this->email->to('vapormicuenta@alsea.com.mx, alsea@deklan.net');
			$this->email->subject('Modificación como padrino va por mi cuenta');
			$mensaje = $this->load->view("modificacionPadrinoEmail",$data, TRUE);
			$this->email->message($mensaje);
			if($this->email->send()){
   				$this->gracias_padrino();					
			}else{	
				echo "<html><head><meta charset='utf-8'></head><body><script>alert('No se pudo enviar el correo. Intentarlo más tarde')</script></body></html>";
			}        
	   	}	   	

	   	function bajaPadrinoEmail(){
			$data['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata("idUsuario"));
   			$data['padrino']['nino_apadrinado'] = $this->apadrina_modelo->padrinos_ninos($this->session->userdata("idUsuario"));
			$config['mailtype'] = 'html';
	    	$this->email->initialize($config);
			$this->email->from('pacoylili@yosoypadrinovapormicuenta.com', 'Va por mi cuenta');
			$this->email->to('vapormicuenta@alsea.com.mx, alsea@deklan.net');
			$this->email->subject('Baja como padrino va por mi cuenta');
			$mensaje = $this->load->view("bajaPadrinoEmail",$data, TRUE);
			$this->email->message($mensaje);
			if($this->email->send()){
   				$this->despedida_padrino();					
			}else{	
				echo "<html><head><meta charset='utf-8'></head><body><script>alert('No se pudo enviar el correo. Intentarlo más tarde')</script></body></html>";
			}        
	   	}

	} //fin de la clase
?>