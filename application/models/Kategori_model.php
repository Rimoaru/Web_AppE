<?php
Class Kategori_model extends CI_Model{

    public function getAllData(){
        $result = $this->db->select('*')
            ->from('kategori')
            ->get();
        return $result->result();
    }

    public function kodeGenerator(){
        $kode = 1;
        while(true){
            $this->db->select('kategori.id', FALSE)
                ->order_by('id','ASC');
            // $nomor = str_pad($kode, 2, "0", STR_PAD_LEFT);
            $id = "KG".$kode;
            $query = $this->db->where('id', $id)
                ->limit(1)
                ->get('kategori');
            
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
        if($this->db->insert('kategori', $data)){
            return TRUE;
        }else {
            return FALSE;
        }
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
        $where = array("id" => $kode);
        $query = $this->db->select("*")
            ->from("kategori")
            ->where($where)
            ->limit(1)
            ->get();
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