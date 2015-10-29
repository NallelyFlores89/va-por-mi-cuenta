<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Mpn_automatico extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function apadrinar($idnino, $idpadrino, $donacion, $numcomidas){
			$data = array(
				'ninos_idninos' => $idnino,
				'padrinos_idpadrinos' => $idpadrino,
				'donacion' => $donacion,
				'num_comidas' => $numcomidas,
			);
			$this->db->insert("ninos_padrinos",$data);
			$this->ninoApadrinado($idnino);
			$this->yaEsPadrino($idpadrino);
		}
		function yaEsPadrino($idpadrino){
			$data = array(
				'padrino' => 1
			);
			$this->db->where("idpadrinos",$idpadrino);
			$this->db->update("padrinos",$data);
		}

		function ninoApadrinado($idnino){
			$data = array(
				'apadrinado' => 1
			);
			$this->db->where("idninos",$idnino);
			$this->db->update("ninos",$data);
		}		

		function padrinos(){
			$this->db->where("padrino",1);
			$query = $this->db->get("padrinos");
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}
		}
		
		function ninos(){
			$this->db->where("apadrinado",0);
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}
		}

		function ninoRandom(){
			$this->db->where("apadrinado",0);
			$this->db->order_by("idninos","RANDOM");
			$query = $this->db->get("ninos");
			$this->db->limit(1);
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return FALSE;
			}
		}
	} //Fin de la clase
?>