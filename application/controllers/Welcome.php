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
        //load model admin
		$this->load->model('pemohon');
		$this->load->helper(array('form', 'url','download','html'));  
		$this->load->library(array('form_validation', 'session'));
		$autoload['libraries'] = array('database');
	}

	public function index()
	{
		$this->load->view('Landing_Page');
	}

	public function cari()
	{
		$this->load->model('SearchModel');
		$keyword = $this->input->get('keyword');
		$data = $this->SearchModel->ambil_data($keyword);
		$data = array(
			'keyword'	=> $keyword,
			'data'		=> $data
		);
		$this->load->view('Cek_Data_Pemohon',$data);
	}

	public function home()
	{
		$this->load->view('Home_Page');
	}

	public function Apa_itu_PTSL()
	{
		$this->load->view('Apa_itu_PTSL');
	}

	public function Alur_PTSL()
	{
		$this->load->view('Alur_PTSL');
	}

	public function Panitia_PTSL()
	{
		$this->load->view('Panitia_PTSL');
	}

	public function Cek_Data_Pemohon()
	{
		$this->load->view('Cek_Data_Pemohon');
	}

	public function Pengumuman()
	{
		$this->load->view('Pengumuman');
	}

	public function Detil_Pengumuman()
	{
		$this->load->view('Detil_Pengumuman');
	}

	// function pemohon(){
	// 	$this->load->model("pemohon");	
	// 	$data['nama'] = 'nama';
	// 	$data['detail_pemohon'] = $this->pemohon->get_data_pemohon();
	// 	$this->load->view('Detail_Pemohon', $data);
	// }

	// public function cek_pemohon()
	// {
		
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['nama'] = $this->input->post('nama') ? $this->input->post('nama') : '';
	// 	}
	// 	$this->load->view('Detail_Pemohon', $data);
	// }

	public function cek_pemohon(){
		$data['nama'] = $this->pemohon->tampil_data()->result();
		$this->load->view('Detail_Pemohon',$data);
	}


}
