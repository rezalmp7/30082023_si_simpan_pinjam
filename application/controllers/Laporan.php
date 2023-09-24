<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
    public function __construct() {
        parent::__construct();
    }
	public function index()
	{
		$data['laporan'] = $this->db->from('laporan')->get()->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('admin/layout/footer');
	}
    
	public function tambah() {
		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan/tambah');
		$this->load->view('admin/layout/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			"tgl_laporan" => $post['tanggal_laporan'],
			"jml_tabungan" => $post['tabungan'],
			"jml_angsuran" => $post['angsuran'],
			"jml_pinjaman" => $post['pinjaman'],
			"biaya_lain" => $post['biaya_lain'],
			"pemasukan" => $post['pemasukan'],
			"pengeluaran" => $post['pengeluaran'],
			"total_pendapatan" => $post['pendapatan'],
		);

		$this->db->insert('laporan', $data);

		redirect(base_url('/laporan'));

	}
	public function edit($id) {
		$data['laporan'] = $this->db->get_where('laporan', array('id_laporan' => $id))->row();
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan/edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function update($id) {
		$post = $this->input->post();
		$data = array(
			"tgl_laporan" => $post['tanggal_laporan'],
			"jml_tabungan" => $post['tabungan'],
			"jml_angsuran" => $post['angsuran'],
			"jml_pinjaman" => $post['pinjaman'],
			"biaya_lain" => $post['biaya_lain'],
			"pemasukan" => $post['pemasukan'],
			"pengeluaran" => $post['pengeluaran'],
			"total_pendapatan" => $post['pendapatan'],
		);

		$this->db->where('id_laporan', $id)->update("laporan", $data);

		redirect(base_url('/laporan'));
	}
	public function info($id) {
		$data['pinjaman'] = $this->db->get_where("pinjaman", array("id_pinjaman" => $id))->row();
		$data['nasabah'] = $this->db->get_where("nasabah", array("id_nasabah" => $data['pinjaman']->id_nasabah))->row();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pinjaman/info', $data);
		$this->load->view('admin/layout/footer');
	}
	public function hapus($id) {
		$this->db->where('id_laporan', $id)
			->delete('laporan');

		redirect(base_url('/laporan'));
	}
}
