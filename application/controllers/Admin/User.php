
<?php  

class User extends CI_Controller
{	
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] = 'Data Sales';
		$data['user'] = $this->M_pegawai->get_where();
		$data['users'] = $this->M_admin->get('user');
		// var_dump($data['user']);die;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/user/data', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		$data['title'] = 'Create Data User';
		$data['user'] = $this->M_pegawai->get_where();
		$data['users'] = $this->M_admin->get('user');
		$this->form_validation->set_rules('username','Username','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('phone','No Telepon','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', [
			'required' => 'Tidak Boeleh Kosong',
			'is_unique' => 'Makanya kalo kemana keman identitas'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|matches[password1]', [
			'required' => 'Tidak Boeleh Kosong',
			'matches'  => 'Password Tdaik Samain'
		]);
		$this->form_validation->set_rules('password1','Confirmasi Password','required|trim|matches[password]', [
			'required' => 'Tidak Boeleh Kosong',
			'matches'  => 'Password Tdaik Samain'
		]);
		$this->form_validation->set_rules('company','Company','required|trim', [
			'required' => 'Tidak Boeleh Kosong',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/user/create', $data);
			$this->load->view('templates/footer');
		}
		else{
			$nama = $this->input->post('username');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$company = $this->input->post('company');

			$data = [
				'username' => $nama,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'company' => $company,
				'phone' => $phone,
				'active' => 0
			];
			// var_dump($data);die;
			$this->M_admin->insert($data,'user');
			$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">User Berhasl Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/User');
		}
	}

	public function edit($id){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$where = ['id_user' => $id];
		$data['title'] = 'Create Data User';
		$data['user'] = $this->M_pegawai->get_where();
		$data['users'] = $this->db->get_where('user', $where)->row_array();
		// var_dump($data['users']);die;
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('phone','No Telepon','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		// $this->form_validation->set_rules('password','Password','required|trim|matches[password1]');
		// $this->form_validation->set_rules('password1','Confirmasi Password','required|trim|matches[password]');
		$this->form_validation->set_rules('company','Company','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/user/edit', $data);
			$this->load->view('templates/footer');
		}
		// else{
		// }
	}

	public function update(){
			$id 	= $this->input->post('id');
			$nama 	= $this->input->post('username');
			$phone 	= $this->input->post('phone');
			$email 	= $this->input->post('email');
			// $password = $this->input->post('password');
			$company = $this->input->post('company');
			$active = $this->input->post('active');

			$data = [
				'username' => $nama,
				'email' => $email,
				// 'password' => password_hash($password, PASSWORD_DEFAULT),
				'company' => $company,
				'phone' => $phone,
				'active' => $active
			];


			$where = ['id_user' => $id];

			$this->M_admin->edit($where,$data,'user');
			$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">
				User Berhasil Di Edit
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/User');

	}

	public function delete($id){
		$where = ['id_user' => $id];
		$this->db->delete('user', $where);
		$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Toko Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/User');
	}

}


?>