<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url']);
		$this->load->model('user_model');
		
    }
    
    public function index() { }
    
    public function register() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_repeat', 'Confirmar password', 'required|matches[password]');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('template/template', ['v' => 'user/register']);

		} else {

			$nome = $this->input->post('nome');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->user_model->create_user($nome, $email, $password)) {

				$_SESSION['flash'] = ['type' => 'success', 'msg' => 'Utilizador registado com sucesso'];
				$this->session->mark_as_flash('flash');
				
				redirect("/", "refresh");

			} else {

				$data->error = 'There was a problem creating your new account. Please try again.';
				$this->load->view('template/template', ['v' => 'user/register', 'data' => $data]);

			}

		}

    }

    public function login() {

        // create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
        $this->load->library('form_validation');
        
        $type = $this->input->post('type');
		
        $emailField = ($type == 'header' ? 'header_email' : 'email');
		$passwordField = ($type == 'header' ? 'header_password' : 'password');
		$rememberField = ($type == 'header' ? 'header_lembrar' : 'lembrar');

		$this->form_validation->set_rules($emailField, 'Email', 'required|valid_email');
		$this->form_validation->set_rules($passwordField, 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
            // validation not ok, send validation errors to the view
            $this->load->view('template/template', ['v' => 'user/login']);
			
		} else {
			
			// set variables from the form
			$email = $this->input->post($emailField);
			$password = $this->input->post($passwordField);
			$remember = $this->input->post($rememberField);

			if ($this->user_model->resolve_user_login($email, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_email($email);
				$user = $this->user_model->get_user($user_id);
				
				// set session user datas
				$this->session->set_userdata([
					'user_id' => (int)$user->id,
					'email' => (string)$user->email,
					'nome' => (string)$user->nome,
					'logged_in' => (bool)true
				]);

				if ($remember) {
					$this->session->mark_as_temp(['user_id', 'email', 'nome', 'logged_in'], 1200);
				}
				
				// user login ok
				$_SESSION['flash'] = ['type' => 'success', 'msg' => 'Login efetuado com sucesso'];
				$this->session->mark_as_flash('flash');
                redirect("/", "refresh");
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
                // send error to the view
                $this->load->view('template/template', ['v' => 'user/login', 'data' => $data]);
				
			}
			
		}

	}
	
	public function userlist() {

		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] === false) {
			$_SESSION['flash'] = ['type' => 'danger', 'msg' => 'Acesso não permitido'];
			$this->session->mark_as_flash('flash');
			redirect("/", "refresh");
		}

		$data['users'] = $this->user_model->get_user();

		$this->load->view('template/template', ['v' => 'user/list', 'data' => $data]);

	}

    public function logout() {

        // create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$_SESSION['flash'] = ['type' => 'success', 'msg' => 'Logout efetuado com sucesso'];
			$this->session->mark_as_flash('flash');
			redirect("/", "refresh");
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}

    }

}