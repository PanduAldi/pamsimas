<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_apps');
		$this->load->library('form_validation');

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

	public function edit_pelanggan()
	{
		$id = $this->input->post('id');

		$params = array(
							"nama" => $this->input->post('nama'),
							"alamat" => $this->input->post('alamat'),
							"telp" => $this->input->post('telp')
					   );

		$this->m_apps->update_data('pelanggan', $params, 'no_pelanggan', $id);
	
	}
	
	public function hapus_pelanggan() 
	{
		$id = $this->input->post('id');
		$this->m_apps->delete_data('pelanggan', 'no_pelanggan', $id);
	}

	public function pendaftaran()
	{
		$data = array(
						"title" => "Pendaftaran Pelanggan",
						"no_rekening" => $this->m_apps->auto_number('registrasi', 'no_rekening', 2, date('my')),
						"golongan" => $this->m_apps->get_all('golongan')->result()

					);


		$this->pendaftaran_rule();

		if ($this->form_validation->run() == TRUE) 
		{

			$pelanggan = array(
								 "no_pelanggan" => $this->input->post('no_rekening'),
								 "nama" => $this->input->post('nama'),
								 "alamat" => $this->input->post('alamat'),
								 "telp" => $this->input->post('telp'),
								 "id_golongan" => $this->input->post('id_golongan')
							  );

			$this->m_apps->insert_data('pelanggan', $pelanggan);

			$registrasi  = array(
								"no_rekening" => $this->input->post('no_rekening'),
							    "no_pelanggan" => $this->input->post('no_rekening'),
							    "angsuran" => 400000,
							    "tgl_registrasi" => date('Y-m-d')
							);		

			$this->m_apps->insert_data('registrasi', $registrasi);

			$stand = array(
							 "id" => '',
							 "no_rekening" => $this->input->post('no_rekening'),
							 "stand_awal" => 0,
							 "stand_akhir" => 0,
							 "bulan" => date('n') 
						  );

			$this->m_apps->insert_data('stand', $stand);
		
			$this->session->set_flashdata('input_success', '<div class="alert alert-success">Input pendaftaran berhasil</div>');
		}

		$this->template->display('apps/pelanggan/pendaftaran', $data);
	}

	public function pendaftaran_rule()
	{
		$this->form_validation->set_rules('nama', 'Nama',  'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}

	public function cari_pelanggan()
	{
		$id = $this->input->post('no_pelanggan');

		$q = $this->m_apps->get_id('pelanggan', 'no_pelanggan', $id)->row_array();

		$data = array();

		if (empty($q)) {
			$data = array(
							"no_pelanggan" => "",
							"nama" => "",
							"alamat" => "",
							"telp" => ""
						);
		}
		else
		{
			$data = array(
							"no_pelanggan" => $q['no_pelanggan'],
							"nama" => $q['nama'],
							"alamat" => $q['alamat'],
							"telp" => $q['telp']
						 );
		}

		echo json_encode($data);
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