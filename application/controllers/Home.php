<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$this->db->order_by('transaksi_urut', 'DESC');
        $sqlinc = $this->db->get('tb_transaksi');
        if ($sqlinc->num_rows() == 0) {
        	$autoinc = 1;
        }else {
        	$urutinc = $sqlinc->row()->transaksi_urut;
        	$urutinc++;
        	$autoinc = $urutinc;
        }
        $this->db->order_by('transaksi_urut', 'DESC');
        $sql = $this->db->get('tb_transaksi');
        if ($sql->num_rows() == 0) {
          $trxkode   = 'PSN'.date('ym').'0001';
        }else{
          $noUrut       = substr($sql->row()->transaksi_kode, 7, 4);
          $noUrut++;
          $trxkode     = 'PSN'.date('ym').sprintf("%04s", $noUrut);
        }
		$q = $this->input->post('kategori');
		if($q) {
			$data = array (
				'title'			=>	'Menu',
				'kategori'		=>	$this->db->get('tb_kategori')->result_array(),
				'menus'			=>	$this->data_menu_filter($q),
				'keranjang'		=>	$this->cart->contents(),
				'kodepsn'		=>	$trxkode,
				'meja'			=>	$this->db->get_where('tb_meja',['meja_status' => 1])->result_array(),
			);
			$this->load->view('home/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('home/footer');
		}else {
			$data = array (
				'title'			=>	'Menu',
				'kategori'		=>	$this->db->get('tb_kategori')->result_array(),
				'menus'			=>	$this->data_menu(),
				'keranjang'		=>	$this->cart->contents(),
				'kodepsn'		=>	$trxkode,
				'meja'			=>	$this->db->get_where('tb_meja',['meja_status' => 1])->result_array(),
			);
			$this->load->view('home/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('home/footer');
		}
	}

	private function data_menu() {
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori', 'tb_kategori.kategori_id = tb_menu.menu_kategori');
		$this->db->order_by('menu_created', 'DESC');
		return $this->db->get()->result_array();
	}

	private function data_menu_filter($q) {
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori', 'tb_kategori.kategori_id = tb_menu.menu_kategori');
		$this->db->order_by('menu_created', 'DESC');
		$this->db->like('menu_nama', $q);
		$this->db->or_like('menu_harga', $q);
		$this->db->or_like('kategori_nama', $q);
		return $this->db->get()->result_array();
	}

	public function cart_get($id) {
		$cek = $this->db->get_where('tb_menu',['menu_id' => $id])->row_array();
		$data = array (
			'id'			=>   $cek['menu_id'],
			'name'			=>   $cek['menu_nama'],
			'price'			=>   $cek['menu_harga'],
			'qty'			=>   1,
		);
	
		$this->cart->insert($data);
		redirect('');
	}

	public function cart_ubah() {
		$info = $_POST['cart'];
		foreach($info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$qty = $cart['qty'];
			$amount = $price * $qty;

			$data = array (
				'rowid'			=>	$rowid,
				'price'			=>	$price,
				'qty'			=>	$qty,
				'amount'		=>	$amount
			);

			$this->cart->update($data);
		}
		redirect('');
	}

	public function cart_trash($id) {
		$this->cart->remove($id);
		redirect('');
	}

	public function cart_kosong() {
		$this->cart->destroy();
		redirect('');
	}

	public function sev_trx() {
		if($this->cart->total() == '') {
			redirect('');
		}
		$this->db->set('meja_status', 2);
		$this->db->where('meja_no', $this->input->post('meja'));
		$this->db->update('tb_meja');
		$this->db->order_by('transaksi_urut', 'DESC');
        $sqlinc = $this->db->get('tb_transaksi');
        if ($sqlinc->num_rows() == 0) {
        	$autoinc = 1;
        }else {
        	$urutinc = $sqlinc->row()->transaksi_urut;
        	$urutinc++;
        	$autoinc = $urutinc;
        }
        $this->db->order_by('transaksi_urut', 'DESC');
        $sql = $this->db->get('tb_transaksi');
        if ($sql->num_rows() == 0) {
          $trxkode   = 'PSN'.date('ym').'0001';
        }else{
          $noUrut       = substr($sql->row()->transaksi_kode, 7, 4);
          $noUrut++;
          $trxkode     = 'PSN'.date('ym').sprintf("%04s", $noUrut);
        }
        $idtrx = md5(rand());
		$data = array (
			'transaksi_id'			=>   $idtrx,
			'transaksi_kode'		=>   $trxkode,
			'transaksi_urut'		=>   $autoinc,
			'transaksi_tgl'			=>   date('Y-m-d'),
			'transaksi_meja'		=>   $this->input->post('meja'),
			'transaksi_total'		=>   $this->cart->total(),
			'transaksi_status'		=>   'Pending',
		);
	
		if($this->db->insert('tb_transaksi', $data)) {
			foreach ($this->cart->contents() as $key) {
				$detail = array (
					'dt_id'			=> $idtrx,
					'dt_item'		=> $key['id'],
					'dt_qty' 		=> $key['qty'],
					'dt_subtotal' 	=> $key['subtotal']
				);

				$this->db->insert('tb_detail_transaksi', $detail);
			}
			$this->cart->destroy();
			redirect('invoice/'.$idtrx);
		}
	}

	public function struk($id) {
		$data = array (
			'title'			=>	'Invoice',
			'trxid'			=>	$this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array(),
		);
		$this->load->view('home/struk', $data);
	}
}
