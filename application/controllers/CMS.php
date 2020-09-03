<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMS extends CI_Controller {

	public function index()
	{
		$this->load->view('cms/home');
	}
}
