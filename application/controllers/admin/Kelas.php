<?php
class Kelas extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('login','keluar');
			redirect(base_url());				
        }
    }


	public function index()
	{
        $data['kelas'] = $this->kelas_model->getAllData();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kelas', $data);
		$this->load->view('templates/footer');
	}


    public function input(){
        $data = array(
			'id' => $this->kelas_model->kodeGenerator(),
			'kelas' => $this->input->post('kelas', TRUE)
		);

        $cek = $this->kelas_model->inputData($data);
		if($cek){
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil disimpan</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}else{
            $pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal disimpan!</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}
		redirect('admin/kelas');
    }


	public function delete($kode){
		$where = array('id' => $kode);
		
		$cek = $this->kelas_model->deleteData($where,'kelas');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gagal dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
		}

        redirect('admin/kelas');
	}


	public function getDataEdit(){
        $kode = $this->input->post('kode');
        
        $getData = $this->kelas_model->getDataByID($kode);

        echo json_encode($getData);
    }


	public function edit(){
        $data = array (
            'id' => $this->input->post('kode_kelas', TRUE),
            'kelas' => $this->input->post('kelas', TRUE)
        );
		
		$kode = $this->input->post('kode_kelas');
        $where = array('id' => $kode);

		$cek = $this->kelas_model->editData($where, $data,'kelas');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gagal diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}

        redirect('admin/kelas');
    }
}
