<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {



	public function __construct() {
		parent::__construct();
		// Load session library
		$this->load->library('session');
		$this->load->helper('url');

	}
	public function index(){

		if(isset($_SESSION['logged_in'])) {
			$session_data = $this->session->userdata('logged_in');
			$data['session_username'] = $session_data['username']; 
			redirect('/matchanrebuild');
		}

		if($this->session->userdata('error')) {
			$session_data = $this->session->userdata('error');
			$data["error_message"] = $session_data['error_message']; 
			$this->load->view("register_page", $data);
		} else {
			$this->load->view("register_page");
		}
	}



	// Check for user login process
	public function login_process() {

		$this->load->database();
		$data = array(
			'username' => $_POST["email"],
			'password' => $_POST["password"]
			);


		$condition = "uemail =" . "'" . $data['username'] . "' AND " . "upassword =" . "'" . $data['password'] . "'";

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$result = $query->result();
			$checkid= $result[0]->uid;

		$SQLquery = "
		(SELECT * FROM `users` 
		INNER JOIN `rating_cafe` 
		ON users.uid=rating_cafe.uid
		WHERE users.uid=$checkid
		ORDER BY rating_cafe.cid DESC
		LIMIT 1) 
		";
		$querycafeid = $this->db->query($SQLquery);
		$cafeidresult = $querycafeid->result();
		$cafeid = $cafeidresult[0] ->cid;

			$sess_array = array(
				'uid' => $result[0]->uid,
				'username' => $result[0]->uname
				);

			$this->session->set_userdata('logged_in', $sess_array);
			unset($_SESSION['error']);
			return header('location:/matchanrebuild');
		} else {
			$data = array(
				'error_message' => 'Invalid Username or Password'
				);
			$this->session->set_userdata('error', $data);
			return header('location:/matchanrebuild/login');
		}
	

	}	

	public function new_register() {

		$this->load->database();

		$data = array(
			'uname'=>$_POST["name"],
			'uemail'=>$_POST["email"],
			'upassword'=>$_POST["password"],
			'ubirthdate'=>$_POST["birthdate"],
			'ugender' => $_POST["gender"],
			'ubudget' => 0
			);

		// Query to check whether username already exist or not
		$condition = "uname =" . "'" . $data['uname'] . " ' OR " . "uemail =" . "'" . $data['uemail'] . "'";;
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		// Query to insert data in database
			$this->db->insert('users', $data);
			ob_start();
			if ($this->db->affected_rows() > 0) {

					$id =  $this->db->insert_id();
					$sess_array = array(
						'uid' => $id,
						'username' => $data['uname']
						);

					$this->session->set_userdata('logged_in', $sess_array);
					unset($_SESSION['register_error']);

					for ($i = 1; $i <= 30 ; $i++ ) {

		 
				   			$data2 = array(
								'ratescore'=>$rating_value,
								'cid'=>$i,
								'uid'=>$id
								);
				   			$this->db->insert('rating_cafe', $data2);

				   			
					}

					// redirect('/matchan/item_detail/detail/1');
					return header("Location:/matchanrebuild",'refresh');
					//Mainnnnnnnnnnnnnnn // return header("Location:/matchan/item_detail/detail/1",'refresh');
					// $this->load->view('/matchan/item_detail/detail/1');
			}
				
		} else {
			$data = array(
				'error_message' => 'Username or Email already Exist'
				);
			$this->session->set_userdata('register_error', $data);
			$this->load->view('/matchanrebuild/registration');
		}
	}	

		// Logout from admin page
		public function logout() {

		// Removing session data
			$sess_array = array(
				'username' => '',
				'error_message' => ''
				);
			$this->session->unset_userdata('logged_in', $sess_array);
			$this->session->unset_userdata('error', $sess_array);
			unset($_SESSION['error']);
			unset($_SESSION['register_error']);
			$data['message_display'] = 'Successfully Logout';
			header('location:/matchanrebuild');
		}	
}
?>
