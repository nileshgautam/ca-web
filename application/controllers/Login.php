<?php
class Login extends ci_controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");

		if (isset($_SESSION['userInfo']) && !empty($_SESSION['userInfo']) && $_SESSION['userInfo']['role'] == 'Admin') {
			redirect(base_url('Admin'));
		} else if (isset($_SESSION['userInfo']) && !empty($_SESSION['userInfo']) && $_SESSION['userInfo']['role'] == 'User') {
			redirect(base_url('User'));
		}
	}
	public function register()
	{
		redirect('Login');
		$this->load->view('login/header');
		$this->load->view('login/register');
		$this->load->view('login/footer');
	}
	public function register_user()
	{
		redirect('Login');
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
			$insertData = array(
				'name' => validateInput($_POST['name']),
				'password' => validateInput($_POST['password']),
				'email' => validateInput($_POST['email']),
				'status' => 'A',
				'role' => validateInput($_POST['role']),
			);

			$checkExist = $this->MainModel->selectAllFromWhere("users", array("email" => $insertData['email']));

			if (!$checkExist) {
				$insertData['user_id'] =	$this->MainModel->getNewIDorNo("users");

				$result = $this->MainModel->insertInto('users', $insertData);

				if ($result) {
					$final = $this->MainModel->selectAllFromWhere("users", array("user_id" => $insertData['user_id']));
					$this->session->set_userdata("userInfo", $final[0]);
					echo json_encode(array('success' => true, 'message' => 'Registered successfully'));
				} else {
					echo json_encode(array('success' => false, 'message' => 'Server error.'));
				}
			} else {
				echo json_encode(array('success' => false, 'message' => 'Email already exists'));
			}
		} else {
			echo json_encode(array('success' => false, 'message' => 'Insufficient details sent, Please contact admin.'));
		}
		exit();
	}

	public function index()
	{

		$this->load->view('login/header');
		$this->load->view('login/index');
		$this->load->view('login/footer');
	}

	public function validate($detail = '')
	{
		//my_print($_POST);die;
		if ($detail != '') {
			$auth = json_decode(base64_decode($detail), true);
			$_POST['email'] = $auth[0];
			$_POST['password'] = $auth[1];
		}
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$email = validateInput($_POST['email']);
			$password = validateInput($_POST['password']);

			$result = $this->MainModel->selectAllFromWhere("users", array("email" => $email, "password" => $password, "status" => 'A'));

			if ($result) {
				$result = $result[0];
				// print_r($result);die;
				$this->session->set_userdata("userInfo", $result, isset($_POST['rememberme']) ? true : false);
				$this->session->set_flashdata('success', 'Login Successfully');
				if ($result['role'] == 'User') {
					if ($result['fLogin']) {						
						redirect(base_url('User'));
					} else {						
						$this->MainModel->updateWhere("users", array('fLogin' => 1), array("email" => $email));						
						redirect(base_url('User'));
					}
					
				} else if ($result['role'] == 'Admin') {
					redirect(base_url('Admin'));
				}
			} else {
				$this->session->set_flashdata('error', 'Please enter valid crediential');
				redirect(base_url('Login'));
			}
		} else {
			$this->session->set_flashdata('error', 'System Error! contact ti IT');
			redirect($this->index());
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('userInfo');
		$this->session->sess_destroy();
		redirect(__CLASS__);
	}
}
