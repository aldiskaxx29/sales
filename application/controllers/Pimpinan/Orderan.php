<?php  

class Orderan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Orderan';
		$data['user'] = $this->M_pimpinan->get_where();
		$data['order'] = $this->M_pimpinan->join_order();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Pimpinan/Order/data', $data);
		$this->load->view('templates/footer');
	}

	public function verify(){
		$id 	= $this->input->post('id');
		$status = $this->input->post('status');

		$data = [
			'status' => $status,
		];

		$where = ['id' => $id];

		$this->M_pimpinan->edit($where,$data,'orderan');
		$this->session->set_flashdata('order','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Orderan Berhasil Di Acc
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
    	redirect('Pimpinan/Orderan');
	}
}


?>