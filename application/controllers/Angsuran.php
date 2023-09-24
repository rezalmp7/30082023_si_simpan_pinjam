<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran extends CI_Controller {

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
		$data['angsuran'] = $this->db->select('angsuran.*, nasabah.nama as nama_nasabah')
			->from('angsuran')
			->join('nasabah', 'angsuran.id_nasabah = nasabah.id_nasabah')->get()->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/angsuran/index', $data);
		$this->load->view('admin/layout/footer');
	}
    
    private function beetweenMonth2Date($date1Val, $date2Val) {
        $date1 = date("Y-m-d", strtotime($date1Val));
        $date2 = date("Y-m-d", strtotime($date2Val));

        $year1 = date('Y', strtotime($date1));
        $year2 = date('Y', strtotime($date2));

        $month1 = date('m', strtotime($date1));
        $month2 = date('m', strtotime($date2));

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

        return $diff;
    } 

	public function tambah() {
        // echo "<pre>";
        $get = $this->input->get();

		$data['nasabah'] = $this->db->get("nasabah")->result();
		
        if(isset($get['nasabah'])) {
            $pinjamanSelect = $this->db->get_where("pinjaman", array('id_nasabah' => $get['nasabah'], 'status' => 0))->result();
            $data['nasabahSelect'] = $this->db->get_where("nasabah", array('id_nasabah' => $get['nasabah']))->row();

            $jumlah_angsuran = 0;

            $angsuranPerPinjaman = array();

            // $tanggalIni = date('Y-m-1', strtotime("2023--1"));
            $tanggalIni = date('Y-m-1');
            
            foreach ($pinjamanSelect as $key => $value) {                
                $cekAngsuranSelesaiQuery = $this->db->select("*")
                    ->from('angsuran')
                    ->where('id_pinjaman', $value->id_pinjaman)
                    ->order_by('tahap_angsuran', 'ASC')
                    ->get();
                $cekAngsuranSelesaiData = $cekAngsuranSelesaiQuery->last_row();
				// print_r($cekAngsuranSelesaiData);
                if($cekAngsuranSelesaiData) {
                    $angsuranKe = $cekAngsuranSelesaiData->tahap_angsuran+1;
                    $angsuranBulan = date("M Y", strtotime("+".$angsuranKe."month", strtotime($value->tgl_pinjaman)));
                    $angsuranPerPinjaman[] = array(
                        'data_pinjaman' => $value,
                        'angsuran' => $angsuranKe,
                        'angsuran_bulan' => date("M Y", strtotime("+".$angsuranKe."month", strtotime($value->tgl_pinjaman))),
                        'isTelat' => date('Ym', strtotime($tanggalIni)) <= date('Ym', strtotime($angsuranBulan)) ? 0 : 1,
                        'nominal_angsuran' => $value->nominal_angsuran + ($value->nominal_setuju*$value->bunga/100)/12
                    );
                } else {
                    //cek jika telat
                    $angsuranKe = 1;
                    $angsuranBulan = date("M Y", strtotime("+".$angsuranKe."month", strtotime($value->tgl_pinjaman)));
                    $angsuranPerPinjaman[] = array(
                        'data_pinjaman' => $value,
                        'angsuran' => $angsuranKe,
                        'angsuran_bulan' => $angsuranBulan,
                        'isTelat' => date('Ym', strtotime($tanggalIni)) <= date('Ym', strtotime($angsuranBulan)) ? 0 : 1,
                        'nominal_angsuran' => $value->nominal_angsuran + ($value->nominal_setuju*$value->bunga/100)/12
                    );
                }
            }
            $data['pinjamanSelect'] = $pinjamanSelect;
            $data['angsuranPerPinjaman'] = $angsuranPerPinjaman;
        }

		$this->load->view('admin/layout/header');
		$this->load->view('admin/angsuran/tambah', $data);
		$this->load->view('admin/layout/footer');
	}
	public function store() {
		$post = $this->input->post();

		$data = array(
			"id_nasabah" => $post['nasabah'],
			"id_pinjaman" => $post['pinjaman'],
			"tgl_angsuran" => $post['tgl_pembayaran'],
			"nominal_angsuran" => $post['nominal_angsuran'],
			"tahap_angsuran" => $post['thp_angsuran'],
			"terlambat" => $post["terlambat_pembayaran"],
			"denda" => $post['denda'],
			"total_bayar" => $post['total_bayar'],
		);

		$this->db->insert('angsuran', $data);

		redirect(base_url('/angsuran'));

	}
	public function edit($id) {
		// $data['nasabah'] = $this->db->get("nasabah")->result();
		$data['angsuran'] = $this->db->get_where('angsuran', array('id_angsuran' => $id))->row();
		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/angsuran/edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function update($id) {
		$post = $this->input->post();
		$data = array(
			"tgl_angsuran" => $post['tgl_pembayaran'],
			"nominal_angsuran" => $post['nominal_angsuran'],
			"tahap_angsuran" => $post['thp_angsuran'],
			"terlambat" => $post["terlambat_pembayaran"],
			"denda" => $post['denda'],
			"total_bayar" => $post['total_bayar'],
		);
		$this->db->where('id_angsuran', $id)->update("angsuran", $data);

		redirect(base_url('/angsuran'));
	}
	public function info($id) {
		$data['pinjaman'] = $this->db->get_where("pinjaman", array("id_pinjaman" => $id))->row();
		$data['nasabah'] = $this->db->get_where("nasabah", array("id_nasabah" => $data['pinjaman']->id_nasabah))->row();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pinjaman/info', $data);
		$this->load->view('admin/layout/footer');
	}
	public function hapus($id) {
		$this->db->where('id_angsuran', $id)
			->delete('angsuran');

		redirect(base_url('/angsuran'));
	}
}
