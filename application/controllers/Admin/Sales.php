
<?php  

class Sales extends CI_Controller
{	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Sales';
		$data['user'] = $this->M_admin->get_where();
		$data['sales'] = $this->M_admin->tampilSales()->result();
		// $data['sales'] = $this->M_admin->get('user');
		// var_dump($data['sales']);die;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/sales/data', $data);
		$this->load->view('templates/footer');
	}

}


?>