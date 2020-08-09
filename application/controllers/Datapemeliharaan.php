<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapemeliharaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		cek_session_user();
	}

	public function index()
	{
		$data['title'] = 'Data pemeliharaan';
		$data['record'] = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											ORDER BY bb.id_pemeliharaan DESC")->result_array();
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_datapemeliharaan/view',$data);
	}

	function ubah_datapemeliharaan()
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
						'tgl_mulai' => $this->db->escape_str($this->input->post('tgl_mulai')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'masalah' => $this->db->escape_str($this->input->post('masalah')),
						'analisis_kerusakan' => $this->db->escape_str($this->input->post('analisis_kerusakan')),
						'tindak_lanjut' => $this->db->escape_str($this->input->post('tindak_lanjut')),
						'ket' => $this->db->escape_str($this->input->post('ket')),
						'biaya' => $this->db->escape_str($this->input->post('biaya'))
					); 
			}else{
				$data = array(
						'tgl_mulai' => $this->db->escape_str($this->input->post('tgl_mulai')),
						'status' => $this->db->escape_str($this->input->post('status')),
						'masalah' => $this->db->escape_str($this->input->post('masalah')),
						'analisis_kerusakan' => $this->db->escape_str($this->input->post('analisis_kerusakan')),
						'tindak_lanjut' => $this->db->escape_str($this->input->post('tindak_lanjut')),
						'ket' => $this->db->escape_str($this->input->post('ket')),
						'biaya' => $this->db->escape_str($this->input->post('biaya')),
						'service_report' => $hasil['file_name'],
					);
			}
			$where = array('id_pemeliharaan'=>$this->input->post('id'));
			$q = $this->model_app->update('t_datapemeliharaan',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data Pemeliharaan Berhasil Diubah!');
				logAct($this->session->userdata('id'),'Ubah data pemeliharaan','-');
				redirect('datapemeliharaan','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('datapemeliharaan','refresh');
			}
			
			
		}else{
			$data = array(
						'inv'   => $this->model_app->view_join_one('t_inv','t_alat','id_alat','id_inv','DESC'),
						'jenis' => $this->model_app->view_ordering('t_jenis','id_jenis','DESC'),
						'title' => 'Ubah Data Pemeliharaan',
						'row'   => $this->model_app->edit('t_datapemeliharaan',array('id_pemeliharaan'=>$id))->row_array()
					);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_datapemeliharaan/edit',$data);
		}
	}

	function hapus_datapemeliharaan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data = array('id_pemeliharaan'=>$id);
		$q = $this->model_app->delete('t_datapemeliharaan',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('datapemeliharaan','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('datapemeliharaan','refresh');
		}
		$dt = $this->model_app->view_where('t_datapemeliharaan',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus pemeliharaan','-');
	}

	function service_report(){
		$id = $this->uri->segment('3');
		$data['row'] = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi
											WHERE bb.id_pemeliharaan = ".$id."
											ORDER BY bb.id_pemeliharaan DESC")->row_array();
		$this->load->view('@bima_coding/mod_master_datapemeliharaan/service_report', $data);
	}

	function riwayat_kerusakan()
	{
		$data['title'] = 'Riwayat Kerusakan';
		$data['record'] = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											WHERE ff.inisial = 'CM'
											ORDER BY bb.id_pemeliharaan DESC")->result_array();

		$data['record_grafik'] = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											WHERE ff.inisial = 'CM' GROUP BY bb.id_inv
											ORDER BY bb.id_pemeliharaan DESC")->result_array();
		$this->load->view('@bima_coding/mod_master_datapemeliharaan/riwayat_kerusakan',$data);
	}

	function riwayat_pemeliharaan()
	{
		$id_inv = $this->uri->segment('3');
		$data['title'] = 'Riwayat Pemeliharaan';
		$data['record'] = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
											LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
											LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
											LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
											LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
											LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
											LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
											LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
											WHERE a.id_inv = ".$id_inv."
											ORDER BY bb.id_pemeliharaan DESC")->result_array();

		$data['record_jenis'] = $this->db->query("SELECT * FROM t_jenis ff 
											ORDER BY id_jenis DESC")->result_array();
		$this->load->view('@bima_coding/mod_master_datapemeliharaan/riwayat_pemeliharaan',$data);
	}

}

/* End of file Pemeliharaan.php */
/* Location: ./application/controllers/Pemeliharaan.php */