<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		if ($this->session->userdata('islogin') == true)
		{
			redirect('home');
		}

		$data['title'] = 'Halaman Login';

		if (isset($_POST['login'])) 
		{
			
			#set request posr
			$username =  $this->input->post('username');
			$password =  md5($this->input->post('password'));
		
			$cek = $this->m_user->login($username, $password);

			if ($cek->num_rows() > 0) 
			{
			
				$d = $cek->row();

				$this->session->set_userdata('islogin', true);
				$this->session->set_userdata('id_user', $d->id_user);
				$this->session->set_userdata('username', $d->username);
				$this->session->set_userdata('email', $d->email);
				$this->session->set_userdata('level', $d->level);
			
				redirect("home", "refresh");
			}
			else
			{
				$this->session->set_flashdata('info', '<div class="alert alert-danger" data-animate="fadeInLeft"><i class="fa fa-info"></i> Username atau Password Salah</div>');
				redirect('login_user','refresh');
			}
		}
		else
		{
			$this->load->view('login_view', $data);
		}
	}

	public function ganti_password()
	{
		
	}

}

/* End of file  */
/* Location: ./application/controllers/ */