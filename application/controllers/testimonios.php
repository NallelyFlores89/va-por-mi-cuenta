<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonios extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('html', 'url', 'form'));
        $this->load->library('session');
        $this->load->model(array("padrinos")); //Cargando el modelo
    }

    function index(){
    	$data['header']=$this->load->view("header", null, true);
		$data['footer']=$this->load->view("footer", null, true);
        $this->load->view("testimonios",$data);
    }
}