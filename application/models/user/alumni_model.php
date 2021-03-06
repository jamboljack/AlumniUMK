<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumni_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}

	function select_alumni_baru($progdi_id) {
		$this->db->select('a.*,f.fakultas_name,p.progdi_name');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');		
		$this->db->where('a.alumni_active', 0);
		$this->db->where('a.alumni_trash', 0);
		$this->db->where('a.alumni_status', 1);
		$this->db->where('a.progdi_id', $progdi_id);
		$this->db->order_by('a.alumni_tgl_daftar','desc');
		
		return $this->db->get();
	}	

	function select_alumni_progdi($progdi_id) {		
		$Progdi = $this->uri->segment(4);
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		if (empty($Tahun1) && empty($Tahun2)) {
			$this->db->select('a.*, f.fakultas_name, p.progdi_name, k.kegiatan_desc');
			$this->db->from('umk_alumni a');
			$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
			$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
			$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');		
			$this->db->where('a.progdi_id', $Progdi);			
			$this->db->where('a.alumni_active', 1);
			$this->db->where('a.alumni_trash', 0);
			$this->db->order_by('a.alumni_nim','asc');
			
			return $this->db->get();
		} else {
			$this->db->select('a.*, f.fakultas_name, p.progdi_name, k.kegiatan_desc');
			$this->db->from('umk_alumni a');
			$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
			$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
			$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');		
			$this->db->where('a.progdi_id', $Progdi);
			$this->db->where('YEAR(a.alumni_tgl_masuk) >=', $Tahun1);
			$this->db->where('YEAR(a.alumni_tgl_masuk) <=', $Tahun2);
			$this->db->where('a.alumni_active', 1);
			$this->db->where('a.alumni_trash', 0);
			$this->db->order_by('a.alumni_nim','asc');
			
			return $this->db->get();
		}		
	}

	/*function select_alumni() {
		$Progdi = $this->uri->segment(4);
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		$this->db->select('a.*, f.fakultas_name, p.progdi_name, k.kegiatan_desc');
		$this->db->from('umk_alumni a');
		$this->db->join('umk_m_fakultas f', 'a.fakultas_id = f.fakultas_id');
		$this->db->join('umk_progdi p', 'a.progdi_id = p.progdi_id');
		$this->db->join('umk_kegiatan k', 'a.kegiatan_id = k.kegiatan_id', 'left');		
		$this->db->where('a.progdi_id', $Progdi);
		$this->db->where('YEAR(a.alumni_tgl_lulus) >=', $Tahun1);
		$this->db->where('YEAR(a.alumni_tgl_lulus) <=', $Tahun2);
		$this->db->where('a.alumni_active', 1);
		$this->db->where('a.alumni_trash', 0);
		$this->db->order_by('a.alumni_nim','asc');
		
		return $this->db->get();
	}*/

	function select_by_id($alumni_nim) {
		$this->db->select('*');
		$this->db->from('umk_alumni');
		$this->db->where('alumni_nim', $alumni_nim);
		
		return $this->db->get();
	}

	function select_fakultas() {
		$this->db->select('*');
		$this->db->from('umk_m_fakultas');
		$this->db->where('fakultas_status', 0);
		$this->db->where('fakultas_trash', 0);
		$this->db->order_by('fakultas_id','asc');
		
		return $this->db->get();
	}

	function select_progdi() {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_trash', 0);		
		$this->db->order_by('progdi_id','asc');
		
		return $this->db->get();
	}

	function select_progdi2($progdi_id) {
		$this->db->select('*');
		$this->db->from('umk_progdi');
		$this->db->where('progdi_trash', 0);		
		$this->db->where('progdi_id', $progdi_id);		
		
		return $this->db->get();
	}

	function select_kegiatan() {
		$this->db->select('*');
		$this->db->from('umk_kegiatan');		
		$this->db->order_by('kegiatan_id','asc');
		
		return $this->db->get();
	}

	function update_data_baru() {
		$alumni_nim     = trim($this->input->post('alumni_nim'));

		$data = array(
    			'alumni_active' => $this->input->post('chkAktif')
				);

		$this->db->where('alumni_nim', $alumni_nim);
		$this->db->update('umk_alumni', $data);
	}

	function delete_data($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		$data = array('alumni_trash' => 1);					
		$this->db->where('alumni_nim', $kode);
		$this->db->update('umk_alumni', $data);

		$data = array('user_trash' => 1);					
		$this->db->where('alumni_nim', $kode);
		$this->db->update('umk_users', $data);
	}

	function delete_data_baru($kode) {
		$kode 		= $this->security->xss_clean($this->uri->segment(5));		

		/*$data = array('alumni_trash' => 1);					
		$this->db->where('alumni_nim', $kode);
		$this->db->update('umk_alumni', $data);

		$data = array('user_trash' => 1);					
		$this->db->where('alumni_nim', $kode);
		$this->db->update('umk_users', $data);*/
		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_alumni');

		$this->db->where('alumni_nim', $kode);
		$this->db->delete('umk_users');
	}
}
/* Location: ./application/model/user/alumni_model.php */
?>