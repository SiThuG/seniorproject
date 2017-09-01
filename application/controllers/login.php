<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



	public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');

	}
	public function index(){

		if($this->session->userdata('logged_in')) {
			redirect('/matchanrebuild', 'refresh');
		}

		if($this->session->userdata('error')) {
			$session_data = $this->session->userdata('error');
			$data["error_message"] = $session_data['error_message']; 
			$this->load->view("login_page", $data);
		} else {
			$this->load->view("login_page");
		}

	}
}

?>
