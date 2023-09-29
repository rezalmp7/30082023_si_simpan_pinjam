<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penarikan extends CI_Controller {

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
		if($this->session->userdata('level') == 'nasabah') {
			$data['penarikan'] = $this->db->select('penarikan.*, nasabah.nama as nama_nasabah')
				->from('penarikan')
				->where('nasabah.id_nasabah', $this->session->userdata('id_user'))
				->join('nasabah', 'penarikan.id_nasabah = nasabah.id_nasabah')->get()->result();
		} else {
			$data['penarikan'] = $this->db->select('penarikan.*, nasabah.nama as nama_nasabah')
				->from('penarikan')
				->join('nasabah', 'penarikan.id_nasabah = nasabah.id_nasabah')->get()->result();
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/penarikan/index', $data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah() {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/penarikan/tambah', $data);
		$this->load->view('admin/layout/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			"id_nasabah" => $post['nasabah'],
			"nominal_penarikan" => $post['nominal'],
			"tgl_penarikan" => $post['tanggal_penarikan'],
			"jns_tabungan" => $post['jenis_tabungan'],
		);

		$this->db->insert('penarikan', $data);

		redirect(base_url('/penarikan'));
	}
	public function edit($id) {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		$data['penarikan'] = $this->db->get_where("penarikan", array("id_penarikan" => $id))->row();

		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/penarikan/edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function update($id) {
		$post = $this->input->post();

		$data = array(
			"id_nasabah" => $post['nasabah'],
			"nominal_penarikan" => $post['nominal'],
			"tgl_penarikan" => $post['tanggal_penarikan'],
			"jns_tabungan" => $post['jenis_tabungan'],
		);

		$this->db->where('id_penarikan', $id)
			->update('penarikan', $data);

		redirect(base_url('/penarikan'));
	}
	public function hapus($id) {
		$this->db->where('id_penarikan', $id)
			->delete('penarikan');

		redirect(base_url('/penarikan'));
	}
}
