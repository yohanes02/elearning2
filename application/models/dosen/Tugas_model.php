<?php

class Tugas_model extends CI_Model{
    public function data(){
        $query = $this->db
                    ->get("tbltugas");        
        return $query;
    }

	public function ambiltugas($matakuliah) {
		$query = $this->db
					->where("matakuliah", $matakuliah)
					->get("tbltugas");
		return $query;
	}

	public function gettugas($id, $mk) {
		$query = $this->db
                    ->where("idtugas",$id)
                    ->where("matakuliah",$mk)
                    ->get("tbltugas");
        return $query;
	}
	
    public function uptugas($data){
        $query = $this->db
                    ->insert("tbltugas",$data);
        return $this->db->affected_rows();
    }

	public function ambilkomen($idtugas){
		$query = $this->db
				->where("idtugas",$idtugas)
				->get("tbljawaban"); 
        return $query;
    } 
    
}
