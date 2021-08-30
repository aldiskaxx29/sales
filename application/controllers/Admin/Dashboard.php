
<?php  

class Dashboard extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Dashboard';
		$data['user'] = $this->M_admin->get_where();
		// var_dump($data['user']);die;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/Dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profil(){
		$data['title'] = 'Detal Profil';
		$data['user'] = $this->M_admin->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Admin/detail_profil', $data);
		$this->load->view('templates/footer');
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('company');
		redirect('Auth');
	}
}


?>