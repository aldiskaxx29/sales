
<?php  

class Toko extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Toko';
		$data['user'] = $this->M_pegawai->get_where();
		$data['toko'] = $this->db->get('toko')->result();
		
		$this->form_validation->set_rules('kode_toko','Kode toko','required|trim|is_unique[toko.kode_toko]', [
			'required' => 'Tidak Boeleh Kosong',
			'is_unique' => 'Email Sudah Terdaftar'
		]);
		$this->form_validation->set_rules('nama_toko','Nama toko','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('no_telpon','No Telepon','required|trim|numeric', [
			'required' => 'Tidak Boeleh Kosong',
			'numeric' => 'Tidak boleh huruf harus angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar');
			$this->load->view('Pegawai/toko/data', $data);
			$this->load->view('templates/footer');
		}
		else{
			$kode_toko 	= $this->input->post('kode_toko');
			$nama_toko 	= $this->input->post('nama_toko');
			$alamat 	= $this->input->post('alamat');
			$no_telpon 	= $this->input->post('no_telpon');

			$data = [
				'kode_toko' => $kode_toko,
				'nama_toko' => $nama_toko,
				'alamat'	=> $alamat,
				'no_telpon' => $no_telpon
			];

			// var_dump($data);die;

			$this->M_pegawai->insert($data,'toko');
			$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Toko Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Pegawai/Toko');
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$where = ['id' => $id];
		// $where = ['id_produk' => $id];
		$data['toko'] = $this->M_pegawai->tampil_id($where, 'toko');

		$id 			= $this->input->post('id');
		$kode_toko 	= $this->input->post('kode_toko');
		$nama_toko 	= $this->input->post('nama_toko');
		$alamat 	= $this->input->post('alamat');
		$no_telpon 		= $this->input->post('no_telpon');

		$data = [
			'kode_toko' => $kode_toko,
			'nama_toko' => $nama_toko,
			'alamat' => $alamat,
			'no_telpon' => $no_telpon,
		];
		// var_dump($data);die;
		$where = ['id' => $id];
		$this->M_pegawai->edit($where,$data,'toko');
		$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Toko Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Toko');
	}

	public function delete($id){
		$where = ['id' => $id];
		$this->M_pegawai->delete($where,'toko');
		$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Toko Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Toko');
	}
}


?>