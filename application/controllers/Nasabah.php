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
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $almt_nasabah = $this->input->post('almt_nasabah');
            $tmpt_lhr_nasabah = $this->input->post('tmpt_lhr_nasabah');
            $tgl_lhr_nasabah = $this->input->post('tgl_lhr_nasabah');
            $tlp_nasabah = $this->input->post('tlp_nasabah');
            $email_nasabah = $this->input->post('email_nasabah');
            $stts_kwn_nasabah = $this->input->post('stts_kwn_nasabah');
            $pekerjaan_nasabah = $this->input->post('pekerjaan_nasabah');
            $nm_prshaan_nasabah = $this->input->post('nm_prshaan_nasabah');
            $almt_prshaan_nasabah = $this->input->post('almt_prshaan_nasabah');
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "foto nasabah Gagal di upload!";
                } else {
                    $foto = $this->upload->data('file_name');
                }
        }
				$data = array(
                'username' => $username,
                'nama' => $nama,
                'password' => md5($password),
                'almt_nasabah' => $almt_nasabah,
                'tmpt_lhr_nasabah' => $tmpt_lhr_nasabah,
                'tgl_lhr_nasabah' => $tgl_lhr_nasabah,
                'tlp_nasabah' => $tlp_nasabah,
                'email_nasabah' => $email_nasabah,
                'stts_kwn_nasabah' => $stts_kwn_nasabah,
                'pekerjaan_nasabah' => $pekerjaan_nasabah,
                'nm_prshaan_nasabah' => $nm_prshaan_nasabah,
                'almt_prshaan_nasabah' => $almt_prshaan_nasabah,
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
		
}