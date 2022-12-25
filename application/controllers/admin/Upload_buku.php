<?php
class Upload_buku extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('login','keluar');
			redirect(base_url());				
        }
    }


	public function index()
	{
        $data['buku'] = $this->buku_model->getAllData();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('upload_buku', $data);
		$this->load->view('templates/footer');
	}


    public function input(){
        //Buat Folder Gambar kalau belom ada
		if (!is_dir('assets/files')){
			mkdir('./assets/files', 0777, true);
		}

		date_default_timezone_set("Asia/Jakarta");
        $config['upload_path']          = "./assets/files/";
		$config['allowed_types']        = 'pdf|PDF';
		$config['file_name']            = $this->buku_model->kodeGenerator()."_".date("d-m-y_H-i-s");

        $this->load->library('upload', $config);

        
        if (!$this->upload->do_upload('file')){ //<-Fungsi untuk kondisi sekalian sebagai upload file
			$error = $this->upload->display_errors();
            $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$error.'</div>';
			$this->session->set_flashdata('upload', $msg);
			redirect('admin/upload_buku');
		}else{
			$file = $this->upload->data();
			$nama_file = $file['file_name'];
		}

        $data = array(
			'id' => $this->buku_model->kodeGenerator(),
			'judul_buku' => $this->input->post('judul_buku', TRUE),
			'kategori' => $this->input->post('kategori', TRUE),
			'kelas' => $this->input->post('kelas', TRUE),
			'file' => $nama_file,
		);

        $cek = $this->buku_model->inputData($data);
		if($cek){
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Buku Berhasil disimpan</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}else{
            $pesan = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Buku Gagal disimpan!</div>';
			$this->session->set_flashdata('simpan',$pesan);
		}
		redirect('admin/upload_buku');
    }


	public function delete($kode){
		$where = array('id' => $kode);
		$file = $this->buku_model->getNameOfFile($kode);
		$path = "./assets/files/".$file;
		
		$cek = $this->buku_model->deleteData($where,'buku');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Buku Berhasil dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
			unlink($path);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Buku Gagal dihapus</div>';
			$this->session->set_flashdata('hapus', $pesan);
		}

        redirect('admin/upload_buku');
	}


	public function getDataEdit(){
        $kode = $this->input->post('kode');
        
        $getData = $this->buku_model->getDataByID($kode);

        echo json_encode($getData);
    }


	public function edit(){
		date_default_timezone_set("Asia/Jakarta");
        $config['upload_path']          = "./assets/files/";
		$config['allowed_types']        = 'pdf|PDF';
		$config['file_name']            = $this->input->post('kode_buku', TRUE)."_".date("d-m-y_H-i-s");

        $this->load->library('upload', $config);

		$nama_file_DB = $this->buku_model->getNameOfFile($this->input->post('kode_buku', TRUE));

        
        if(!$this->upload->do_upload('file')){
			if ($this->upload->display_errors() != "<p>You did not select a file to upload.</p>"){
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('upload', $error);
				redirect('admin/upload_buku');
			}else{
				$data = array(
                    'id' => $this->input->post('kode_buku', TRUE),
                    'judul_buku' => $this->input->post('judul_buku', TRUE),
                    'kategori' => $this->input->post('kategori', TRUE),
					'kelas' => $this->input->post('kelas', TRUE),
				);
			}
		}else{
			$path = './assets/files/';
			unlink($path.$nama_file_DB);
			$data = array (
                'id' => $this->input->post('kode_buku', TRUE),
            	'judul_buku' => $this->input->post('judul_buku', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
				'kelas' => $this->input->post('kelas', TRUE),
				'file' => $this->input->post('kode_buku', TRUE)."_".date("d-m-y_H-i-s"),
			);
		}
		
		$kode = $this->input->post('kode_buku');
        $where = array('id' => $kode);

		$cek = $this->buku_model->editData($where, $data,'buku');
		if($cek){
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Buku Berhasil diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}else{
			$pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Buku Gagal diubah</div>';
			$this->session->set_flashdata('edit', $pesan);
		}

        redirect('admin/upload_buku');
    }
}
