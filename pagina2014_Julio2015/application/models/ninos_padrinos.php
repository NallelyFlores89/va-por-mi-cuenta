<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

class Ninos_padrinos extends CI_Model{


    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function dameNinoApadrinado($idPadrino){
        $this->db->select('idninos, nombre, apat, amat');
        $this->db->where("padrinos_idpadrinos",$idPadrino);
        $this->db->join('ninos', 'ninos.idninos = ninos_padrinos.ninos_idninos');
        $consulta=$this->db->get("ninos_padrinos");
        return $consulta->row_array();
    }
}
