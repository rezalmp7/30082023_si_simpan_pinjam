<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('admin/login');
	}
	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		switch ($level) {
			case 0:
				$user = $this->db->get_where('nasabah', ['username' => $username])->row_array();
				$level = 'nasabah';
				break;
			case 1:
				$user = $this->db->get_where('teller', ['username' => $username])->row_array();
				$level = 'teller';
				break;
			case 2:
				$user = $this->db->get_where('manager', ['username' => $username])->row_array();
				$level = 'manager';
				break;
			default:
				redirect(base_url('login'));
				break;
		}

		if ($user) {
			if (md5($password) == $user['password']) {
				$data = [
					'status' => 'login_admin',
					'nama' => $user['nama'],
					'username' => $user['username'],
					'level' => $level
				];

				$this->session->set_userdata($data);
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect(base_url('login'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
			redirect(base_url('login'));
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', "Berhasil Logout dari akun");
		redirect(base_url('login'));
	}
}
