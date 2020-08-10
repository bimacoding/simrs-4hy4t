<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		cek_session_user();
	}

	public function index()
	{
		$data['title'] = 'Data Inventaris';
		$data['record'] = $this->model_app->view_join_four('t_inv','t_alat','t_distributor','t_kondisi','t_lokasi','id_alat','id_distributor','id_kondisi','id_lokasi','id_inv','DESC');
		$this->template->load('@bima_coding/template','@bima_coding/mod_master_inventaris/view',$data);
	}

	function tambah_inventaris()
	{
		/* start insert */
		if (isset($_POST['submit'])){
			$noinv = $this->mylibrary->kdauto('t_inv', 'id_inv', $this->input->post('kode_alat'));
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrinv/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = $noinv.'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/history_inv/'.$noinv; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			$data = array(
						'noinv' => $noinv,
						'id_alat' => $this->db->escape_str($this->input->post('id_alat')),
						'id_distributor' => $this->db->escape_str($this->input->post('id_distributor')),
						'id_lokasi' => $this->db->escape_str($this->input->post('id_lokasi')),
						'id_kondisi' => $this->db->escape_str($this->input->post('id_kondisi')),
						'sn_alat' => $this->db->escape_str($this->input->post('sn_alat')),
						'thn_pengadaan' => $this->db->escape_str($this->input->post('thn_pengadaan')),
						'thn_operasional' => $this->db->escape_str($this->input->post('thn_operasional')),
						'sts_kalibrasi' => $this->input->post('sts_kalibrasi'),
						'usia_teknis' => $this->db->escape_str($this->input->post('usia_teknis')),
						'harga' => $this->db->escape_str($this->input->post('harga')),
						'penyusutan' => $this->db->escape_str($this->input->post('penyusutan')),
						'n_akumulasi' => $this->db->escape_str($this->input->post('n_akumulasi')),
						'n_buku' => $this->db->escape_str($this->input->post('n_buku')),
						'buku_op' => $this->input->post('buku_op'),
						'buku_manual' => $this->input->post('buku_op'),
						'qrcode' => $image_name,
						);

			$this->model_app->insert('t_inv', $data);
			redirect('inventaris','refresh');
		}else{
			$data = array(
				'title' 		=> 'Tambah Data Inventaris',
				'kondisi'		=> $this->model_app->view_ordering('t_kondisi','id_kondisi','DESC'),
				'lokasi'		=> $this->model_app->view_ordering('t_lokasi','id_lokasi','DESC'),
				'alat'			=> $this->model_app->view_ordering('t_alat','id_alat','DESC'),
				'distributor'	=> $this->model_app->view_ordering('t_distributor','id_distributor','DESC')
			);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_inventaris/add',$data);
		}
		
	}

	function ubah_inventaris()
	{
		/* start insert */
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array(
						'id_alat' => $this->db->escape_str($this->input->post('id_alat')),
						'id_distributor' => $this->db->escape_str($this->input->post('id_distributor')),
						'id_lokasi' => $this->db->escape_str($this->input->post('id_lokasi')),
						'id_kondisi' => $this->db->escape_str($this->input->post('id_kondisi')),
						'sn_alat' => $this->db->escape_str($this->input->post('sn_alat')),
						'thn_pengadaan' => $this->db->escape_str($this->input->post('thn_pengadaan')),
						'thn_operasional' => $this->db->escape_str($this->input->post('thn_operasional')),
						'sts_kalibrasi' => $this->input->post('sts_kalibrasi'),
						'usia_teknis' => $this->db->escape_str($this->input->post('usia_teknis')),
						'harga' => $this->db->escape_str($this->input->post('harga')),
						'penyusutan' => $this->db->escape_str($this->input->post('penyusutan')),
						'n_akumulasi' => $this->db->escape_str($this->input->post('n_akumulasi')),
						'n_buku' => $this->db->escape_str($this->input->post('n_buku')),
						'buku_op' => $this->input->post('buku_op'),
						'buku_manual' => $this->input->post('buku_op')
						);
			$where = array('id_inv'=>$this->input->post('id'));
			$this->model_app->update('t_inv', $data, $where);
			redirect('inventaris','refresh');
		}else{
			$data = array(
				'title' 		=> 'Ubah Data Inventaris',
				'kondisi'		=> $this->model_app->view_ordering('t_kondisi','id_kondisi','DESC'),
				'lokasi'		=> $this->model_app->view_ordering('t_lokasi','id_lokasi','DESC'),
				'alat'			=> $this->model_app->view_ordering('t_alat','id_alat','DESC'),
				'distributor'	=> $this->model_app->view_ordering('t_distributor','id_distributor','DESC'),
				'row'	=> $this->model_app->edit('t_inv',array('id_inv'=>$id))->row_array(),
			);
			$this->template->load('@bima_coding/template','@bima_coding/mod_master_inventaris/edit',$data);
		}
		
	}

	function upload_kalibrasi()
	{
		error_reporting(0);
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', 3600);
		$ret = array();
		$config['upload_path']   = 'assets/uploads/dokumen/';
		$config['allowed_types'] = '*';
		$config['max_size']  	 = '5000';
		$config['remove_spaces'] = TRUE;
		$config['overwrite']     = TRUE;
		$this->load->library('upload', $config);
		$error = $this->upload->display_errors('<p>', '</p>');
		if ($this->upload->do_upload('upload_kalibrasi')) {
			$data = array('xyz'=>$this->upload->data());
			$file = $data['xyz']['file_name'];
			$ret[] = htmlspecialchars(htmlentities(preg_replace('/[^A-Za-z0-9\-]/', '_', $file)));
			echo json_encode($ret);
		}
	}

	function upload_book_op()
	{
		error_reporting(0);
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', 3600);
		$ret = array();
		$config['upload_path']   = 'assets/uploads/dokumen/';
		$config['allowed_types'] = '*';
		$config['max_size']  	 = '5000';
		$config['remove_spaces'] = TRUE;
		$config['overwrite']     = TRUE;
		$this->load->library('upload', $config);
		$error = $this->upload->display_errors('<p>', '</p>');
		if ($this->upload->do_upload('upload_book_op')) {
			$data = array('xyz'=>$this->upload->data());
			$file = $data['xyz']['file_name'];
			$ret[] = htmlspecialchars(htmlentities(preg_replace('/[^A-Za-z0-9\-]/', '_', $file)));
			echo json_encode($ret);
		}
	}

	function upload_book_manual()
	{
		error_reporting(0);
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', 3600);
		$ret = array();
		$config['upload_path']   = 'assets/uploads/dokumen/';
		$config['allowed_types'] = '*';
		$config['max_size']  	 = '5000';
		$config['remove_spaces'] = TRUE;
		$config['overwrite']     = TRUE;
		$this->load->library('upload', $config);
		$error = $this->upload->display_errors('<p>', '</p>');
		if ($this->upload->do_upload('upload_book_manual')) {
			$data = array('xyz'=>$this->upload->data());
			$file = $data['xyz']['file_name'];
			$ret[] = htmlspecialchars(htmlentities(preg_replace('/[^A-Za-z0-9\-]/', '_', $file)));
			echo json_encode($ret);
		}
	}



	function delete()
	{
		$filenames = $this->input->post('name');
		$output_dir = 'assets/uploads/dokumen/';
		$filePath = $output_dir. $filenames;
		if (file_exists($filePath)) 
		{
	        unlink($filePath);
	    }
		redirect('restore/index/berhasil','refresh');
	}

	function cetak_inventaris()
	{
		$data['title'] = 'Cetak Inventaris';
		$data['record'] = $this->model_app->view_join_four('t_inv','t_alat','t_distributor','t_kondisi','t_lokasi','id_alat','id_distributor','id_kondisi','id_lokasi','id_inv','DESC');
		$this->load->view('@bima_coding/mod_master_inventaris/cetak',$data);
	}


}

/* End of file Inventaris.php */
/* Location: ./application/controllers/Inventaris.php */