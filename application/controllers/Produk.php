<?php  

class Produk extends CI_Controller{
	public function index(){
		$data['title'] = 'Data Produk';
		$this->load->view('templates/pegawai/header', $data);
		$this->load->view('templates/pegawai/sidebar');
		$this->load->view('templates/pegawai/topbar');
		$this->load->view('Pegawai/produk/data', $data);
		$this->load->view('templates/pegawai/footer');
	}
}

?>