<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}
	public function index()
	{
		redirect('siteman/index','refresh');
	}

	public function get_alat()
	{
		$kode = $this->input->get('kode');
		$q = $this->model_app->view_where('data_alat',array('kode'=>$kode));
		$alat = $q->row_array();
		$data = array(
            'sn'      =>  $alat['sn'],
            'nama_alat'   =>  htmlentities($alat['nama_alat']),
            'merk'    =>  htmlentities($alat['merk']),
            'model_tipe'    =>  htmlentities($alat['model_tipe']),
            'lokasi'    =>  htmlentities($alat['lokasi']),
        );
 		echo json_encode($data);
	}

	public function getalat()
	{
		header("Content-Type: application/json; charset=UTF-8");
		$alat = $this->input->post('id_alat');
		$data = $this->db->query("SELECT a.model_tipe, a.kode_alat, b.nama_merk FROM t_alat a LEFT JOIN t_merk b ON a.id_merk=b.id_merk WHERE a.id_alat = '".$alat."' ORDER BY a.id_alat DESC")->row();
		    $output = array(
		        'merk'=>$data->nama_merk,
		        'kode_alat'=>$data->kode_alat,
		        'model_tipe'=>$data->model_tipe
		    );

		    // Encode ke format JSON.
		    echo json_encode($output);
		
	}

	public function getInv()
	{
		header("Content-Type: application/json; charset=UTF-8");
		// $inv = 2;
		$inv = $this->input->post('id_inv');
		$data = $this->db->query("SELECT * FROM t_inv a 
								  LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
								  LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
								  LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
								  LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
								  LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi 
								  WHERE a.id_inv = '".$inv."' ORDER BY a.id_inv DESC")->row_array();
		    $output = array(
		        'nama_merk'=>$data['nama_merk'],
		        'nama_alat'=>$data['nama_alat'],
		        'sn_alat'=>$data['sn_alat'],
		        'kondisi'=>$data['nama_kondisi'],
		        'distributor'=>$data['nama'],
				'model_tipe'=>$data['model_tipe'],
				'lokasi'=>$data['nama_lokasi']
		    );

		    // Encode ke format JSON.
		    echo json_encode($output);
		
	}

	public function getHistory()
	{
		/** AJAX Handle */
		$this->load->model('model_ajax');
		if( $this->input->is_ajax_request()  )  {
			/**
			 * Mengambil Parameter dan Perubahan nilai dari setiap 
 			 * aktifitas pada table
 			 *
			*/
			$datatables  = $_POST;
			$datatables['table']    = 't_histori';
			$datatables['id-table'] = 'id_histori';
			/**
			 * Kolom yang ditampilkan
			 */
			$datatables['col-display'] = array(
			                "id_histori",
			                "id_users",
			                "kegiatan",
			                "data",
			                "ip",
			                "browser",
			             );
			/**
			* menggunakan table join
			*/
			// $datatables['join']    = 'INNER JOIN position ON position = id_position';
			$this->model_ajax->get_Datatables($datatables);
		}
		return;
    }

    function ddz()
    {
    	error_reporting(0);
		header("Content-Type: application/json; charset=UTF-8");

		$sql = "SELECT id_inv as title, tgl_pm as start FROM t_jadwalpemeliharaan";
		$qu = $this->db->query($sql);
		// $event = '';
		// foreach ($qu->result_array() as $key ) {
		// 	$event .= "{title: '".$key['id_inv']."',";
  //         	$event .= "start: '".$key['tgl_pm']."T10:00:00'}_";
		// }
		// $gg = explode('_', substr($event,0,-1));
		foreach ($qu->result_array() as $key) {
			echo json_encode($key);
		}
		
		
    }
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */