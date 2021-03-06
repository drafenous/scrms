<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {
	public function index()
	{
		$data['page_title'] = 'Listar Leads';
		$this->load->view('template/header', $data);
		$this->load->view('template/nav');
		$this->load->view('leads-list');
		$this->load->view('template/footer');
	}

	public function newLead()
	{
		$data['page_title'] = 'Cadastrar Lead';
		$this->load->view('template/header', $data);
		$this->load->view('template/nav');
		$this->load->view('leads-new');
		$this->load->view('template/footer');
	}
}
