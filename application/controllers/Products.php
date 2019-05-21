<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$data['page_title'] = 'Listar Produtos';
		$this->load->view('template/header', $data);
		$this->load->view('template/nav');
		$this->load->view('products-list');
		$this->load->view('template/footer');
	}

	public function newLead()
	{
		$data['page_title'] = 'Cadastrar Produto';
		$this->load->view('template/header', $data);
		$this->load->view('template/nav');
		$this->load->view('products-new');
		$this->load->view('template/footer');
	}
}
