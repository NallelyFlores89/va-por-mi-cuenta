<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Inicio_modelo extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function traeNino(){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->order_by("idninos","RANDOM");
			$this->db->limit(1);
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}

		function ninos(){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->order_by("apadrinado","asc");
			$this->db->order_by("idninos","RANDOM");
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}
	} //Fin de la clase
?>