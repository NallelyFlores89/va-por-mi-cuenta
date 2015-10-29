<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Apadrina extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();			
			$this->load->helper(array('html', 'url', 'form'));	
			$this->load->model(array("apadrina_modelo","inicio_modelo")); //Cargando el modelo
			$this->load->library('session');

	   	}

	   	function index(){
	   		if (($this->session->userdata("is_login") == FALSE)){
	   			redirect("login/paso1");
        	}else{
        		$this->paso2prueba();
        	}
	   	}
	   	function paso2prueba(){
	   		if (($this->session->userdata("is_login") == FALSE)){
				echo "<html><head><meta charset='utf-8'></head><body>
				<script>
                	window.location = '".base_url()."index.php/login'
                </script></body></html>";  
        	}else{
		   		$data['header']=$this->load->view("header", null, true);
		   		$data['footer']=$this->load->view("footer", null, true);	
		   		$data['ninos'] =$this->inicio_modelo->ninos();
		   		$data['mesesNombre'] = array(1 => 'Enero', 2 => 'Febrero',3 => 'Marzo',
		   			4 => 'Abril',5 => 'Mayo',6 => 'Junio',7 => 'Julio',	8 => 'Agosto',
		   			9 => 'Septiembre',10  => 'Octubre',11  => 'Noviembre',12  => 'Diciembre',);

		   		$data['generos'] = $this->apadrina_modelo->traeGeneros();
		   		$data['comedores'] = $this->apadrina_modelo->traeComedores();
		   		
		   		for ($i=1; $i<=31; $i++){
		   			$data['dias'][$i] = $i;
		   		}
		   		for ($i=1; $i<=15; $i++){
		   			$data['edades'][$i] = $i;
		   		}
		   		for ($i=1; $i<=12; $i++){
		   			$data['meses'][$i] = $data['mesesNombre'][$i];
		   		}
		   		$data['edades'][-1] = 'Edad';
		   		$data['comedores'][-1] = 'Comedor';
		   		$data['dias'][-1] = 'Día de nac.';
		   		$data['meses'][-1] = 'Mes de nac.';
		   		$data['generos'][-1]  = 'Género';
		   		$this->load->view("selecciona_nino2",$data);
		   	}
	   	
	   	}

	   	function paso2(){
	   		if (($this->session->userdata("is_login") == FALSE)){
				echo "<html><head><meta charset='utf-8'></head><body>
				<script>
                	window.location = '".base_url()."index.php/login'
                </script></body></html>";  
        	}else{
		   		$data['header']=$this->load->view("header", null, true);
		   		$data['footer']=$this->load->view("footer", null, true);	
		   		$data['ninos'] =$this->inicio_modelo->ninos();
		   		$data['mesesNombre'] = array(1 => 'Enero', 2 => 'Febrero',3 => 'Marzo',
		   			4 => 'Abril',5 => 'Mayo',6 => 'Junio',7 => 'Julio',	8 => 'Agosto',
		   			9 => 'Septiembre',10  => 'Octubre',11  => 'Noviembre',12  => 'Diciembre',);

		   		$data['generos'] = $this->apadrina_modelo->traeGeneros();
		   		$data['comedores'] = $this->apadrina_modelo->traeComedores();
		   		
		   		for ($i=1; $i<=31; $i++){
		   			$data['dias'][$i] = $i;
		   		}
		   		for ($i=1; $i<=15; $i++){
		   			$data['edades'][$i] = $i;
		   		}
		   		for ($i=1; $i<=12; $i++){
		   			$data['meses'][$i] = $data['mesesNombre'][$i];
		   		}
		   		$data['edades'][-1] = 'Edad';
		   		$data['comedores'][-1] = 'Comedor';
		   		$data['dias'][-1] = 'Día de nac.';
		   		$data['meses'][-1] = 'Mes de nac.';
		   		$data['generos'][-1]  = 'Género';
		   		$this->load->view("selecciona_nino2",$data);
		   	}
	   	}

	   	function paso3(){
	   		if (($this->session->userdata("is_login") == FALSE)){
			echo "<html><head><meta charset='utf-8'></head><body>
			<script>
                window.location = '".base_url()."index.php/login';
            </script></body></html>";
        	}else{
        		$idpadrino = $this->session->userdata('idUsuario');
        		if($this->apadrina_modelo->esPadrino($idpadrino)){
        			echo "<html><head><meta charset='utf-8'></head><body><script>alert('Tu ya apadrinas a un niño. Para conocerlo, escribirle o aumentar tu aportación, ve a la sección “Yo apadrino a…”');
        			window.location = '".base_url()."index.php/yo_apadrino';
        			</script></body></html>";
	   			}else{
			   		$datos['header']=$this->load->view("header", null, true);
			   		$datos['footer']=$this->load->view("footer", null, true);
			   		$datos['terminoscondiciones']=$this->load->view("terminos_y_condiciones", null, true);
			   		if($_POST != NULL){	 
			   			$datos['nino'] = $this->apadrina_modelo->traeNinoEspecial($_POST['ninoEspecial']);
			   			$datos['padrino'] = $this->apadrina_modelo->traeDatosPadrino($this->session->userdata('idUsuario'));
			   			$this->load->view("yo_apadrino_proceso",$datos);
			   		}else{
			   			echo "error";
			   		}
			   	}
		   	}
	   	}

	   	function consulta($genero, $edad, $dia, $mes, $comedor){
	   		if($edad != -1){
	   			$ano_nac = date("Y") - $edad;
	   		}else{
	   			$ano_nac = -1;
	   		}
	   		$datos = array(
	   			'genero' => $genero,
	   			'edad' => $edad,
	   			'dia' => $dia,
	   			'fNacAno' => $ano_nac,
	   			'mes' => $mes,
	   			'comedor' => $comedor
	   		);
   			$consulta = $this->apadrina_modelo->traeConsultaNinos($datos);
   			if($consulta){
   				$data['consulta'] = $consulta;
   				$codigo = $this->load->view("v_consultaNinos",$data, TRUE);
   				echo json_encode($codigo);
   			}else{
   				echo json_encode($consulta);
   			}
	   	}
	   	function siguiente_nino_ajax(){
	   		$sig = $this->apadrina_modelo->traeSiguiente();
	   		echo json_encode($sig);
	   	}

	   	function anterior_nino_ajax(){
	   		$sig = $this->apadrina_modelo->traeAnterior();
	   		echo json_encode($sig);
	   	}

	   	function ninoEspecial_ajax($idnino){
	   		$ninoEspecial = $this->apadrina_modelo->traeNinoEspecial($idnino);
	   		echo json_encode($ninoEspecial);
	   	}
	} //fin de la clase
?>