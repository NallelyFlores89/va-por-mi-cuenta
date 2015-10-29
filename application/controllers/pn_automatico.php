<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Pn_automatico extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();			
			$this->load->helper(array('html', 'url', 'form'));	
			$this->load->model(array("mpn_automatico")); //Cargando el modelo
	   	}

	   	function index(){
	   		$padrinos=$this->mpn_automatico->padrinos();
	   		$ninos = $this->mpn_automatico->ninos();
	   		echo "<pre>";
	   		print_r($ninos);
	   		echo "</pre>";
	   		foreach ($padrinos as $value) {
	   			$nino = $this->mpn_automatico->ninoRandom();
	   			$this->mpn_automatico->apadrinar($nino['idninos'],$value['idpadrinos'],-1,-1);
	   		}
	   		$ninos = $this->mpn_automatico->ninos();
	   	}
	} //fin de la clase
?>