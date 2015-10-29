<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Index extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();			
			$this->load->helper(array('html', 'url'));	
			$this->load->model("inicio_modelo"); //Cargando el modelo
	   	}

	   	function index(){
	   		$data['header']=$this->load->view("header", null, true);
	   		$data['footer']=$this->load->view("footer", null, true);
	   		$this->load->view("v_index",$data);
	   	}

	   	function ninoAleatorio(){
	   		$nino = $this->inicio_modelo->traeNino();
	   		echo json_encode($nino);
	   	}	   	

	} //fin de la clase
?>