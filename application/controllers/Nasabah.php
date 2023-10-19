<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {


	
	function __construct(){
		parent::__construct();		
		$this->load->model('Data_model');
        
	}
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
		
		$data['nasabah'] = $this->Data_model->get_data('nasabah')->result();
        // $data['nasabah'] = $this->db->where("nasabah", $id_nasabah)->get()->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/nasabah/index',$data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah_nasabah()
	{	
		
		$data['nasabah'] = $this->Data_model->get_data('nasabah')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/nasabah/form_tambah_nasabah',$data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah_nasabah_aksi()
    {
        $post = $this->input->post();
        
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $config['upload_path'] = './assets/foto_nasabah/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "foto nasabah Gagal di upload!";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'username' => $post['username'],
            'nama' => $post['nama'],
            'password' => md5($post['password']),
            'almt_nasabah' => $post['almt_nasabah'],
            'tmpt_lhr_nasabah' => $post['tmpt_lhr_nasabah'],
            'tgl_lhr_nasabah' => $post['tgl_lhr_nasabah'],
            'tlp_nasabah' => $post['tlp_nasabah'],
            'no_ktp_nasabah' => $post['no_ktp_nasabah'],
            'email_nasabah' => $post['email_nasabah'],
            'stts_kwn_nasabah' => $post['stts_kwn_nasabah'],
            'pekerjaan_nasabah' => $post['pekerjaan_nasabah'],
            'nm_prshaan_nasabah' => $post['nm_prshaan_nasabah'],
            'almt_prshaan_nasabah' => $post['almt_prshaan_nasabah'],
            'foto' => $foto,

        );
        $this->Data_model->insert_data($data, 'nasabah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            nasabah Baru Berhasil Ditambahkan!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('nasabah');
	}

    public function edit($id) {
		$data['nasabah'] = $this->db->get("nasabah")->result();
		$data['nasabah'] = $this->db->get_where("nasabah", array("id_nasabah" => $id))->row();

		// echo "<pre>";
		// print_r($data);
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/nasabah/edit', $data);
		$this->load->view('admin/layout/footer');
	}

    public function update($id) {
		$post = $this->input->post();
        $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto_nasabah/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_error;
                }
        }
		$data = array(
            'username' => $post['username'],
            'nama' => $post['nama'],
            'password' => md5($post['password']),
            'almt_nasabah' => $post['almt_nasabah'],
            'tmpt_lhr_nasabah' => $post['tmpt_lhr_nasabah'],
            'tgl_lhr_nasabah' => $post['tgl_lhr_nasabah'],
            'tlp_nasabah' => $post['tlp_nasabah'],
            'no_ktp_nasabah' => $post['no_ktp_nasabah'],
            'email_nasabah' => $post['email_nasabah'],
            'stts_kwn_nasabah' => $post['stts_kwn_nasabah'],
            'pekerjaan_nasabah' => $post['pekerjaan_nasabah'],
            'nm_prshaan_nasabah' => $post['nm_prshaan_nasabah'],
            'almt_prshaan_nasabah' => $post['almt_prshaan_nasabah'],
            'foto' => $foto,
        );

		$this->db->where('id_nasabah', $id)
			->update('nasabah', $data);

		redirect(base_url('/nasabah'));
	}
	public function hapus($id) {
		$this->db->where('id_nasabah', $id)
			->delete('nasabah');

		redirect(base_url('/nasabah'));
	}
		
}