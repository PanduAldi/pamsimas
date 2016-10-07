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

}

/* End of file  */
/* Location: ./application/controllers/ */