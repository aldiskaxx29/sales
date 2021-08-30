<?php  

class M_pimpinan extends CI_Model{
	public function get_where(){
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function tampil_id($where,$table){
		return $this->db->get_where($table, $where)->row_array();
	}

	public function insert($data,$table){
		$this->db->insert($table,$data);
	}
	
	public function get($table){
		return $this->db->get($table)->result();
	}

	public function edit($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delet($where,$table){
		$this->db->delete($table,$where);
	}

	public function gettahun(){
		$query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM tb_penjualan GROUP BY YEAR(taggal) ORDER BY YEAR(tanggal) ASC");
		return $query->result();
	}

	public function filterbytanggal($dari,$sampai){
		// $query = $this->db->query("SELECT * FROM orderan WHERE tgl_order BETWEEN '$dari' AND '$sampai' ORDER BY tgl_order ASC ");
		$query = $this->db->query("SELECT * FROM orderan JOIN produk ON orderan.id_produk = produk.id_produk JOIN toko ON toko.id  = orderan.id_toko WHERE tgl_order BETWEEN '$dari' AND '$sampai' ORDER BY tgl_order ASC ");
		return $query->result();
	}

	public function filterbybulan($tahun1,$bulanawal,$bulanakhir){
		$query = $this->db->query("SELECT * FROM tb_penjualan WHERE YEAR(tanggal) = '$tahun1' AND MONTH(tanggal) BETWEEN '$bulanawal' AND '$bulanahir' ORDER BY tanggal ASC ");
		return $query->result();
	}

	public function filterbytahun($tahun2){
		$query = $this->db->query("SELECT * FROM tb_penjualan WHERE YEAR(tanggal) = '$tahun2'ORDER BY tanggal ASC ");
		return $query->result();
	}

	public function join_order(){
		$this->db->select('*');
		$this->db->from('orderan');
		$this->db->join('produk','produk.id_produk=orderan.id_produk');
		$this->db->join('toko','toko.id = orderan.id_toko');
		$this->db->where_in('status', [0,3]);
		$query = $this->db->get();
		return $query->result();
	}

}

?>