<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['page_title'] = 'Página Inicial';
		$this->load->view('template/header', $data);
		$this->load->view('template/nav');
		$this->load->view('home');
		$this->load->view('template/footer');
	}
}
