<?php  

class Produk extends CI_Controller{
	// public function index(){
	// 	$data['title'] = 'Data Produk';
	// 	$data['produk'] = $this->db->get('produk')->result();
	// 	$this->load->view('templates/pegawai/header', $data);
	// 	$this->load->view('templates/pegawai/sidebar');
	// 	$this->load->view('templates/pegawai/topbar');
	// 	$this->load->view('Pegawai/produk/data', $data);
	// 	$this->load->view('templates/pegawai/footer');
	// }

	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Produk';
		$data['user'] = $this->M_pegawai->get_where();
		// $data['produk'] = $this->db->get('produk')->result();
		$data['produk'] = $this->M_pegawai->join_order();
		$this->form_validation->set_rules('kode_produk','Kode produk','required|trim|is_unique[produk.kode_produk]', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('nama_produk','Nama produk','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('harga_produk','Harga Produk','required|trim|numeric', [
			'required' => 'Tidak Boeleh Kosong',
			'nimeric'  => 'infi Di sebaigai bagus banget anakan '
		]);
		$this->form_validation->set_rules('deskripsi','deskripsi','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('qty','Quantity','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		// if (!$this->input->post('foto')) {
		// 	$this->form_validation->set_rules('foto','Foto','required|trim');
		// }
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar');
			$this->load->view('Pegawai/produk/data', $data);
			$this->load->view('templates/footer');		
		}else{
			$kode_produk = $this->input->post('kode_produk');
			$nama_produk = $this->input->post('nama_produk');
			$harga_produk = $this->input->post('harga_produk');
			$deskripsi 	= $this->input->post('deskripsi');
			$qty 		= $this->input->post('qty');

			$foto = $_FILES['foto']['name'];

			if ($foto) {
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/produk/';
				// $config['enctype_name'] = TRUE;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo 'file tidak berhasil di upload';die;
				}
				else{
					$foto = $this->upload->data('file_name');
				}

				$data = [
					'kode_produk' => $kode_produk,
					'nama_produk' => $nama_produk,
					'harga_produk' => $harga_produk,
					'deskripsi' => $deskripsi,
					'qty' => $qty,
					'gambar' => $foto
				];

				// var_dump($data);die;
				$this->M_pegawai->insert($data,'produk');
				$this->session->set_flashdata('produk','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Produk Berhasil Di Tambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('Pegawai/Produk');

			}
			else{
				echo 'gambar tidak ada';die;
			}
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$where = ['id_produk' => $id];
		// $where = ['id_produk' => $id];
		$data['produk'] = $this->M_pegawai->tampil_id($where, 'produk');

		$id 			= $this->input->post('id');
		$kode_produk 	= $this->input->post('kode_produk');
		$nama_produk 	= $this->input->post('nama_produk');
		$harga_produk 	= $this->input->post('harga_produk');
		$deskripsi 		= $this->input->post('deskripsi');
		$qty 			= $this->input->post('qty');

		$gambar = $_FILES['foto']['name'];

		if ($gambar) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/produk/';
			// $config['enctype_name'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$img_old = $data['produk']['gambar'];
				unlink(FCPATH . '/assets/img/produk/' . $img_old);

				$img_new = $this->upload->data('file_name');
				$this->db->set('gambar', $img_new);
			}
			else{
				echo 'Password eror';die;
			}
		}

		$data = [
			'kode_produk' => $kode_produk,
			'nama_produk' => $nama_produk,
			'harga_produk' => $harga_produk,
			'deskripsi' => $deskripsi,
			'qty' => $qty,
		];
		// var_dump($data);die;
		$where = ['id_produk' => $id];
		$this->M_pegawai->edit($where,$data,'produk');
		$this->session->set_flashdata('produk','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Produk Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Produk');
	}

	public function delete($id){
		$where = ['id_produk' => $id];
		$data['produk'] = $this->db->get_where('produk', $where)->row_array();
		$gambar = $data['produk']['gambar'];
		// var_dump($data['produk']);die;
		if ($gambar) {
			unlink(FCPATH . './assets/img/produk/' .$gambar);
		}
		$this->M_pegawai->delete($where,'produk');
		$this->session->set_flashdata('produk','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Produk Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Pegawai/Produk');
	}
}

?>
<!-- 				if ($this->upload->do_upload('image')) {
					$image_old = $data['mobil']['gambar'];
					if ($image_old != 'default.jpg'){
						unlink(FCPATH . 'assets/assets_admin/foto/' .$image_old);
					}

					$image_new = $this->upload->data('file_name');
					$this->db->set('gambar', $image_new);
				}
 -->