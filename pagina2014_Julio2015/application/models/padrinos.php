<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

class Padrinos extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function login($email, $pass){
        $condicion = array('correo' => $email, 'num_empleado' => $pass);
        $consulta = $this->db->get_where('padrinos', $condicion);
        return $consulta->result_array();
    }

    function existeNumEmpleado($numEmpleado){
        $condicion = array('num_empleado' => $numEmpleado);
        $consulta = $this->db->get_where('padrinos', $condicion);
        if($consulta->num_rows()==1){
            return true;
        }
        return false;
    }

    function actualizaCorreoPadrino($numEmpleado, $correo){
        $data = array(
            'correo' =>$correo
        );

        $this->db->where('num_empleado', $numEmpleado);
        if($this->db->update('padrinos', $data)){
            return true;
        }
        return false;
    }
}
