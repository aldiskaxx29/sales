<?php  

class Dashboard extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Dashboard';
		$data['user'] = $this->M_pegawai->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Pegawai/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profil(){
		$data['title'] = 'Detal Profil';
		$data['user'] = $this->M_pegawai->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Pegawai/detail_profil', $data);
		$this->load->view('templates/footer');
	}
}


?>