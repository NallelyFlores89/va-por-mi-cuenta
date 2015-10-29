<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Galeria extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();			
			$this->load->helper(array('html', 'url', 'form'));	
	   	}

	   	function index(){
	   		$data['header'] = $this->load->view("header", null, true);
	   		$data['footer'] = $this->load->view("footer", null, true);
	   		$base  =getcwd();
	   		$ruta = $base.'/media/img/galeria';
	   		$directorio=opendir($ruta); 
			$data['fotos'] = array();
			$i = 0;
			while ($archivo = readdir($directorio)){
				if($archivo != "." && $archivo != ".."){
					$data['fotos'][$i] = $archivo;
					$i++;
				}
			}
			closedir($directorio); 
	   		$this->load->view("galeria", $data);
	   	}

	} //fin de la clase
?>