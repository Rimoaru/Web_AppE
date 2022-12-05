<?php 
class Auth extends CI_Controller{

    public function index(){
        $this->load->view('login');
    }


    public function proses_login()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('password');
        
        $pass_db = $this->login_model->getPass($user);

        if (password_verify($password, $pass_db)) {
            $data = $this->login_model->getDataByUser($user);
            foreach ($data->result() as $ck) {
                $sess_data['username'] = $ck->username;

                $this->session->set_userdata($sess_data);
            }
			redirect(base_url('admin/dashboard'));
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Username atau Password Salah!
                        <span aria-hidden="true">&times;</span>
                        </button>
                       </div>');
            redirect(base_url());
        }
    }
    

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>