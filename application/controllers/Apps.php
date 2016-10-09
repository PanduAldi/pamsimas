<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_apps');

		// jika belum login
		if ($this->session->userdata('islogin') == false) 
		{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" data-animate="fadeInDown"><i class="fa fa-info"></i> Mohon Maaf Anda Harus Login Terlebih Dahulu .. !!!</div>');
			
			redirect('login_user','refresh');
		}
	}

	public function index()
	{

		$data['title'] = "Home";

		$this->template->display('apps/home', $data);
	}

	// Pelanggan module

	public function pelanggan()
	{
		$data = array(
						"title" => "Pelanggan",
						"pel" => $this->m_apps->get_all()
 					);
	}

	// end pelanggan

	/**
	 * Golongan section
	 */
	public function golongan()
	{
		$data = array(
						"title" => "Golongan",
						"gol" => $this->m_apps->get_all('golongan')->result()
					);
		$this->template->display('apps/golongan/index', $data);
	}

	public function tambah_golongan()
	{
		$data['title'] = "Tambah Golongan";

		if (isset($_POST['simpan'])) 
		{
			$record = array(
								"id_gol" => '',
								"nama_gol" => $this->input->post('nama'),
								"tarif" => $this->input->post('tarif')
							);

			$this->m_apps->insert_data('golongan', $record);
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Tambah Data Berhasil</div>');
				redirect('golongan');
					
		}

		$this->template->display('apps/golongan/tambah', $data);
	}

	public function edit_golongan()
	{
		$data['title'] = "Edit Golongan";

		$id = $this->uri->segment(2);

		if(isset($_POST['edit']))
		{
			$record = array(
							"nama_gol" => $this->input->post('nama'),
							"tarif" => $this->input->post('tarif')
						 );
			 $this->m_apps->update_data('golongan', $record, 'id_gol', $id);
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Edit Data Berhasil</div>');
				redirect('golongan','refresh');
			 
					
		}

		$data['gol'] = $this->m_apps->get_id('golongan', 'id_gol', $id)->row();
		$this->template->display('apps/golongan/edit', $data);
	}

	public function hapus_golongan()
	{
		$id = $this->input->post('id');

		$this->m_apps->delete_data('golongan', 'id_gol', $id);
	}

	// End golongan

	/**
	 * Pelanggan section 
	 */

	public function pelanggan()
	{
		$data = array(
						"title" => "Data Pelanggan",
						"pelanggan" => $this->m_apps->get_all("pelanggan")->result() 
					 );
	
		$this->template->display('apps/pelanggan/index', $data);
	}

	/**
	 * User section
	 */

	public function user()
	{
		$data = array(
						"title" => "User",
						"user" => $this->m_apps->get_all('user')
					);
		$this->template->display('apps/user/index', $data);
	}

	public function tambah_user()
	{
		$data['title'] = "Tambah User";

		if (isset($_POST['simpan'])) 
		{
			$rec = array(
							"id_user" => "",
							"nama" => $this->input->post('nama'),
							"email" => $this->input->post('email'),
							"username" => $this->input->post('username'),
							"password" => md5($this->input->post('password')),
							"level" => $this->input->post('level')
						);

			$this->m_apps->insert_data('user', $rec);
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Tambah User Berhasil</div>');
				redirect('user','refresh');
			
		}

		$this->template->display('apps/user/tambah', $data);
	}

	public function edit_user()
	{
		$id = $this->session->userdata('id_user');

		$data['title'] = "Edit Data";

		if (isset($_POST['edit_user'])) 
		{
			$record = array(
								"nama" => $this->input->post('nama'),
								"email" => $this->input->post('email'),
								"username" => $this->input->post('username')
							);
			$this->m_apps->update_data('user', $record, 'id_user', $id);

			$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Update User Berhasil... </div>');
			redirect('edit_user','refresh');
		}

		$data['user'] = $this->m_apps->get_id('user', 'id_user', $id)->row();

		$this->template->display('apps/user/edit_user', $data);
	}

	public function ganti_password()
	{
		$id = $this->session->userdata('id_user');

		if (isset($_POST['ganti'])) 
		{
			$rec = array(
							"password" => md5($this->input->post('new'))
						);

			$this->m_apps->update_data('user', $rec, 'id_user', $id);

			$this->session->set_flashdata('info', '<div class="alert alert-danger"> <i class="fa fa-info"></i> Password berhasil di ubah</div>');

			redirect('ganti_password');
		}

		$data['title'] = "Ganti Password";
		$data['user'] = $this->m_apps->get_id('user', 'id_user', $id)->row();

		$this->template->display('apps/user/ganti_password', $data);
	}

	public function hapus_user()
	{

		$id = $this->input->post('id');
		$this->m_apps->delete_data('user', 'id_user', $id);

	}

	// End User
	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Anda Telah Logout..</div>');
		redirect('login_user', 'refresh');
	}


}

/* End of file  */
/* Location: ./application/controllers/ */