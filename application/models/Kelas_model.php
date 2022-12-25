<?php
Class Kelas_model extends CI_Model{

    public function getAllData(){
        $result = $this->db->select('*')
            ->from('kelas')
            ->get();
        return $result->result();
    }

    public function kodeGenerator(){
        $kode = 1;
        while(true){
            $this->db->select('kelas.id', FALSE)
                ->order_by('id','ASC');
            // $nomor = str_pad($kode, 2, "0", STR_PAD_LEFT);
            $id = "KL".$kode;
            $query = $this->db->where('id', $id)
                ->limit(1)
                ->get('kelas');
            
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
        if($this->db->insert('kelas', $data)){
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
            ->from("kelas")
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