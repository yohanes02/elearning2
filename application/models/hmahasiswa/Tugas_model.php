<?php

class Tugas_model extends CI_Model{
    public function data(){
        $query = $this->db
                    ->get("tbltugas");        
        return $query;
    }

	public function ambiltugas($matakuliah) {
		$query = $this->db
					->where_in("matakuliah", $matakuliah)
					->get("tbltugas");

		$mk = implode("','", $matakuliah);
		$sql = "select * from `tblmatakuliah` a, `tbltugas` b where a.kodemk = b.matakuliah and b.matakuliah in('".$mk."') order by b.matakuliah asc";
		// echo $sql;
		$query = $this->db->query($sql);
		return $query;
	}

	public function gettugas($id) {
		$query = $this->db
                    ->where("idtugas",$id)
                    ->get("tbltugas");
        return $query;
	}
	
    public function uptugas($data){
        $query = $this->db
                    ->insert("tbltugas",$data);
        return $this->db->affected_rows();
    }

	public function createkomen($data){
        $query = $this->db
                    ->insert("tbljawaban",$data);
        return $this->db->affected_rows();
    }

	public function ambilkomen($idtugas, $idmhs){
			$query = $this->db
						->where("idtugas",$idtugas)
						->where("idmhs", $idmhs)
						->get("tbljawaban");        
        return $query;
    } 
    
}
