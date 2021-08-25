
<?php  

class Kategori extends CI_Controller
{	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Kategori';
		$data['user'] = $this->M_pegawai->get_where();
		$data['kategori'] = $this->M_admin->get('tb_kategori');
		$this->form_validation->set_rules('kategori','Kategori','required|trim');
		// var_dump($data['user']);die;
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kategori/data', $data);
			$this->load->view('templates/footer');
		}
		else{
			$kategori = $this->input->post('kategori');

			$data = [
				'kategori' => $kategori,
			];
			// var_dump($data);die;
			$this->M_admin->insert($data,'tb_kategori');
			$this->session->set_flashdata('kategori','<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori Berhasl Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Kategori');
		}
	}


	public function update(){
			$id 	= $this->input->post('id');
			$kategori 	= $this->input->post('kategori');

			$data = [
				'kategori' => $kategori,
			];


			$where = ['id_kategori' => $id];

			$this->M_admin->edit($where,$data,'tb_kategori');
			$this->session->set_flashdata('kategori','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Kategori Berhasil Di Edit
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Kategori');

	}

	public function delete($id){
		$where = ['id_kategori' => $id];
		$this->db->delete('tb_kategori', $where);
		$this->session->set_flashdata('kategori','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Kategori Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Kategori');
	}

}


?>