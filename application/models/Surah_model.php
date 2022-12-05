<?php
Class Surah_model extends CI_Model{

    public function getAllData(){
        $this->db->select('*');
        $this->db->from('surah');
        $result = $this->db->get();
        return $result->result();
    }

    public function kodeGenerator(){
        $kode = 1;
        while(true){
            $this->db->select('surah.id', FALSE);
            $this->db->order_by('id','ASC');
            // $nomor = str_pad($kode, 2, "0", STR_PAD_LEFT);
            $id = "ID".$kode;
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('surah');
            
            if($query->num_rows() <> 0){      
                //cek kode jika telah tersedia
                $kode++;
           }else{
                break;
           }
        }
        return $id;  
    }

    public function inputData($data){
        if($this->db->insert('surah', $data)){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function getNameOfFile($kode){
        $this->db->select('*');
        $this->db->from('surah');
        $this->db->where('id', $kode);
        $query =$this->db->get();
        return $query->row('file');
    }

    public function deleteData($where, $table){   
        $this->db->where($where);
        if($this->db->delete($table)){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function getDataByID($kode)
    {
        $this->db->select("*");
        $this->db->from("surah");
        $where = array("id" => $kode);
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }

    public function editData($where,$data,$table)
    {
        $this->db->where($where);
        if($this->db->update($table, $data)){
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
}
?>