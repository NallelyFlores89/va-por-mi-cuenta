<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Apadrina_modelo extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function traeNinoEspecial($idnino){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->where("idninos",$idnino);
			$this->db->limit(1);
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}

		function agregaMovimiento($idpadrino, $idnino, $donacion, $numcomidas, $movimiento){
			$datos = array(
				'idpadrino' => $idpadrino,
				'idnino' => $idnino,
				'movimiento' => $movimiento,
				'num_comidas' => $numcomidas,
				'donacion' => $donacion,
			);
			$this->db->insert("movimientos",$datos);
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

		function esPadrino($idpadrino){
			$this->db->where("idpadrinos",$idpadrino);
			$this->db->where("padrino",1);
			$query = $this->db->get("padrinos");
			if($query->num_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}

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

		function traePrimerNino(){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->limit(1);
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}


		function traeAnterior(){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->order_by("ninos.idninos","RANDOM");
			// $this->db->where("ninos.idninos <",$id);
			$this->db->limit(1);		
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}

		function traeSiguiente(){
			$this->db->join("comedores","idcomedores=comedores_idcomedores");
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->order_by("ninos.idninos","RANDOM");
			// $this->db->where("ninos.idninos >",$id);
			$this->db->limit(1);		
			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}		

		function padrinos_ninos($idpadrino){
			$this->db->select("ninos.idninos, ninos.nombre, ninos.apat, ninos.amat, comedores.nombre_comedor, genero.genero, ninos.fNacDia, ninos.fNacMes, ninos.fNacAno, ninos_padrinos.donacion, ninos_padrinos.num_comidas");
			$this->db->join("ninos","idninos=ninos_idninos");
			$this->db->join("padrinos","idpadrinos=padrinos_idpadrinos");
			$this->db->join("genero", "idgenero=ninos.genero_idgenero");
			$this->db->join("comedores", "idcomedores=ninos.comedores_idcomedores");
			$this->db->where("padrinos_idpadrinos",$idpadrino);
			$query = $this->db->get("ninos_padrinos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}	

		function ninoXpadrino($idpadrino){
			$this->db->select("ninos_idninos");
			$this->db->where("padrinos_idpadrinos",$idpadrino);
			$query = $this->db->get("ninos_padrinos");
			if($query->num_rows() > 0){
				$query = $query->row_array();
				return $query['ninos_idninos'];
			}else{
				return false;
			}
		}
		
		function traeComedores(){
			$query = $this->db->get("comedores");
			$comedores = array();
			if($query->num_rows() > 0){
				foreach ($query->result_array() as $value) {
					$comedores[$value['idcomedores']] = $value['nombre_comedor'];
				}
				return $comedores;
			}else{
				return false;
			}
		}
		function traeGeneros(){
			$query = $this->db->get("genero");
			$generos = array();
			if($query->num_rows() > 0){
				foreach ($query->result_array() as $value) {
					$generos[$value['idgenero']] = $value['genero'];
				}
				return $generos;
			}else{
				return false;
			}
		}

		function traeConsultaNinos($datos){
			$this->db->join("genero","idgenero=genero_idgenero");
			$this->db->join("comedores","idcomedores=comedores_idcomedores");

			if(isset($datos['genero']) && $datos['genero'] != -1){
				$this->db->where('genero_idgenero',$datos['genero']);
			}
			if(isset($datos['fNacAno']) && $datos['fNacAno'] != -1){
				$this->db->where('fNacAno',$datos['fNacAno']);
			}
			if(isset($datos['dia']) && $datos['dia'] != -1){
				$this->db->where('fNacDia',$datos['dia']);
			}
			if(isset($datos['mes']) && $datos['mes'] != -1){
				$this->db->where('fNacMes',$datos['mes']);
			}
			if(isset($datos['comedor']) && $datos['comedor'] != -1){
				$this->db->where('comedores_idcomedores',$datos['comedor']);
			}

			$query = $this->db->get("ninos");
			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		function traeDatosPadrino($idpadrino){
			$this->db->where("idpadrinos",$idpadrino);
			$query=$this->db->get("padrinos");
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}

		function cambiaDonacion($idpadrino,$datos){
			$data = array(
				'donacion' => $datos['cantidad'],
				'num_comidas' => $datos['cantidad']/35,
			);
			$this->db->where("padrinos_idpadrinos",$idpadrino); 
			$this->db->update("ninos_padrinos",$data);
		}

		function bajaPadrino($idpadrino){
			$idnino = $this->ninoXpadrino($idpadrino);
			$this->borrar_ninos_padrinos($idpadrino);
			$this->noPadrino($idpadrino);
			$this->noNinoPadrino($idnino);
		}

		function noNinoPadrino($idnino){
			$data = array('apadrinado' => 0);
			$this->db->update("ninos",$data, "idninos = $idnino");
		}

		function noPadrino($idpadrino){
			$data = array('padrino' => 0);
			$this->db->update("padrinos",$data, "idpadrinos = $idpadrino");
		}

		function borrar_ninos_padrinos($idpadrino){
			$this->db->delete('ninos_padrinos', array('padrinos_idpadrinos' => $idpadrino)); 
		}

/*********************** REPORTES ***********************************/
		function trae_reporte(){
			$this->db->select("idmovimientos, padrinos.nombre as nombre_padrino, CONCAT(ninos.nombre,".' '.",ninos.apat) as nombre_nino, correo as correo_padrino, movimientos.donacion, movimientos.num_comidas, movimiento, fecha", false);
			$this->db->from("movimientos");
			$this->db->join("ninos_padrinos", "ninos_padrinos.padrinos_idpadrinos = movimientos.idpadrino");
			$this->db->join("padrinos" ,"padrinos.idpadrinos = ninos_padrinos.padrinos_idpadrinos");
			$this->db->join("ninos", "ninos.idninos = ninos_padrinos.ninos_idninos");
			$query = $this->db->get();

			if($query->num_rows() > 0){	
				return $query->result_array();
			}else{
				return -1;
			}			
		}

		function trae_reporte_ninos_comedor($idcomedor){
			$this->db->select("*");
			$this->db->from("ninos");
			$this->db->join("comedores","comedores.idcomedores = comedores_idcomedores");
			$this->db->where('comedores_idcomedores',$idcomedor);
			$query = $this->db->get();

			if($query->num_rows() > 0){	
				return $query->result_array();
			}else{
				return -1;
			}			
		}					

		function trae_reporte_fecha($fecha){
			$this->db->select("idmovimientos, padrinos.nombre as nombre_padrino, CONCAT(ninos.nombre,".' '.",ninos.apat) as nombre_nino, correo as correo_padrino, movimientos.donacion, movimientos.num_comidas, movimiento, fecha", false);
			$this->db->from("movimientos");
			$this->db->join("ninos_padrinos", "ninos_padrinos.padrinos_idpadrinos = movimientos.idpadrino");
			$this->db->join("padrinos" ,"padrinos.idpadrinos = ninos_padrinos.padrinos_idpadrinos");
			$this->db->join("ninos", "ninos.idninos = ninos_padrinos.ninos_idninos");
			$this->db->where("DATE(movimientos.fecha)",$fecha);
 			$query = $this->db->get();

			if($query->num_rows() > 0){	
				return $query->result_array();
			}else{
				return -1;
			}			
		}		

		function trae_reporte_ninos_padrinos(){
			$this->db->select("padrinos.idpadrinos, padrinos.num_empleado,padrinos.nombre as nombre_padrino, CONCAT(ninos.nombre,".' '.",ninos.apat) as nombre_nino, correo as correo_padrino, ninos_padrinos.donacion, ninos_padrinos.num_comidas", false);			
			$this->db->join("ninos","idninos=ninos_idninos");
			$this->db->join("padrinos","idpadrinos=padrinos_idpadrinos");
			$this->db->join("genero", "idgenero=ninos.genero_idgenero");
			$this->db->join("comedores", "idcomedores=ninos.comedores_idcomedores");
			// $this->db->group_by("padrinos.num_empleado");
			$query = $this->db->get("ninos_padrinos");
			if($query->num_rows() > 0){
				$datos = $this->asignaMov($query->result_array());
				return $datos;
			}else{
				return -1;
			}
		}	

		function asignaMov($datos){
			foreach ($datos as $key => $value) {
				$this->db->where("idpadrino", $value['idpadrinos']);
				$this->db->order_by("fecha","DESC");
				// $this->db->group_by("idpadrino");
				$this->db->limit(1);
				$query = $this->db->get("movimientos");
				if($query->num_rows()>0){
					$datos[$key]['movimientos'] = $query->row_array();
				}else{
					$datos[$key]['movimientos']['movimiento'] = "No ha habido movimientos";
					$datos[$key]['movimientos']['fecha'] = "";
				}
			}
					
			return $datos;
		}
	} //Fin de la clase
?>