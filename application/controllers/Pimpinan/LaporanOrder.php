<?php  

class LaporanOrder extends CI_Controller
{
	
	public function index(){
		$data['title'] = 'Laporan Orderan';
		$data['user'] = $this->M_pimpinan->get_where();
		$this->form_validation->set_rules('dari','Dari Tanggal','required|trim');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('Pimpinan/LaporanOrder/index');
			$this->load->view('templates/footer');
		}
		else{
			$data['title'] = 'Tampil Data Laporan Order';
			$data['user'] = $this->M_pimpinan->get_where();
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');

			$data['title'] = "Laporan Orderan ";
			$data['subtitle'] = "Dari Tanggal : " .$dari. ' Sampai Tanggal : ' .$sampai;
			$data['filter'] = $this->M_pimpinan->filterbytanggal($dari,$sampai);

			// $this->load->view('Pimpinan/LaporanOrder/printLaporan', $data);
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('Pimpinan/LaporanOrder/filter_laporan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function print(){
			$data['title'] = 'Print Data Laporan Order';
			// $data['user'] = $this->M_pimpinan->get_where();
			$dari = $this->input->get('dari');
			$sampai = $this->input->get('sampai');

			$data['title'] = "Laporan Orderan ";
			$data['subtitle'] = "Dari Tanggal : " .$dari. ' Sampai Tanggal : ' .$sampai;
			$data['filter'] = $this->M_pimpinan->filterbytanggal($dari,$sampai);

			$this->load->view('Pimpinan/LaporanOrder/printLaporan', $data);
	}
	
}

?>
		<!-- $data['user'] = $this->m_perpus->tampil_user();
		$data['title'] = 'Laporan Peminjaman';
		$this->form_validation->set_rules('dari','Dari Tanggal','required|trim');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/index');
			$this->load->view('templates/footer');
		}else{
			$data['user'] = $this->m_perpus->tampil_user();
			$data['title'] = 'Tampil Data Peminjam';
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');

			$data['laporan'] = $this->m_perpus->tampil_laporan($dari,$sampai);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('laporan/tampil_laporan', $data);
			$this->load->view('templates/footer'); -->
