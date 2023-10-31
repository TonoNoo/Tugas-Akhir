<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki_model extends CI_Model {
	public function transaksi_home() {
		$this->db->order_by('transaksi_created', 'DESC');
		$this->db->where('transaksi_tgl', date('Y-m-d'));
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
			redirect('koki/profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('koki/profil');
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
			redirect('koki/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('koki/password');
		}
	}
}