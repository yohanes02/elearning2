<?php

class Login_model extends CI_Model {
    public function ambiladmin($userid,$password,$status){
        $query = $this->db
                    ->where("namaadmin",$userid)
                    ->where("password",$password)
                    ->where("status",$status)
                    ->get("tbladmin");
        
        return $query;
    }
	public function ambildosen($userid,$password){
        $query = $this->db
                    ->where("iddosen",$userid)
                    ->where("password",$password)
                    ->get("tbldosen");
        
        return $query;
    }
    public function ambilmahasiswa($userid,$password){
        $query = $this->db
                    ->where("nim",$userid)
                    ->where("password",$password)
                    ->get("tblmahasiswa");
        
        return $query;
    }
}
