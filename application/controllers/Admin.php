<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		if($this->session->userdata('status') != 'login') {
			redirect('login');
		}
	}

	public function index() {
		$data = array (
			'title'			=>	'Dashboard admin',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->db->get('tb_kategori')->num_rows(),
			'tmenu'			=>	$this->db->get('tb_menu')->num_rows(),
			'ttransaksi'	=>	$this->db->get('tb_transaksi')->num_rows(),
			'ltransaksi'	=>	$this->Admin_model->transaksi_home(),
			'profit'		=>	$this->Admin_model->profit(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	public function kategori() {
		$data = array (
			'title'			=>	'Data kategori',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->db->get('tb_kategori')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('admin/footer');
	}

	public function kategori_add() {
		$data = array (
			'title'			=>	'Input kategori',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kategori_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_kategori();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/kategori');
		}
	}

	public function kategori_edit($id) {
		$data = array (
			'title'			=>	'Edit kategori',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'katid'			=>	$this->db->get_where('tb_kategori',['kategori_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kategori_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_kategori($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/kategori');
		}
	}

	public function kategori_del($id) {
		$this->db->where('kategori_id', $id);
		$this->db->delete('tb_kategori');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/kategori');
	}

	public function menu() {
		$data = array (
			'title'			=>	'Data menu',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'menu'			=>	$this->Admin_model->data_menu(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu', $data);
		$this->load->view('admin/footer');
	}

	public function menu_add() {
		$data = array (
			'title'			=>	'Input menu',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->db->get('tb_kategori')->result_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus berupa angka']);
		$this->form_validation->set_rules('stok', 'stok', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/menu_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_menu();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/menu');
		}
	}

	public function menu_edit($id) {
		$data = array (
			'title'			=>	'Edit menu',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kategori'		=>	$this->db->get('tb_kategori')->result_array(),
			'menuid'		=>	$this->db->get_where('tb_menu',['menu_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus berupa angka']);
		$this->form_validation->set_rules('stok', 'stok', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/menu_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_menu($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/menu');
		}
	}

	public function menu_del($id) {
		$this->db->where('menu_id', $id);
		$this->db->delete('tb_menu');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/menu');
	}

	public function akses() {
		$data = array (
			'title'			=>	'Data akses',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'akses'			=>	$this->db->get('tb_admin')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/akses', $data);
		$this->load->view('admin/footer');
	}

	public function akses_add() {
		$data = array (
			'title'			=>	'Input akses',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[tb_admin.admin_username]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Username sudah ada']);
		$this->form_validation->set_rules('level', 'level', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akses_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_akses();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/akses');
		}
	}

	public function akses_edit($id) {
		$data = array (
			'title'			=>	'Edit akses',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'admid'			=>	$this->db->get_where('tb_admin',['admin_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'username', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('level', 'level', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akses_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_akses($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/akses');
		}
	}

	public function akses_del($id) {
		$this->db->where('admin_id', $id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/akses');
	}

	public function meja() {
		$data = array (
			'title'			=>	'Data meja',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'meja'			=>	$this->db->get('tb_meja')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/meja', $data);
		$this->load->view('admin/footer');
	}

	public function meja_add() {
		$data = array (
			'title'			=>	'Input meja',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('meja', 'meja', 'required|is_unique[tb_meja.meja_no]|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Nomor meja ini sudah ada',
					'numeric'	=>	'Harus berupa angka']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/meja_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_meja();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/meja');
		}
	}

	public function meja_yes($id) {
		$this->db->set('meja_status', 2);
		$this->db->where('meja_id', $id);
		$this->db->update('tb_meja');
		redirect('admin/meja');
	}

	public function meja_no($id) {
		$this->db->set('meja_status', 1);
		$this->db->where('meja_id', $id);
		$this->db->update('tb_meja');
		redirect('admin/meja');
	}

	public function meja_del($id) {
		$this->db->where('meja_id', $id);
		$this->db->delete('tb_meja');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/meja');
	}

	public function transaksi() {
		$data = array (
			'title'			=>	'Data transaksi',
			'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'transaksi'		=>	$this->Admin_model->data_transaksi(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('admin/footer');
	}

	public function lap_transaksi() {
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		if($start == '' AND $end == '') {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi(),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}
	}

	public function lap_transaksi_print() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi(),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}else {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}
	}

	public function lap_transaksi_excel() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi(),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}else {
			$data = array (
				'title'			=>	'Laporan transaksi',
				'me'			=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'		=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
				'start'			=>	$start,
				'end'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}
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
			$this->load->view('admin/header', $data);
			$this->load->view('admin/profil', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_profil();
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
			$this->load->view('admin/header', $data);
			$this->load->view('admin/password', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_password();
		}
	}
}