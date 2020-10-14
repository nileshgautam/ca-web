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
		
		$this->load->view('login/header');
		$this->load->view('login/register');
		$this->load->view('login/footer');
	}
	public function register_user()
	{
		
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['number'])) {
			$insertData = array(
				'name' => validateInput($_POST['name']),
				'email' => validateInput($_POST['email']),
				'contact_no' => validateInput($_POST['number']),
				'state' => validateInput($_POST['state']),
				'password' => validateInput($_POST['password']),
				'role' => 'User',
				'status' => 'A',
				'fLogin' => 1
			);
			$insertData['user_id'] =   $this->MainModel->getNewIDorNo('users', "USR-");

			$checkExist = $this->MainModel->selectAllFromWhere("users", array("email" => $insertData['email']));

			if (!$checkExist) {
				$result = $this->MainModel->insertInto('users', $insertData);

				if ($result) {				
					// $this->session->set_userdata("userInfo", $insertData);
					$this->session->set_flashdata('success', 'Registered Successfully');
					redirect(base_url('Login'));
				} else {
					$this->session->set_flashdata('error', 'Could not register try after some time');
					redirect(base_url('Login/Register'));
				}
			} else {
				$this->session->set_flashdata('error', 'Account Already Exist');
				redirect(base_url('Login/Register'));
			}
		} else {
			$this->session->set_flashdata('error', 'Insufficient detail send contact to admin');
			redirect(base_url('Login/Register'));
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

	public function validateMail(){
		if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = $_POST['email'];
			$result = $this->MainModel->selectAllFromWhere("users", array("email" => $email, "status" => 'A'));
			if($result){
				echo json_encode(array('success',$result));
			}else{
				echo json_encode(array('error','Invalid Email'));
			}
		}else{
			echo json_encode(array('error','Please enter your Email'));
		}
	}

	public function updatePassword()
    {
        if (isset($_POST['new-password'])) {
            $pass = $_POST['new-password'];
            $email = $_POST['email'];
            $result =  $this->MainModel->updateWhere("users", array('password' => $pass), array("email" => $email));
            if ($result) {
				// print_r($result);die;
                $this->session->set_flashdata("success",  "Password changed Successfully, Login with your new password");                
                redirect("login");
            } else {
                $this->session->set_flashdata("success",  "Password could not change");
                redirect(base_url('User/index'));
            }
        } else {
            $this->session->set_flashdata("error",  "No password found");
            redirect(base_url('User/index'));
        }
    }

	public function logout()
	{
		$this->session->unset_userdata('userInfo');
		$this->session->sess_destroy();
		redirect(__CLASS__);
	}
}
