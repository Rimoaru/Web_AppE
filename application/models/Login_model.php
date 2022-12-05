<?php
Class Login_model extends CI_Model{

    public function getPass($username){
        $this->db->from('user');
        $where = array('username' => $username);
        $this->db->where($where);
        $query = $this->db->get()->num_rows();
        if($query != 0){
            return $this->db->where($where)->get('user')->row()->password;
        }else{
            return NULL;
        }
    }


    public function getDataByUser($username){
        $where = array('username' => $username);
        $this->db->where($where);

        return $this->db->get('user');
    }


    public function getAllData(){
        return $this->db->get('user');
    }
    
}
?>