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
    
	public function tambah() {
        $get = $this->input->get();

		$data['nasabah'] = $this->db->get("nasabah")->result();
		
        if(isset($get['nasabah'])) {
            $data['pinjaman_select'] = $this->db->get_where("pinjaman", array('id_nasabah' => $get['nasabah']))->row();
            $data['nasabah_select'] = $this->db->get_where("nasabah", array('id_nasabah' => $get['nasabah']))->row();
        }

        echo "<pre>";
        print_r($data);

		// $this->load->view('admin/layout/header');
		// $this->load->view('admin/angsuran/tambah', $data);
		// $this->load->view('admin/layout/footer');
	}
    public function upload_foto_nasabah($input_file_photo, $namaFile) {
        $config['upload_path']          = './assets/foto_nasabah_peminjam/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $namaFile;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($input_file_photo)) {
            $error = $this->upload->display_errors();
            
            return "error";
        } else {
            $uploaded_data = $this->upload->data();

            return $uploaded_data['file_name'];
        }
    }
	public function store() {
		$post = $this->input->post();

        $namaFile = time();
        $upload_foto = $this->upload_foto_nasabah("foto", $namaFile);

        if($upload_foto != "error") {
            $nominal_angsuran = $post['nominal_disetujui']/($post['jangka_pinjaman']*12);
            $data = array(
            	"id_nasabah" => $post['nasabah'],
            	"tgl_pinjaman" => $post['tgl_pinjaman'],
            	"jangka_pinjaman" => $post['jangka_pinjaman'],
            	"nominal_pinjaman" => $post['nominal_pinjaman'],
            	"bunga" => $post['bunga_pinjaman'],
            	"foto" => $upload_foto,
            	"nominal_angsuran" => $nominal_angsuran,
            	"nominal_setuju" => $post['nominal_disetujui'],
            );

            $this->db->insert('pinjaman', $data);

		    redirect(base_url('/pinjaman'));
        } else {
		    redirect(base_url('/pinjaman/tambah'));
        }

	}
	public function edit($id) {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		$data['pinjaman'] = $this->db->get_where("pinjaman", array("id_pinjaman" => $id))->row();

		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/pinjaman/edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function update($id) {
		$post = $this->input->post();

		$data_pinjaman = $this->db->get_where('pinjaman', array('id_pinjaman' => $id))->row();
        $namaFile = time();
		
		if($_FILES['foto']['name']) {
			$upload_foto = $this->upload_foto_nasabah("foto", $namaFile);
		} else {
			$upload_foto = $data_pinjaman->foto;
		}

        if($upload_foto != "error") {
            $nominal_angsuran = $post['nominal_disetujui']/($post['jangka_pinjaman']*12);
            $data = array(
            	"id_nasabah" => $post['nasabah'],
            	"tgl_pinjaman" => $post['tgl_pinjaman'],
            	"jangka_pinjaman" => $post['jangka_pinjaman'],
            	"nominal_pinjaman" => $post['nominal_pinjaman'],
            	"bunga" => $post['bunga_pinjaman'],
            	"foto" => $upload_foto,
            	"nominal_angsuran" => $nominal_angsuran,
            	"nominal_setuju" => $post['nominal_disetujui'],
            );

			$this->db->where('id_pinjaman', $id)
				->update('pinjaman', $data);

		    redirect(base_url('/pinjaman'));
        } else {
		    redirect(base_url('/pinjaman/edit/'.$id));
        }
	}
	public function info($id) {
		$data['pinjaman'] = $this->db->get_where("pinjaman", array("id_pinjaman" => $id))->row();
		$data['nasabah'] = $this->db->get_where("nasabah", array("id_nasabah" => $data['pinjaman']->id_nasabah))->row();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pinjaman/info', $data);
		$this->load->view('admin/layout/footer');
	}
	public function hapus($id) {
		$this->db->where('id_pinjaman', $id)
			->delete('pinjaman');

		redirect(base_url('/pinjaman'));
	}
}
