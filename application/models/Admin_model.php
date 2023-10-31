<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function simpan_kategori() {
		$data = array (
			'kategori_id'		=>   rand(),
			'kategori_nama'		=>   ucwords($this->input->post('nama')),
		);
	
		$this->db->insert('tb_kategori', $data);
	}

	public function edit_kategori($id) {
		$data = array (
			'kategori_nama'		=>   ucwords($this->input->post('nama')),
		);
	
		$this->db->where('kategori_id', $id);
		$this->db->update('tb_kategori', $data);
	}

	public function data_menu() {
		$this->db->select('*');
		$this->db->from('tb_menu');
		$this->db->join('tb_kategori', 'tb_kategori.kategori_id = tb_menu.menu_kategori');
		$this->db->order_by('menu_created', 'DESC');
		return $this->db->get()->result_array();
	}

	public function simpan_menu() {
	
	    // get foto
	    $config['upload_path'] = './wp-content/images/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'menu_id'			=>	md5(rand()),
                    'menu_nama'			=>	ucwords($this->input->post('nama')),
                    'menu_harga'		=>	$this->input->post('harga'),
                    'menu_stok'			=>	$this->input->post('stok'),
                    'menu_kategori'		=>	$this->input->post('kategori'),
					'menu_foto'			=>	$gambar['file_name']
                );
				$this->db->insert('tb_menu', $data);
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Kolom foto masih kosong');
			redirect('admin/master/menu/new');
	    }
	
	}
	
	public function edit_menu($id) {
	
	    // get foto
	    $config['upload_path'] = './wp-content/images/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'menu_nama'			=>	ucwords($this->input->post('nama')),
                    'menu_harga'		=>	$this->input->post('harga'),
                    'menu_stok'			=>	$this->input->post('stok'),
                    'menu_kategori'		=>	$this->input->post('kategori'),
					'menu_foto'			=>	$gambar['file_name']
                );
                $this->db->where('menu_id', $id);
				$this->db->update('tb_menu', $data);
           }
	    }else {
	    	$data = array(
                'menu_nama'			=>	ucwords($this->input->post('nama')),
                'menu_harga'		=>	$this->input->post('harga'),
                'menu_stok'			=>	$this->input->post('stok'),
                'menu_kategori'		=>	$this->input->post('kategori'),
				'menu_foto'			=>	$this->input->post('gambar_old')
	        );
	        $this->db->where('menu_id', $id);
			$this->db->update('tb_menu', $data);
	    }
	}

	public function simpan_akses() {
		$data = array (
			'admin_id'				=>   md5(rand()),
			'admin_nama'			=>   ucwords($this->input->post('nama')),
			'admin_username'		=>   strtolower($this->input->post('username')),
			'admin_password'		=>   password_hash('12345', PASSWORD_DEFAULT),
			'admin_foto'			=>   'avatar.jpg',
			'admin_level'			=>   $this->input->post('level'),
		);
	
		$this->db->insert('tb_admin', $data);
	}

	public function edit_akses($id) {
		$data = array (
			'admin_nama'			=>   ucwords($this->input->post('nama')),
			'admin_username'		=>   strtolower($this->input->post('username')),
			'admin_level'			=>   $this->input->post('level'),
		);
	
		$this->db->where('admin_id', $id);
		$this->db->update('tb_admin', $data);
	}

	public function simpan_meja() {
		$data = array (
			'meja_id'				=>   rand(),
			'meja_no'				=>   $this->input->post('meja'),
			'meja_status'			=>   1,
		);
	
		$this->db->insert('tb_meja', $data);
	}

	public function profit() {
		$this->db->select('SUM(transaksi_total) as profit');
		
		$this->db->from('tb_transaksi');
		return $this->db->get()->row()->profit;
	}

	public function transaksi_home() {
		$this->db->order_by('transaksi_created', 'DESC');
		$this->db->limit(5);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi() {
		$this->db->order_by('transaksi_created', 'DESC');
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi_filter($daterange) {
		$this->db->where('transaksi_tgl >=', $daterange[0]);
		$this->db->where('transaksi_tgl <=', $daterange[1]);
		$this->db->order_by('transaksi_created', 'DESC');
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function simpan_profil() {
		$password = $this->input->post('password');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($password, $cek['admin_password'])) {
			$config['upload_path'] = './wp-content/images/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'admin_nama'			=>	ucwords($this->input->post('nama')),
						'admin_foto'			=>	$gambar['file_name']
	                );
	           }
		    }else {
		    	$data = array(
	                'admin_nama'				=>	ucwords($this->input->post('nama')),
					'admin_foto'				=>	$this->input->post('gambar_old')
		        );
		    }
		
			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil berhasil diperbaharui');
			redirect('admin/profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('admin/profil');
		}
	}

	public function simpan_password() {
		$password = $this->input->post('password');
		$password2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($password, $cek['admin_password'])) {
			$this->db->set('admin_password', $password2);
			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Password berhasil diperbaharui');
			redirect('admin/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('admin/password');
		}
	}
}