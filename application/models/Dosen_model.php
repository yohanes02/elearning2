<?php
class Dosen_model extends CI_Model{

    public function ambildosen(){
        $query = $this->db
                    ->get("tbldosen");
        
        return $query;
    }

    public function createdosen($data){
        $query = $this->db
                    ->insert("tbldosen",$data);

        return $this->db->affected_rows();
    } 

    public function updatedosen($iddosen,$data){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->update("tbldosen",$data);
        
        return $this->db->affected_rows();
    }

    public function deletedosen($iddosen){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->delete("tbldosen");
        
        return $query;
    }

    public function getdosen($iddosen){
        $query = $this->db
                    ->where("iddosen",$iddosen)
                    ->get("tbldosen");
        
        return $query->row();
    }

    function save_image($data){		
		$this->db->insert('tblgambar',$data);
	}
}
