<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teller extends CI_Controller {


	
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
		
		$data['teller'] = $this->Data_model->get_data('teller')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/teller/index',$data);
		$this->load->view('admin/layout/footer');
	}
	public function tambah_teller()
	{	
		$data['teller'] = $this->db->get('teller')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/teller/tambah_teller',$data);
		$this->load->view('admin/layout/footer');
	}
	public function store()
    {
        $post = $this->input->post();
        $data = array(
            "username" => $post['username'],
            "nama" => $post['nama'],
            "password" => md5($post['password']),
        );
        $this->db->insert('teller', $data);
        redirect(base_url('/teller'));
	}

    public function edit($id) {
		$data['teller'] = $this->db->get("teller")->result();
		$data['teller'] = $this->db->get_where("teller", array("id_teller" => $id))->row();
		
		$this->load->view('admin/layout/header');
		$this->load->view('admin/teller/edit', $data);
		$this->load->view('admin/layout/footer');
	}

    public function update($id) {
		$post = $this->input->post();

		$data = array(
            "username" => $post['username'],
            "nama" => $post['nama'],
            "password" => md5($post['password']),
        );

		$this->db->where('id_teller', $id)
			->update('teller', $data);

		redirect(base_url('/teller'));
	}
	public function hapus($id) {
		$this->db->where('id_teller', $id)
			->delete('teller');

		redirect(base_url('/teller'));
	}
		
}