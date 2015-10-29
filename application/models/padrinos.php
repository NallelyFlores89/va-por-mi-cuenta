<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

class Padrinos extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function login($email, $pass){
        $this->db->where('correo', $email);
        $this->db->where('num_empleado', $pass);
        $consulta = $this->db->get('padrinos');
        if($consulta->num_rows()>0){
            return $consulta->result_array();
        }else{
            return false;
        }
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
