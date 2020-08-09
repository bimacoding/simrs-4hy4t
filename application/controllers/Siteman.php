<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// cek_session_user();
		// $this->load->model('model_app');
	}

	function index()
	{
		
		if (isset($_POST['submit'])) {
			$username = $this->input->post('a');
			$password = md5($this->input->post('b'));
			$cek = $this->model_app->cek_login($username, $password,'t_users');
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$array = array(
					'email'   => $row['email'],
					'level'   => $row['level'],
					'id' 	  => $row['id_users'],
					'nama' 	  => $row['nama'],
					'nik' 	  => $row['nopeg'],
					'foto' 	  => $row['foto']
				);
				
				$this->session->set_userdata( $array );
				redirect('siteman/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('@bima_coding/login',$data);
			}
		}else{
			if ($this->session->userdata('level')!='') {
				 redirect('siteman/home','refresh');
			}else{
				$this->load->view('@bima_coding/login');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('siteman');
	}

	function qr_login()
	{
		
		$this->load->view('@bima_coding/qrlogin');
		
	}


	function qr_login_verify()
	{
		// $this->session->sess_destroy();
		$nopeg = $this->uri->segment(3);
		$cek = $this->model_app->cek_nopeg($nopeg,'t_users');
		$row = $cek->row_array();
		$total = $cek->num_rows();
		if ($total > 0) {
			$array = array(
				'email'   => $row['email'],
				'level'   => $row['level'],
				'id' 	  => $row['id_users'],
				'nama' 	  => $row['nama'],
				'nik' 	  => $row['nopeg'],
				'foto' 	  => $row['foto']
			);
			
			$this->session->set_userdata( $array );
			redirect('siteman/home');
		}else{
			$data['title'] = 'Username atau Password salah!';
			$this->load->view('@bima_coding/qrlogin',$data);
		}
	}

	function home()
	{
		// cek_session_user();
		cek_session_user();
		$data['title'] = "Dashboard admin";
		$this->template->load('@bima_coding/template','@bima_coding/main',$data);
	}

	function scan_qr()
	{
		// 
		cek_session_user();
		$data['title'] = "Scan QR code";
		$this->template->load('@bima_coding/template','@bima_coding/scanQR',$data);
	}

	function scanner()
	{
		// 
		cek_session_user();
		$data['title'] = "Scan Alat";
		$this->template->load('@bima_coding/template','@bima_coding/scanner',$data);
	}

	function history_inv()
	{
		$kd = $this->uri->segment(3);
		$data['title'] = "Riwayat Alat";
		$qry = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
								LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
								LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
								LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
								LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
								LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
								LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
								LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
								WHERE a.noinv = '".$kd."'
								ORDER BY bb.id_pemeliharaan DESC");
		// print_r($qry);
		$data['record'] = $qry;
		$data['rowx'] = $qry->row_array();
		$this->template->load('@bima_coding/template','@bima_coding/history',$data);
	}

	

	function c()
	{
		$this->load->view('@bima_coding/event');	
	}


	function download($file)
	{
		cek_session_user();
		$this->load->helper('download');
		force_download('assets/uploads/'.$file , NULL);
	}

	function merk()
	{
		cek_session_user();
		$data['title'] = 'Data Merk';
		$data['record'] = $this->model_app->view_ordering('t_merk','id_merk','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_merk/view',$data);
	}

	function tambah_merk()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_merk' => $this->db->escape_str($this->input->post('merk'))
					);
			$q = $this->model_app->insert('t_merk',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Merk',$this->input->post('merk'));
				redirect('siteman/merk','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/merk','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Merk';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_merk/add',$data);
		}
		

	}

	function ubah_merk()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_merk' => $this->db->escape_str($this->input->post('merk'))
					);
			$where = array('id_merk'=>$this->input->post('id'));
			$q = $this->model_app->update('t_merk',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Merk',$this->input->post('merk'));
				redirect('siteman/merk','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/merk','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data Merk';
			$data['row'] = $this->model_app->edit('t_merk',array('id_merk'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_merk/edit',$data);
		}
		

	}

	function hapus_merk()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_merk'=>$id);
		$q = $this->model_app->delete('t_merk',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/merk','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/merk','refresh');
		}
		$dt = $this->model_app->view_where('t_merk',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Merk',$dt['nama_merk']);
	}

	function kondisi()
	{
		cek_session_user();
		$data['title'] = 'Data kondisi';
		$data['record'] = $this->model_app->view_ordering('t_kondisi','id_kondisi','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_kondisi/view',$data);
	}

	function tambah_kondisi()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_kondisi' => $this->db->escape_str($this->input->post('kondisi'))
					);
			$q = $this->model_app->insert('t_kondisi',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Kondisi',$this->input->post('kondisi'));
				redirect('siteman/kondisi','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/kondisi','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data kondisi';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_kondisi/add',$data);
		}
		

	}

	function ubah_kondisi()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_kondisi' => $this->db->escape_str($this->input->post('kondisi'))
					);
			$where = array('id_kondisi'=>$this->input->post('id'));
			$q = $this->model_app->update('t_kondisi',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah kondisi',$this->input->post('kondisi'));
				redirect('siteman/kondisi','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/kondisi','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data kondisi';
			$data['row'] = $this->model_app->edit('t_kondisi',array('id_kondisi'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_kondisi/edit',$data);
		}
		

	}

	function hapus_kondisi()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_kondisi'=>$id);
		$q = $this->model_app->delete('t_kondisi',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/kondisi','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/kondisi','refresh');
		}
		$dt = $this->model_app->view_where('t_kondisi',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus kondisi',$dt['nama_kondisi']);
	}

	function lokasi()
	{
		cek_session_user();
		$data['title'] = 'Data lokasi';
		$data['record'] = $this->model_app->view_ordering('t_lokasi','id_lokasi','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_lokasi/view',$data);
	}

	function tambah_lokasi()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_lokasi' => $this->db->escape_str($this->input->post('lokasi'))
					);
			$q = $this->model_app->insert('t_lokasi',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Lokasi',$this->input->post('lokasi'));
				redirect('siteman/lokasi','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/lokasi','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data lokasi';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_lokasi/add',$data);
		}
		

	}

	function ubah_lokasi()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_lokasi' => $this->db->escape_str($this->input->post('lokasi'))
					);
			$where = array('id_lokasi'=>$this->input->post('id'));
			$q = $this->model_app->update('t_lokasi',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Lokasi',$this->input->post('lokasi'));
				redirect('siteman/lokasi','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/lokasi','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data lokasi';
			$data['row'] = $this->model_app->edit('t_lokasi',array('id_lokasi'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_lokasi/edit',$data);
		}
		

	}

	function hapus_lokasi()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_lokasi'=>$id);
		$q = $this->model_app->delete('t_lokasi',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/lokasi','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/lokasi','refresh');
		}
		$dt = $this->model_app->view_where('t_lokasi',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Lokasi',$dt['nama_lokasi']);
	}

	function distributor()
	{
		cek_session_user();
		$data['title'] = 'Data Distributor';
		$data['record'] = $this->model_app->view_ordering('t_distributor','id_distributor','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_distributor/view',$data);
	}

	function tambah_distributor()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'kota' => $this->db->escape_str($this->input->post('kota')),
						'tlp' => $this->db->escape_str($this->input->post('tlp')),
						'fax' => $this->db->escape_str($this->input->post('fax')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'situs' => $this->db->escape_str($this->input->post('situs')),
						'teknisi' => $this->db->escape_str($this->input->post('teknisi')),
						'nohp_teknisi' => $this->db->escape_str($this->input->post('nohp_teknisi'))
					);
			$q = $this->model_app->insert('t_distributor',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Distributor',$this->input->post('nama'));
				redirect('siteman/distributor','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/distributor','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data distributor';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_distributor/add',$data);
		}
		

	}

	function ubah_distributor()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'kota' => $this->db->escape_str($this->input->post('kota')),
						'tlp' => $this->db->escape_str($this->input->post('tlp')),
						'fax' => $this->db->escape_str($this->input->post('fax')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'situs' => $this->db->escape_str($this->input->post('situs')),
						'teknisi' => $this->db->escape_str($this->input->post('teknisi')),
						'nohp_teknisi' => $this->db->escape_str($this->input->post('nohp_teknisi'))
					);
			$where = array('id_distributor'=>$this->input->post('id'));
			$q = $this->model_app->update('t_distributor',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Distributor',$this->input->post('nama'));
				redirect('siteman/distributor','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/distributor','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data distributor';
			$data['row'] = $this->model_app->edit('t_distributor',array('id_distributor'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_distributor/edit',$data);
		}
		

	}

	function hapus_distributor()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_distributor'=>$id);
		$q = $this->model_app->delete('t_distributor',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/distributor','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/distributor','refresh');
		}
		$dt = $this->model_app->view_where('t_distributor',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Distributor',$dt['nama']);
	}

	function supplier()
	{
		cek_session_user();
		$data['title'] = 'Data supplier';
		$data['record'] = $this->model_app->view_ordering('t_supplier','id_supplier','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_supplier/view',$data);
	}

	function tambah_supplier()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'kota' => $this->db->escape_str($this->input->post('kota')),
						'tlp' => $this->db->escape_str($this->input->post('tlp')),
						'fax' => $this->db->escape_str($this->input->post('fax')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'situs' => $this->db->escape_str($this->input->post('situs')),
						'teknisi' => $this->db->escape_str($this->input->post('teknisi')),
						'nohp_teknisi' => $this->db->escape_str($this->input->post('nohp_teknisi'))
					);
			$q = $this->model_app->insert('t_supplier',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Supplier',$this->input->post('nama'));
				redirect('siteman/supplier','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/supplier','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data supplier';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_supplier/add',$data);
		}
		

	}

	function ubah_supplier()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'kota' => $this->db->escape_str($this->input->post('kota')),
						'tlp' => $this->db->escape_str($this->input->post('tlp')),
						'fax' => $this->db->escape_str($this->input->post('fax')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'situs' => $this->db->escape_str($this->input->post('situs')),
						'teknisi' => $this->db->escape_str($this->input->post('teknisi')),
						'nohp_teknisi' => $this->db->escape_str($this->input->post('nohp_teknisi'))
					);
			$where = array('id_supplier'=>$this->input->post('id'));
			$q = $this->model_app->update('t_supplier',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Supplier',$this->input->post('nama'));
				redirect('siteman/supplier','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/supplier','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data supplier';
			$data['row'] = $this->model_app->edit('t_supplier',array('id_supplier'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_supplier/edit',$data);
		}
		

	}

	function hapus_supplier()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_supplier'=>$id);
		$q = $this->model_app->delete('t_supplier',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/supplier','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/supplier','refresh');
		}
		$dt = $this->model_app->view_where('t_supplier',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Supplier',$dt['nama']);
	}

	function alat()
	{
		cek_session_user();
		$data['title'] = 'Data alat';
		$data['record'] = $this->model_app->view_join_one('t_alat','t_merk','id_merk','id_alat','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_alat/view',$data);
	}

	function tambah_alat()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'id_merk' => $this->db->escape_str($this->input->post('id_merk')),
						'kode_alat' => $this->db->escape_str($this->input->post('kode_alat')),
						'nama_alat' => $this->db->escape_str($this->input->post('nama_alat')),
						'model_tipe' => $this->db->escape_str($this->input->post('model_tipe'))
					);
			$q = $this->model_app->insert('t_alat',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah alat',$this->input->post('nama_alat'));
				redirect('siteman/alat','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/alat','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data alat';
			$data['merk'] = $this->model_app->view_ordering('t_merk','id_merk','DESC');
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_alat/add',$data);
		}
		

	}

	function ubah_alat()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'id_merk' => $this->db->escape_str($this->input->post('id_merk')),
						'kode_alat' => $this->db->escape_str($this->input->post('kode_alat')),
						'nama_alat' => $this->db->escape_str($this->input->post('nama_alat')),
						'model_tipe' => $this->db->escape_str($this->input->post('model_tipe'))
					);
			$where = array('id_alat'=>$this->input->post('id'));
			$q = $this->model_app->update('t_alat',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Alat',$this->input->post('nama_alat'));
				redirect('siteman/alat','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/alat','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data alat';
			$data['row'] = $this->model_app->edit('t_alat',array('id_alat'=>$id))->row_array();
			$data['merk'] = $this->model_app->view_ordering('t_merk','id_merk','DESC');
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_alat/edit',$data);
		}
		

	}

	function hapus_alat()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_alat'=>$id);
		$q = $this->model_app->delete('t_alat',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/alat','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/alat','refresh');
		}
		$dt = $this->model_app->view_where('t_alat',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Alat',$dt['nama_alat']);
	}

	function jenis()
	{
		cek_session_user();
		$data['title'] = 'Data Jenis';
		$data['record'] = $this->model_app->view_ordering('t_jenis','id_jenis','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_jenis/view',$data);
	}

	function tambah_jenis()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'inisial' => $this->db->escape_str($this->input->post('inisial')),
						'nama_jenis' => $this->db->escape_str($this->input->post('jenis'))
					);
			$q = $this->model_app->insert('t_jenis',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah jenis',$this->input->post('jenis'));
				redirect('siteman/jenis','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/jenis','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data jenis';
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_jenis/add',$data);
		}
		

	}

	function ubah_jenis()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'inisial' => $this->db->escape_str($this->input->post('inisial')),
						'nama_jenis' => $this->db->escape_str($this->input->post('jenis'))
					);
			$where = array('id_jenis'=>$this->input->post('id'));
			$q = $this->model_app->update('t_jenis',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah jenis',$this->input->post('jenis'));
				redirect('siteman/jenis','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/jenis','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data jenis';
			$data['row'] = $this->model_app->edit('t_jenis',array('id_jenis'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_jenis/edit',$data);
		}
		

	}

	function hapus_jenis()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_jenis'=>$id);
		$q = $this->model_app->delete('t_jenis',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/jenis','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/jenis','refresh');
		}
		$dt = $this->model_app->view_where('t_jenis',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus jenis',$dt['nama_jenis']);
	}

	function icon()
	{
		cek_session_user();
		$data['title'] = 'Dokumentasi Icon';
		$this->template->load('@bima_coding/template','@bima_coding/dokumentasi',$data);
	}





	

}

/* End of file Siteman.php */
/* Location: ./application/controllers/Siteman.php */