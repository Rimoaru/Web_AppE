<?php
class Kategori extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('login','keluar');
			redirect(base_url());				
        }
    }


	public function index()
	{
        $data['kategori'] = $this->kategori_model->getAllData();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori', $data);
		$this->load->view('templates/footer');
	}


    public function input(){
        $data = array(
			'id' => $this->kategori_model->kodeGenerator(),
			'kategori' => $this->input->post('kategori', TRUE)
		);

        $cek = $this->kategori_model->inputData($data);
		if($cek){
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil disimpan</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}else{
            $pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal disimpan!</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}
		redirect('admin/kategori');
    }


	public function delete($kode){
		$where = array('id' => $kode);
		
		$cek = $this->kategori_model->deleteData($where,'kategori');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gagal dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
		}

        redirect('admin/kategori');
	}


	public function getDataEdit(){
        $kode = $this->input->post('kode');
        
        $getData = $this->kategori_model->getDataByID($kode);

        echo json_encode($getData);
    }


	public function edit(){
        $data = array (
            'id' => $this->input->post('kode_kategori', TRUE),
            'kategori' => $this->input->post('kategori', TRUE)
        );
		
		$kode = $this->input->post('kode_kategori');
        $where = array('id' => $kode);

		$cek = $this->kategori_model->editData($where, $data,'kategori');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gagal diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}

        redirect('admin/kategori');
    }
}
