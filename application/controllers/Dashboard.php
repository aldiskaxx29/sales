<?php  

class Dashboard extends CI_Controller{
	public function index(){
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Pegawai/dashboard', $data);
		$this->load->view('templates/footer');
	}
}


?>