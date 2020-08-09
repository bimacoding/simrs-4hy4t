<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_kerusakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		cek_session_user();
	}

	public function index()
	{
		$data['title'] = 'Laporan Kerusakan';
		$qu = "SELECT * FROM t_kerusakanalat a 
				LEFT JOIN t_inv b ON a.`id_inv`= b.`id_inv`
				LEFT JOIN t_alat c ON b.`id_alat`= c.`id_alat`
				LEFT JOIN t_merk d ON c.`id_merk` = d.`id_merk`
				LEFT JOIN t_distributor e ON b.`id_distributor` = e.`id_distributor`
				LEFT JOIN t_lokasi f ON b.`id_lokasi` = f.`id_lokasi`
				WHERE a.`sts_selesai` = 'N' ORDER BY a.`id_kerusakanalat` DESC";
		$data['record'] = $this->db->query($qu)->result_array();
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_kerusakanalat/view',$data);
	}

	public function view_user()
	{
		$id = $this->session->userdata('id');
		$data['title'] = 'Laporan Kerusakan';
		$qu = "SELECT * FROM t_kerusakanalat a 
				LEFT JOIN t_inv b ON a.`id_inv`= b.`id_inv`
				LEFT JOIN t_alat c ON b.`id_alat`= c.`id_alat`
				LEFT JOIN t_merk d ON c.`id_merk` = d.`id_merk`
				LEFT JOIN t_distributor e ON b.`id_distributor` = e.`id_distributor`
				LEFT JOIN t_lokasi f ON b.`id_lokasi` = f.`id_lokasi`
				WHERE a.`sts_selesai` != '' AND a.`id_users` = '".$id."' ORDER BY a.`id_kerusakanalat` DESC";
		$data['record'] = $this->db->query($qu)->result_array();
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_kerusakanalat/user_view',$data);
	}

	function tambah_kerusakan()
	{
		if (isset($_POST['submit'])) {
			$data = array(
						'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
						'keluhan' => cetak($this->input->post('keluhan')),
						'sts_selesai' => 'N',
						'tgl_buat' => date('Y-m-d'),
						'jam_buat' => date('H:i:s'),
						'id_users' => $this->session->userdata('id')
					);
			$q = $this->model_app->insert('t_kerusakanalat',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah kerusakan',$this->input->post('id_inv'));
				redirect('lap_kerusakan','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('lap_kerusakan','refresh');
			}
		}else{
			$data['title'] = 'Tambah data kerusakan alat';
			$data['inv'] = $this->db->query("SELECT * FROM t_inv a
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											ORDER BY  a.noinv DESC")->result_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_kerusakanalat/add',$data);
		}
	}

	function ubah_kerusakan()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
						'keluhan' => cetak($this->input->post('keluhan')),
						'sts_selesai' => 'N',
						'tgl_update' => date('Y-m-d'),
						'jam_update' => date('H:i:s'),
						'id_users' => $this->session->userdata('id')
					);
			$where = array('id_kerusakanalat'=>$this->input->post('id'));
			$q = $this->model_app->update('t_kerusakanalat',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah kerusakan',$this->input->post('id_inv'));
				redirect('lap_kerusakan','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('lap_kerusakan','refresh');
			}
		}else{
			$data['title'] = 'Tambah data kerusakan alat';
			$data['inv'] = $this->db->query("SELECT * FROM t_inv a
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											ORDER BY  a.noinv DESC")->result_array();
			$data['row'] = $this->model_app->edit('t_kerusakanalat',array('id_kerusakanalat'=>$id))->row_array();
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_kerusakanalat/edit',$data);
		}
	}

	function update_kerusakan()
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
				redirect('lap_kerusakan','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('lap_kerusakan','refresh');
			}
			
			
		}else{
			$data = array(
						'inv'   => $this->model_app->view_join_one('t_inv','t_alat','id_alat','id_inv','DESC'),
						'jenis' => $this->model_app->view_ordering('t_jenis','id_jenis','DESC'),
						'title' => 'Update Laporan Kerusakan',
						'row'   => $this->model_app->edit('t_kerusakanalat',array('id_kerusakanalat'=>$id))->row_array()
					);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_kerusakanalat/update',$data);
		}
	}

}

/* End of file Lap_kerusakan.php */
/* Location: ./application/controllers/Lap_kerusakan.php */