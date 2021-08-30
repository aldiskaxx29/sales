
<?php  

class Toko extends CI_Controller
{	
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
		$data['toko'] = $this->M_admin->get('toko');
		$data['kode'] = $this->M_admin->kodeToko();

		// $this->form_validation->set_rules('kode','Kode Toko','required|trim', [
		// 	'required' => 'Tidak Boeleh Kosong',
		// ]);
		$this->form_validation->set_rules('nama','Nama Toko','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('phone','No Telepon','required|trim|numeric', [
			'required' => 'Tidak Boeleh Kosong',
			'numeric'  => 'Tidak Boleh Huruf Harus Angka'
		]);
		$this->form_validation->set_rules('alamat','Alamat','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/toko/data', $data);
			$this->load->view('templates/footer');
		}
		else{
			$kode 	= $this->input->post('kode');
			$nama 	= $this->input->post('nama');
			$phone 	= $this->input->post('phone');
			$alamat = $this->input->post('alamat');

			$data = [
				'kode_toko' => $kode,
				'nama_toko' => $nama,
				'no_telpon' => $phone,
				'alamat' 	=> $alamat
			];

			$this->M_admin->insert($data,'toko');
			$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Toko Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Toko');
		}

	}

	public function edit(){
		$id 	= $this->input->post('id');
		$kode 	= $this->input->post('kode');
		$nama 	= $this->input->post('nama');
		$phone 	= $this->input->post('phone');
		$alamat = $this->input->post('alamat');

		$data = [
			'kode_toko' => $kode,
			'nama_toko' => $nama,
			'no_telpon' => $phone,
			'alamat' 	=> $alamat
		];


		$where = ['id' => $id];

		$this->M_admin->edit($where,$data,'toko');
		$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Toko Berhasil Di Edit
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Toko');
	}

	public function delete($id){
		$where = ['id' => $id];
		$this->db->delete('toko', $where);
		$this->session->set_flashdata('toko','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Toko Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Toko');
	}

}


?>