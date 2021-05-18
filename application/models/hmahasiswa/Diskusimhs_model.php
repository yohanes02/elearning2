<?php

class Diskusimhs_model extends CI_Model{

    public function ambilmateri($tipe,$matakuliah, $from){
        // $query = $this->db
        //             ->where("tipe",$tipe)
        //             ->where_in("matakuliah",$matakuliah)
		// 			->order_by("matakuliah", 'ASC')
        //             ->get("tblmateri");
		if($from == "mhs") {
			$mk = implode("','", $matakuliah);
		} elseif($from == "dsn") {
			$mk = $matakuliah;
		}
		$sql = "select b.*, namamk from `tblmatakuliah` a, `tblmateri` b where a.kodemk = b.matakuliah and b.tipe = '".$tipe."' and b.matakuliah in('".$mk."') order by b.matakuliah asc";
		// echo ($sql);
		$query = $this->db->query($sql);
        return $query;
    }

    public function ambildiskusi($prodi,$semester,$matakuliah){
        $query = $this->db
                    ->where("prodi",$prodi)
                    ->where("semester",$semester)
                    ->where("matakuliah",$matakuliah)
                    ->where("tipe","d")
                    ->get("tblmateri");        
        return $query;
    }

    // public function getdiskusi($pertemuan,$mk){
    //     $query = $this->db
    //                 ->where("pertemuan",$pertemuan)
    //                 ->where("tipe",'d')
    //                 ->where("matakuliah",$mk)
    //                 ->get("tblmateri");
    //     return $query;
    // }

	public function getdiskusi($idmateri){
        // $query = $this->db
        //             ->where("pertemuan",$pertemuan)
        //             ->where("tipe",'d')
        //             ->where("matakuliah",$mk)
        //             ->get("tblmateri");
		$query = $this->db
					->where("idmateri", $idmateri)
					->where("tipe", "d")
					->get("tblmateri");
        return $query;
    }

    public function ambilkomen($idmateri, $iduser = null){
		// if($iduser == null) {
			$query = $this->db
                    ->where("idmateri",$idmateri)
                    ->get("tbldiskusi"); 
		// } else {
		// 	$query = $this->db
		// 				->where("idmateri",$idmateri)
		// 				->where("userid", $iduser)
		// 				->get("tbldiskusi");        
		// }
        return $query;
    } 

    public function createkomen($data){
        $query = $this->db
                    ->insert("tbldiskusi",$data);
        return $this->db->affected_rows();
    }

    public function deletekomen($iddiskusi){
        $query = $this->db
                ->where("iddiskusi",$iddiskusi)
                ->delete("tbldiskusi");        
        return $query;
    }
}
