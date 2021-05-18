<?php

use Symfony\Component\HttpKernel\EventListener\DumpListener;

class Absensimhs_model extends CI_Model{
    public function ambilabsensi($nim){
        $query = $this->db
                ->select("b.namamhs,a.*")
                ->from("tblabsensi a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.nim",$nim)
                ->get();        
        return $query;
    }
 
    public function getabsensi($nim){
        $query = $this->db
                    ->where("nim",$nim)                    
                    ->get("tblabsensi");
        return $query;
    }

    public function dataabsensi($kdmk,$kelas){
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->where("kelas",$kelas)
                    ->order_by("kelompok","asc")
                    ->get("tblabsensi");                    
        return $query;
    }
    
	public function dataabsensipermhs($idmhs, $kdmk){
		$query = $this->db
					->where("idmhs", $idmhs)
					->where("kodemk", $kdmk)
					->get("tblabsensi");
		return $query;
	}

	public function absensipertemuan($mk, $pertemuan, $idmhs) {
		$query = $this->db
					->set("a$pertemuan", 'Hadir')
					->where("kodemk", $mk)
					->where("nim", $idmhs)
					->update("tblabsensi");
        return $this->db->affected_rows();
		// return $query;
	}
}
