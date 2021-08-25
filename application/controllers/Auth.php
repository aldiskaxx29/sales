<?php  

class Auth extends CI_Controller{
	public function index(){
		$data['title'] = 'Login';
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('Auth/login', $data);
			$this->load->view('template_auth/footer');
		}
		else{
			$this->_login();
		}
	}

	private function _login(){
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['active'] == 1) {
					$data = [
						'username' => $user['username'],
						'email' => $user['email'],
						'company' => $user['company']
					];

					$this->session->set_userdata($data);
					if ($user['company'] == 'PIMPINAN') {
						redirect('Pimpinan/Dashboard');
					}
					elseif($user['company'] == 'ADMIN'){
						redirect('Admin/Dashboard');
					}
					else{
						redirect('Pegawai/Dashboard');
					}
				}
				else{
					$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">User Belum Di Actifkan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
				}
			}
			else{
				$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
			}
		}	
		else{
			$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Email Belum Terdaftar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}

	public function registrasi(){
		$data['title'] = 'Registrasi';
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('phone','No Telepon','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|matches[password1]');
		$this->form_validation->set_rules('password1','Confirmasi Password','required|trim|matches[password]');
		$this->form_validation->set_rules('company','Company','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('Auth/registrasi', $data);
			$this->load->view('template_auth/footer');
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
			$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">Akun Berhasl Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}


}

?>