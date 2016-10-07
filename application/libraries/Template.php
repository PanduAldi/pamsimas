<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function display($template, $data=null)
	{
		$data = array(
						"_header" => $this->ci->load->view('apps/template/header', $data, true),
						"_sidebar" => $this->ci->load->view('apps/template/sidebar', $data, true),
						"_content" => $this->ci->load->view($template, $data, true)
					);
		#load template
		$this->ci->load->view('template', $data);
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
