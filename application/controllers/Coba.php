<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
 		$this->session->set_flashdata('helo', '<script>alert("hello world") </script>');

		echo $this->session->flashdata('helo');
	}

	public function file_read()
	{
		if (isset($_POST['submit'])) 
		{
			print_r($_FILES['img']);
		}

		$this->load->view('img_view');
	}	

}

/* End of file  */
/* Location: ./application/controllers/ */