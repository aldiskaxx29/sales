
<?php  

class Order extends CI_Controller
{	
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Order';
		$data['user'] = $this->M_pegawai->get_where();
		// $data['order'] = $this->M_admin->get('orderan');
		$data['order'] = $this->M_admin->join_order();
		// var_dump($data['order']);die;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/order/data', $data);
		$this->load->view('templates/footer');
	}

	public function verify(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		// var_dump($status);die;

		$data  = ['status' => $status];
		$where = ['id' => $id];

		$this->M_pegawai->edit($where,$data,'orderan');
		$this->session->set_flashdata('order','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Status Orderan Berhasl Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Order');


	}

}


?>