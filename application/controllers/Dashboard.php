<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{		
		$data['tabungan'] = $this->db->from('tabungan')->select_sum('nominal_tabungan')->get()->row_array();
		$data['penarikan'] = $this->db->from('penarikan')->select_sum('nominal_penarikan')->get()->row_array();
		$data['pinjaman'] = $this->db->from('pinjaman')->select_sum('nominal_pinjaman')->get()->row_array();

		// echo "<pre>";
		// print_r($data);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('admin/layout/footer');
	}
}