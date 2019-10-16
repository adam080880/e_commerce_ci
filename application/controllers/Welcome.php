<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Kategori_Model');
		$this->load->model('Barang_Model');
	}

	public function index()
	{
		$this->load->view('customer/layout/navbar', [
			'title' => 'Index',
			'recent_navbar' => 'Home',	
			'cate' => $this->Kategori_Model->get()	
		]);
		$this->load->view('customer/landing_page', [
			'top_list' => $this->Barang_Model->getOrderByHarga(),
			'newest_list' => $this->Barang_Model->getBarangLimit15(),
		]);
		$this->load->view('customer/layout/footer', [
			'java' => [
				base_url() . 'assets/page/landing_page.js'
			]
		]);
	}

	public function login()
	{
		$this->load->view('customer/layout/navbar', [
			'title' => 'Index',
			'recent_navbar' => 'Login',	
			'cate' => $this->Kategori_Model->get()			
		]);
		$this->load->view('customer/login');
		$this->load->view('customer/layout/footer', [
			'java' => [
				base_url() . 'assets/page/login_customer.js'
			]
		]);
	}

	public function register()
	{
		$this->load->view('customer/layout/navbar', [
			'title' => 'Index',
			'recent_navbar' => 'register',	
			'cate' => $this->Kategori_Model->get()			
		]);
		$this->load->view('customer/register');
		$this->load->view('customer/layout/footer', [
			'java' => [
				base_url() . 'assets/page/register_customer.js'
			]
		]);
	}

	public function item($i)
	{
		$this->load->view('customer/layout/navbar', [
			'title' => 'Index',
			'recent_navbar' => 'item',	
			'cate' => $this->Kategori_Model->get()			
		]);
		$this->load->view('customer/item', [
			'item' => $this->Barang_Model->find($i)[0]
		]);
		$this->load->view('customer/layout/footer', [
			'java' => [
				base_url() . 'assets/page/item.js'
			]
		]);
	}
}
