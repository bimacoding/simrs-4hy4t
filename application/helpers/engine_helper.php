<?php 
    function cek_session_akses($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
    }

    function template(){
        $ci = & get_instance();
        $query = $ci->db->query("SELECT folder FROM templates where aktif='Y'");
        $tmp = $query->row_array();
        if ($query->num_rows()>=1){
            return $tmp['folder'];
        }else{
            return 'errors';
        }
    }

    function background(){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT gambar FROM background ORDER BY id_background DESC LIMIT 1")->row_array();
        return $bg['gambar'];
    }

    function logo(){
        $ci = & get_instance();
        $logo = $ci->db->query("SELECT logo FROM tbl_identitas WHERE id_identitas = 1 ORDER BY id_identitas LIMIT 1")->row_array();
        return base_url().'/assets/images/'.$logo['logo'];
    }

    function banner()
    {
        $ci = & get_instance();
        $ticker = $ci->db->query("SELECT * FROM tbl_ticker WHERE aktif = 'Ya'")->result_array();
        return $ticker;
    }

    function title(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT nama_website FROM tbl_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['nama_website'];
    }

    function description(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_deskripsi FROM tbl_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_deskripsi'];
    }

    function keywords(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_keyword FROM tbl_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_keyword'];
    }

    function favicon(){
        $ci = & get_instance();
        $fav = $ci->db->query("SELECT favicon FROM tbl_identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return base_url().'/assets/images/'.$fav['favicon'];
    }

    function get_name($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama_menu FROM t_menu WHERE id_menu = '".$k."' ORDER BY id_menu DESC LIMIT 1")->row_array();
        if ($nm!='') {
            return $nm['nama_menu'];
        }else{
            return 'Tidak Ada';
        }
        
    }

    function get_merk($k){
        $ci = & get_instance();
        $nm = $ci->db->query("SELECT nama_merk FROM t_merk WHERE id_merk = '".$k."' ORDER BY id_merk DESC LIMIT 1")->row_array();
        if ($nm!='') {
            return $nm['nama_merk'];
        }else{
            return 'Tidak Ada';
        }
        
    }

    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'admin'){
            redirect(base_url());
        }
    }

    function cek_session_user(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != 'user'){
            redirect(base_url());
        }
    }
