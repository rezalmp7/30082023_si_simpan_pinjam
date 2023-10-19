<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller {

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
	function __construct() {
		parent::__construct();
	}
	public function index()
	{
		if($this->session->userdata('level') == 'nasabah') {
			$data['tabungan'] = $this->db->select('tabungan.*, nasabah.nama as nama_nasabah')
				->from('tabungan')
				->where('nasabah.id_nasabah', $this->session->userdata('id_user'))
				->join('nasabah', 'tabungan.id_nasabah = nasabah.id_nasabah')->get()->result();
		} else {
			$data['tabungan'] = $this->db->select('tabungan.*, nasabah.nama as nama_nasabah')
				->from('tabungan')
				->join('nasabah', 'tabungan.id_nasabah = nasabah.id_nasabah')->get()->result();
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/tabungan/index', $data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah() {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/tabungan/tambah', $data);
		$this->load->view('admin/layout/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			"id_nasabah" => $post['nasabah'],
			"nominal_tabungan" => $post['nominal'],
			"tgl_tabungan" => $post['tanggal_tabungan'],
			"jns_tabungan" => $post['jenis_tabungan'],
		);

		$this->db->insert('tabungan', $data);

		redirect(base_url('/tabungan'));
	}
	public function edit($id) {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		$data['tabungan'] = $this->db->get_where("tabungan", array("id_tabungan" => $id))->row();

		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/tabungan/edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function update($id) {
		$post = $this->input->post();

		$data = array(
			"id_nasabah" => $post['nasabah'],
			"nominal_tabungan" => $post['nominal'],
			"tgl_tabungan" => $post['tanggal_tabungan'],
			"jns_tabungan" => $post['jenis_tabungan'],
		);

		$this->db->where('id_tabungan', $id)
			->update('tabungan', $data);

		redirect(base_url('/tabungan'));
	}
	public function hapus($id) {
		$this->db->where('id_tabungan', $id)
			->delete('tabungan');

		redirect(base_url('/tabungan'));
	}
}
