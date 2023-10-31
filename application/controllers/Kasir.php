<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Kasir_model');
		if($this->session->userdata('status') != 'login') {
			redirect('login');
		}
	}

	public function index() {
		$data = array (
			'title'			=>	'Dashboard kasir',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'pending'		=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'Pending'])->num_rows(),
			'bdibayar'		=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'Diproses'])->num_rows(),
			'dibayar'		=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'Selesai'])->num_rows(),
			'ttransaksi'	=>	$this->db->get_where('tb_transaksi',['transaksi_tgl' => date('Y-m-d')])->num_rows(),
			'ltransaksi'	=>	$this->Kasir_model->transaksi_home(),
		);
		$this->load->view('kasir/header', $data);
		$this->load->view('kasir/index', $data);
		$this->load->view('kasir/footer');
	}

	public function transaksi_confirm($id) {
		$this->db->set('transaksi_status', 'Diproses');
		$this->db->where('transaksi_id', $id);
		$this->db->update('tb_transaksi');
		redirect('kasir/dashboard');
	}

	public function transaksi_done($id) {
		$cekmeja = $this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array();
		$this->db->set('transaksi_status', 'Selesai');
		$this->db->where('transaksi_id', $id);
		$this->db->update('tb_transaksi');
		$this->db->set('meja_status', 1);
		$this->db->where('meja_no', $cekmeja['transaksi_meja']);
		$this->db->update('tb_meja');
		redirect('kasir/dashboard');
	}

	public function struk($id) {
		$data = array (
			'title'			=>	'Struk',
			'trxid'			=>	$this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array(),
		);
		$this->load->view('kasir/struk', $data);
	}

	public function profil() {
		$data = array (
			'title'			=>	'Atur profil',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('kasir/header', $data);
			$this->load->view('kasir/profil', $data);
			$this->load->view('kasir/footer');
		}else {
			$this->Kasir_model->simpan_profil();
		}
	}

	public function password() {
		$data = array (
			'title'			=>	'Atur password',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru harus sama']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('kasir/header', $data);
			$this->load->view('kasir/password', $data);
			$this->load->view('kasir/footer');
		}else {
			$this->Kasir_model->simpan_password();
		}
	}
}