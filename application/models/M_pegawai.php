<?php  
date_default_timezone_set("Asia/Jakarta");

class M_pegawai extends CI_Model{
	public function get_where(){
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function get($table){
		return $this->db->get($table)->result();
	}

	public function insert($data,$table){
		$this->db->insert($table,$data);
	}

	public function tampil_id($where,$table){
		return $this->db->get_where($table, $where)->row_array();
	}

	public function edit($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($where,$table){
		$this->db->delete($table,$where);
	}

	public function db(){
		$this->db->select('*');
		$this->db->from('toko');
		$this->db->where('nama_toko');
		$query = $this->db->get();
		return $query->result();
	}

	public function join_order(){
		$query = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('orderan');
		$this->db->join('produk','produk.id_produk=orderan.id_produk');
		// $this->db->where('tgl_order', date('Y-m-d'));
		$this->db->where('sales', $this->session->userdata('username'));
		$query = $this->db->get();
		// var_dump($query);die;
		return $query->result();
	}
}

?>