<?php
class Dashboard extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('login','keluar');
			redirect(base_url());				
        }
    }

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
}
