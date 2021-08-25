<?php  

class Absen extends CI_Controller{
	public function index(){
      if (!$this->session->userdata('email')) {
         redirect('Auth');
      }
		$data['title'] = 'Data Absen';
		$data['absen'] = $this->M_pegawai->get('absen');
      $data['user'] = $this->M_pegawai->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('Pegawai/absen/data', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		$this->form_validation->set_rules('nama','Nama','required|trim', [
         'required' => 'Tidak Boeleh Kosong',
      ]);
		$this->form_validation->set_rules('total','Total','required|trim', [
         'required' => 'Tidak Boeleh Kosong',
      ]);

        $config['upload_path']          = './assets/img/absen/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['enctype_name']         = TRUE;

        // $config['max_width']            = 2048;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        //foto1
        if (!empty($_FILES['foto1']['name'])){
           $this->upload->do_upload('foto1');
           $data1 = $this->upload->data();
           $foto1 = $data1['file_name'];
        }

        //foto2
        if (!empty($_FILES['foto2']['name'])){
           $this->upload->do_upload('foto2');
           $data2 = $this->upload->data();
           $foto2 = $data2['file_name'];
        }

        // foto3
        if (!empty($_FILES['foto3']['name'])){
           $this->upload->do_upload('foto3');
           $data3 = $this->upload->data();
           $foto3 = $data3['file_name'];
        }

        // foto4
        if (!empty($_FILES['foto4']['name'])){
           $this->upload->do_upload('foto4');
           $data4 = $this->upload->data();
           $foto4 = $data4['file_name'];
        }

        if ($this->form_validation->run()) {
        	$nama = $this->input->post('nama');
        	$total = $this->input->post('total');

        	$data = [
        		'tgl_absen' => date('Y-m-d'),
        		'nama'  => $nama,
        		'foto1' => $foto1,
        		'foto2' => $foto2,
        		'foto3' => $foto3,
        		'foto4' => $foto4,
        		'total' => $total
        	];
         // var_dump($data);die;
        	$this->M_pegawai->insert($data,'absen');
			$this->session->set_flashdata('absen','<div class="alert alert-success alert-dismissible fade show" role="alert">User Berhasil Absen
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
        	redirect('Pegawai/Absen');
        }
        else{
        	
        }
	}
}


?>