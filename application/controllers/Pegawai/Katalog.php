<?php  


class Katalog extends CI_Controller
{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}

		$data['title'] = 'Data Produk';
		$data['user'] = $this->M_pegawai->get_where();
		// $data['produk'] = $this->db->get('produk')->result();
		$data['produk'] = $this->M_pegawai->join_order();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('Pegawai/katalog/data', $data);
		$this->load->view('templates/footer');	
	}
}

?>