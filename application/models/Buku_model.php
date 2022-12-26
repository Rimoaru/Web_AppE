<?php
Class Buku_model extends CI_Model{

    public function getAllData(){
        $result = $this->db->select('*, kelas.kelas as nama_kelas, kategori.kategori as nama_kategori, buku.id as idBuku')
            ->from('buku')
            ->join('kelas', 'buku.kelas = kelas.id', 'LEFT')
            ->join('kategori', 'buku.kategori = kategori.id', 'LEFT')
            ->get();
        return $result->result();
    }

    public function kodeGenerator(){
        $kode = 1;
        while(true){
            $this->db->select('buku.id', FALSE);
            $this->db->order_by('id','ASC');
            // $nomor = str_pad($kode, 2, "0", STR_PAD_LEFT);
            $id = "ID".$kode;
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('buku');
            
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
        if($this->db->insert('buku', $data)){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function getNameOfFile($kode){
        $this->db->select('*');
        $this->db->from('buku');
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
        $this->db->from("buku");
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

    public function apiAllData(){
        $result = $this->db->select('buku.id as id, buku.judul_buku as judul_buku, kategori.kategori as nama_kategori, kelas.kelas as kelas, buku.file as file, buku.time as time')
            ->from('buku')
            ->join('kelas', 'buku.kelas = kelas.id', 'LEFT')
            ->join('kategori', 'buku.kategori = kategori.id', 'LEFT')
            ->get();
        return $result->result();
    }

    public function apiSingleData($kode){
        $result = $this->db->select('buku.id as id, buku.judul_buku as judul_buku, kategori.kategori as nama_kategori, kelas.kelas as kelas, buku.file as file, buku.time as time')
            ->from('buku')
            ->join('kelas', 'buku.kelas = kelas.id', 'LEFT')
            ->join('kategori', 'buku.kategori = kategori.id', 'LEFT')
            ->where('id', $kode)
            ->get();
        return $result->result();
    }
    
}
?>