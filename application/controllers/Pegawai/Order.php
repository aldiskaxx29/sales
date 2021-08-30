<?php  

class Order extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		// $user = $this->session->userdata('username');
		// var_dump($user);die;
		$data['title'] = 'Data Order';
		$data['user'] = $this->M_pegawai->get_where();
		// $data['order'] = $this->db->get('orderan')->result();
		$data['order'] = $this->M_pegawai->join_order();
		$data['produk'] = $this->db->get('produk')->result();


		$data['toko'] = $this->db->get('toko')->result();
		$data['kategori'] = $this->db->get('tb_kategori')->result();
		// $ada = $this->M_pegawai->db();
		// var_dump($data['toko']);die;
		$this->form_validation->set_rules('id_produk','Kode Produk','required|trim', [
			'required' => 'Tidak boleh Kosong',
		]);
		$this->form_validation->set_rules('kode_toko','Kode Toko','required|trim', [
			'required' => 'Tidak boleh Kosong',
		]);
		$this->form_validation->set_rules('qty','Nama Quantiity','required|trim|numeric', [
			'required' => 'Tidak boleh Kosong',
			'numeric' => 'Tidak boleh huruf harus angka '
		]);
		$this->form_validation->set_rules('keterangan','Keterangan','required|trim', [
			'required' => 'Tidak boleh Kosong',
		]);			

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar');
			$this->load->view('Pegawai/order/data', $data);
			$this->load->view('templates/footer');	
		}else{
			$cek_qty = $this->db->get('produk')->result();

			$id_produk 		= $this->input->post('id_produk');
			$id_toko 		= $this->input->post('kode_toko');
			$qty 			= $this->input->post('qty');
			$keterangan 	= $this->input->post('keterangan');

			$wh = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
			// echo $wh['stok'];die;
			if ($qty >= $wh['stok']) {
				$this->session->set_flashdata('orderan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Qty Melebihi Batas Stok Barang
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('Pegawai/Order');
			}
			else{

			$data = [
				'id_produk'			=> $id_produk,
				'id_toko'			=> $id_toko,
				'sales'				=> $this->session->userdata('username'),
				'tgl_order' 		=> date('Y-m-d'),
				'qty' 				=> $qty,
				'keterangan' 		=> $keterangan,
			];


			// var_dump($data);die;
			$this->M_pegawai->insert($data,'orderan');
			$this->session->set_flashdata('orderan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Orderan Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Pegawai/Order');

			}

		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$where = ['id' => $id];
		// $where = ['id_produk' => $id];
		$data['order'] = $this->M_pegawai->tampil_id($where, 'orderan');

		// $id 			= $this->input->post('id');
		$nama_toko 		= $this->input->post('nama_toko');
		$alamat 		= $this->input->post('alamat');
		// $nama_produk 		= $this->input->post('nama_produk');
		$qty 		= $this->input->post('qty');
		$keterangan 		= $this->input->post('keterangan');

		$data = [
			'nama_toko' => $nama_toko,
			'alamat' => $alamat,
			// 'nama_produk' => $nama_produk,
			'qty' => $qty,
			'keterangan' => $keterangan
		];
		// var_dump($data);die;
		$where = ['id' => $id];
		$this->M_pegawai->edit($where,$data,'orderan');
		$this->session->set_flashdata('orderan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Orderan Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Order');
	}

	public function delete($id){
		$where = ['id' => $id];
		$this->M_pegawai->delete($where,'orderan');
		$this->session->set_flashdata('orderan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Orderan Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Order');
	}
}


?>