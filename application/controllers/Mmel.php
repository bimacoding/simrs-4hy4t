<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		cek_session_admin();
	}

	function index()
	{
		$data['title'] = 'Data MMEL';
		$data['record'] = $this->model_app->view_join_five('t_inv','t_mmel','t_alat','t_merk','t_distributor','t_lokasi','id_inv','id_alat','id_merk','id_distributor','id_lokasi','id_mmel','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_mmel/view',$data);
	}

	function tambah_mmel()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_inv' => $this->db->escape_str($this->input->post('id_inv')),
				'harga_pengganti' => $this->db->escape_str($this->input->post('harga_pengganti')),
				'tanggal_penawaran' => $this->db->escape_str($this->input->post('tanggal_penawaran')),
				'biaya_pemeliharaan' => $this->db->escape_str($this->input->post('biaya_pemeliharaan')),
				'keterangan' => $this->db->escape_str($this->input->post('keterangan')),
			);
			$q = $this->model_app->insert('t_mmel',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah mmel',$this->input->post('id_inv'));
				redirect('mmel','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('mmel','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data MMEL';
			// $data['mmel'] = $this->model_app->view_where_order('t_users',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya'),'id_users','DESC');
			$data['mmel'] = '';
			$data['inv'] = $this->model_app->view_ordering('t_inv','id_inv','DESC');
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_mmel/add',$data);
		}
		

	}

	function ubah_mmel()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'harga_pengganti' => $this->db->escape_str($this->input->post('harga_pengganti')),
				'tanggal_penawaran' => $this->db->escape_str($this->input->post('tanggal_penawaran')),
				'biaya_pemeliharaan' => $this->db->escape_str($this->input->post('biaya_pemeliharaan')),
				'keterangan' => $this->db->escape_str($this->input->post('keterangan'))
			);
			$where = array('id_mmel'=>$this->input->post('id'));
			$q = $this->model_app->update('t_mmel',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah mmel',$this->input->post('id_inv'));
				redirect('mmel','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('mmel','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data MMEL';
			$data['row'] = $this->model_app->edit('t_mmel',array('id_mmel'=>$id))->row_array();
			$data['inv'] = $this->model_app->view_ordering('t_inv','id_inv','DESC');
			// $data['mmel'] = $this->model_app->view_where_order('t_mmel',array('id_mmel'=>$id),'id_mmel','DESC');
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_mmel/edit',$data);
		}
		

	}

	function hapus_mmel()
	{
		$id = $this->uri->segment(3);
		$data = array('id_mmel'=>$id);
		$q = $this->model_app->delete('t_mmel',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('mmel','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('mmel','refresh');
		}
		$dt = $this->model_app->view_where('t_mmel',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus mmel',$dt['id_mmel']);
	}

	function hitung(){
		$id_inv = $this->input->post('id_inv');
		$harga_pengganti = $this->input->post('harga_pengganti');
		$biaya_pemeliharaan = $this->input->post('biaya_pemeliharaan');
		
		$data['inv'] = $this->model_app->view_where_order('t_inv',array('id_inv'=>$id_inv),'id_inv','DESC');
		foreach($data['inv']->result_array() as $row){
			$usia_pakai = (date('Y') - $row['thn_operasional']);
            $sisa_usia_manfaat = $row['usia_teknis'] - $usia_pakai;
			$presentase_usia_manfaat = $sisa_usia_manfaat / ($row['usia_teknis']);
			$mmel = (0.9 * $presentase_usia_manfaat * $harga_pengganti);
			if($biaya_pemeliharaan > $mmel){
				$keterangan = 'DIATAS MMEL';
			}else{
				$keterangan = 'DIBAWAH MMEL';
			}
			$harga_beli = $row['harga'];
		}
		echo '
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Harga Beli</label>
				<div class="col-10">
					<input class="form-control" type="text" value="'.$harga_beli.'" name="harga_beli">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">Usia Pakai</label>
				<div class="col-10">
					<input class="form-control" type="text" value="'.$usia_pakai.'" name="usia_pakai">
				</div>
			</div>
			<div class="form-group row">
		        <label for="example-text-input" class="col-2 col-form-label">Sisa Usia Manfaat</label>
		        <div class="col-10">
		        	<input class="form-control" type="text" value="'.$sisa_usia_manfaat.'" name="sisa_usia_manfaat">
				</div>
			 </div>
			 <div class="form-group row">
		        <label for="example-text-input" class="col-2 col-form-label">Presentase Usia Manfaat</label>
		        <div class="col-10">
		        	<input class="form-control" type="text" value="'.$presentase_usia_manfaat.'" name="presentase_usia_manfaat">
				</div>
			 </div>
			 <div class="form-group row">
		        <label for="example-text-input" class="col-2 col-form-label">MMEL</label>
		            <div class="col-10">
		            	<input class="form-control" type="text" value="'.$mmel.'" name="mmel">
					</div>
			 </div>
			<div class="form-group row">
		        <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
		            <div class="col-10">
		            	<input class="form-control" type="text" value="'.$keterangan.'" name="keterangan">
					</div>
			 </div>';
	}

	function cetak_mmel()
	{
		$data['title'] = 'Data MMEL';
		$data['record'] = $this->model_app->view_join_five('t_inv','t_mmel','t_alat','t_merk','t_distributor','t_lokasi','id_inv','id_alat','id_merk','id_distributor','id_lokasi','id_mmel','DESC');
		$this->load->view('@bima_coding/mod_master_mmel/cetak',$data);
	}
}
/* End of file Users.php */
/* Location: ./application/controllers/Users.php */