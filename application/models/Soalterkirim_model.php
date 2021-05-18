<?php

class Soalterkirim_model extends CI_Model{ 
    public function ambilriwayat(){
        $query = $this->db
                    ->group_by("idsoalriw,tipesoal")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function ambilriwayatfil($kdmk){
        // $query = $this->db
		// 			->distinct()
        //             ->where("kodemk",$kdmk)
        //             // ->group_by("idsoalriw,tipesoal")
        //             ->get("tblriwayatsoal");
		$sql = "SELECT DISTINCT * FROM ( SELECT idsoalriw, tipesoal, kodemk, tipetugas, tanggal FROM tblriwayatsoal where kodemk = '$kdmk') u";
		$query = $this->db->query($sql);
        
        return $query;
    }

    public function getesai($idsoal){
        $query = $this->db
                    ->where("idsoal",$idsoal)
                    ->get("tblsoalesai");
        return $query;
    }

    public function getpilgan($idsoal){
        $query = $this->db
                    ->where("idsoalpil",$idsoal)
                    ->get("tblsoalpilgan");
        return $query;
    }
}
