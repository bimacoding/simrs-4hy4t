<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Jadwal pemeliharaan';
		$data['record'] = $this->db->query("SELECT * FROM t_jadwalpemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											ORDER BY bb.id_pemeliharaan DESC")->result_array();
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_pemeliharaan/view',$data);
	}

	function tambah_pemeliharaan()
	{
		if (isset($_POST['submit'])) {
			$tgl_pm2 = date('Y-m-d', strtotime('+6 months', strtotime($this->input->post('jadwal_pemeliharaan'))) );
			$tgl_pm3 = date('Y-m-d', strtotime('+1 year', strtotime($this->input->post('jadwal_pemeliharaan'))) );
			$data = array(
					'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
					'id_jenis' => $this->db->escape_str($this->input->post('id_jenis')),
					'tgl_pm' => $this->db->escape_str($this->input->post('jadwal_pemeliharaan')),
					'tgl_pm2' => $this->db->escape_str($tgl_pm2),
					'tgl_pm3' => $this->db->escape_str($tgl_pm3),
					'nama_alat' => $this->db->escape_str($this->input->post('nama_alat')),
					'merk' => $this->db->escape_str($this->input->post('nama_merk')),
					'model_tipe' => $this->db->escape_str($this->input->post('model_tipe')),
					'lokasi' => $this->db->escape_str($this->input->post('lokasi')),
					'sn' => $this->db->escape_str($this->input->post('sn_alat'))
					); 
			$q = $this->model_app->insert('t_jadwalpemeliharaan', $data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah data pemeliharaan','-');
				redirect('pemeliharaan/index','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/kondisi','refresh');
			}
		}else{
			$data = array(
						'inv' => $this->model_app->view_join_one('t_inv','t_alat','id_alat','id_inv','DESC'),
						'jenis' => $this->model_app->view_ordering('t_jenis','id_jenis','DESC'),
						'title' => 'Tambah Jadwal Pemeliharaan',
					);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_pemeliharaan/add',$data);
		}
	}

	function ubah_pemeliharaan()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$tgl_pm2 = date('Y-m-d', strtotime('+6 months', strtotime($this->input->post('jadwal_pemeliharaan'))) );
			$tgl_pm3 = date('Y-m-d', strtotime('+1 year', strtotime($this->input->post('jadwal_pemeliharaan'))) );
			$data = array(
				// 'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
				'id_jenis' => $this->db->escape_str($this->input->post('id_jenis')),
				'tgl_pm' => $this->db->escape_str($this->input->post('jadwal_pemeliharaan')),
				'tgl_pm2' => $this->db->escape_str($tgl_pm2),
				'tgl_pm3' => $this->db->escape_str($tgl_pm3),
				'nama_alat' => $this->db->escape_str($this->input->post('nama_alat')),
				'merk' => $this->db->escape_str($this->input->post('nama_merk')),
				'model_tipe' => $this->db->escape_str($this->input->post('model_tipe')),
				'lokasi' => $this->db->escape_str($this->input->post('lokasi')),
				'sn' => $this->db->escape_str($this->input->post('sn_alat'))
			);
			$where = array('id_pemeliharaan'=>$this->input->post('id'));
			$q = $this->model_app->update('t_jadwalpemeliharaan',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah data pemeliharaan','-');
				redirect('pemeliharaan/index','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('pemeliharaan/index','refresh');
			}
		}else{
			$data = array(
						'inv'   => $this->model_app->view_join_one('t_inv','t_alat','id_alat','id_inv','DESC'),
						'jenis' => $this->model_app->view_ordering('t_jenis','id_jenis','DESC'),
						'title' => 'Ubah Jadwal Pemeliharaan',
						'row'   => $this->model_app->edit('t_jadwalpemeliharaan',array('id_pemeliharaan'=>$id))->row_array()
					);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_pemeliharaan/edit',$data);
		}
	}

	function update_pemeliharaan()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/dokumen';
			$config['allowed_types'] = 'pdf|ppt|pptx|xls|xlsx|doc|docx';
			$config['max_size']  = '5000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('service_report');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
						'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
						'id_jenis' => $this->db->escape_str($this->input->post('id_jenis')),
						'tgl_perencanaan' => $this->db->escape_str($this->input->post('tgl_perencanaan')),
						'tgl_mulai' => $this->db->escape_str($this->input->post('tgl_mulai')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'masalah' => $this->db->escape_str($this->input->post('masalah')),
						'analisis_kerusakan' => $this->db->escape_str($this->input->post('analisis_kerusakan')),
						'tindak_lanjut' => $this->db->escape_str($this->input->post('tindak_lanjut')),
						'ket' => $this->db->escape_str($this->input->post('ket')),
						'biaya' => $this->db->escape_str($this->input->post('biaya')),
						'service_report' => '',
					); 
			}else{
				$data = array(
						'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
						'id_jenis' => $this->db->escape_str($this->input->post('id_jenis')),
						'tgl_perencanaan' => $this->db->escape_str($this->input->post('tgl_perencanaan')),
						'tgl_mulai' => $this->db->escape_str($this->input->post('tgl_mulai')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'masalah' => cetak($this->input->post('masalah')),
						'analisis_kerusakan' => cetak($this->input->post('analisis_kerusakan')),
						'tindak_lanjut' => $this->db->escape_str($this->input->post('tindak_lanjut')),
						'ket' => cetak($this->input->post('ket')),
						'biaya' => $this->db->escape_str($this->input->post('biaya')),
						'service_report' => $hasil['file_name'],
					);
			}
			$q = $this->model_app->insert('t_datapemeliharaan',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data Pemeliharaan Berhasil ditambahkan!');
				logAct($this->session->userdata('id'),'Ubah data pemeliharaan','-');
				redirect('pemeliharaan','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('pemeliharaan','refresh');
			}
			
			
		}else{
			$data = array(
						'inv'   => $this->model_app->view_join_one('t_inv','t_alat','id_alat','id_inv','DESC'),
						'jenis' => $this->model_app->view_ordering('t_jenis','id_jenis','DESC'),
						'title' => 'Update Jadwal Pemeliharaan',
						'row'   => $this->model_app->edit('t_jadwalpemeliharaan',array('id_pemeliharaan'=>$id))->row_array()
					);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_pemeliharaan/update',$data);
		}
	}

	function hapus_pemeliharaan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data = array('id_pemeliharaan'=>$id);
		$q = $this->model_app->delete('t_jadwalpemeliharaan',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('pemeliharaan','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('pemeliharaan','refresh');
		}
		$dt = $this->model_app->view_where('t_pemeliharaan',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus pemeliharaan','-');
	}

	function cetak_pemeliharaan()
	{
		$data['title'] = 'Cetak pemeliharaan';
		$data['record'] = $this->db->query("SELECT * FROM t_jadwalpemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											ORDER BY bb.id_pemeliharaan DESC")->result_array();
		$this->load->view('@bima_coding/mod_master_pemeliharaan/cetak',$data);
	}

}

/* End of file Pemeliharaan.php */
/* Location: ./application/controllers/Pemeliharaan.php */