<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('parser');

		if ($this->session->userdata('email')) {
			return header('location:' . base_url('Dashboard'));
		}
	}

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Login';
			$this->load->view('templates/auth-header');
			$this->parser->parse('login', $data);
			$this->load->view('templates/auth-footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->db->get_where('users', ['email' => $email])->row_array();

			//cek user//
			if ($user) {
				//cek user aktif//
				if ($user['is_active'] == 1) {

					//cek password
					if (password_verify($password, $user['password'])) {
						$data = [
							'fullname' => $user['fullname'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'id' => $user['id']
						];

						$this->session->set_userdata($data);
						redirect('Dashboard');
					} else {
						$this->session->set_flashdata(
							'message', 
							'<div class="alert alert-danger" role="alert">Password Salah !</div>'
						);
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata(
						'message', 
						'<div class="alert alert-danger" role="alert">Alamat Email tidak aktif</div>'
					);
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata(
					'message', 
					'<div class="alert alert-danger" role="alert">Alamat Email tidak terdaftar</div>'
				);
				redirect('auth');
			}
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules(
			'fullname', 
			'Fullname', 
			'required|trim'
		);
		$this->form_validation->set_rules(
			'email', 
			'Email', 
			'required|trim|valid_email|is_unique[users.email]'
		);
		$this->form_validation->set_rules(
			'password', 
			'Password', 
			'required|trim|min_length[5]|matches[password2]', 
			[
				'matches' => 'Password Tidak sama'
			]
		);
		$this->form_validation->set_rules(
			'password2', 
			'Password2', 
			'required|trim|matches[password]',
			[
				'matches' => 'Password Tidak sama'
			]
		);

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Register';
			$this->load->view('templates/auth-header');
			$this->load->view('register', $data);
			$this->load->view('templates/auth-footer');
		} else {
			$data = [
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
			];
			$this->db->insert('users', $data);
			$this->session->set_flashdata(
				'message', 
				'<div class="alert alert-primary" role="alert">Registrasi Berhasil , Silahkan Login</div>'
			);
			redirect('auth');
		}
	}
}
