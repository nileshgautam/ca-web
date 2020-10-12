<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlUnit extends CI_Controller
{

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$page['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$page['countries'] = $this->MainModel->selectAllFromTableOrderBy('countries', 'country_name', 'ASC');
		$page['featureLabel'] = $this->MainModel->selectAllFromTable('feature_label');
		$page['clients'] = $this->MainModel->selectAllFromTable('client_details');
		$page['sub_categories'] = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		$page['gServices'] = $this->servicesArray();
		$page['services'] = $this->MainModel->getAllServices();

		$page['title'] = 'CA Web';
		$this->load->view('website/layout/header', $page);
		$this->load->view('website/index');
		$this->load->view('website/layout/footer');
	}


	function servicesArray()
	{
		$categories = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$sub_categories = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		$services = $this->MainModel->getAllServices();

		$services1 = [];
		for ($i = 0; $i < count($categories); $i++) {
			$subId = [];
			for ($j = 0; $j < count($sub_categories); $j++) {
				for ($k = 0; $k < count($services); $k++) {
					if ($categories[$i]['id'] == $services[$k]['category_id'] && $sub_categories[$j]['id'] == $services[$k]['sub_category']) {
						$sbId =  $services[$k]['sub_category'];
						if (!in_array($sbId, $subId)) {
							$services1[$services[$k]['sub_cat_name']] = array($services[$k]);
							array_push($subId, $sbId);
						} else {
							array_push($services1[$services[$k]['sub_cat_name']], $services[$k]);
						}
					}
				}
			}
		}

		return $services1;
		// echo "<pre>";
		// print_r($services1);
		// die;
	}

	public function service($id = '')
	{
		$page['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$page['sub_categories'] = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		$page['gServices'] = $this->servicesArray();
		$page['services'] = $this->MainModel->getAllServices();
		$id = base64_decode($id);
		$page['service'] = $this->MainModel->getservicesWithPackage($id);
		$page['sectionData'] = $this->MainModel->selectAllFromWhere("pagesections", array("service_id" => $id));

		$page['title'] = 'Proprietorship Company';
		$this->load->view('website/layout/header', $page);
		$this->load->view('website/services');
		$this->load->view('website/layout/footer');
	}

	public function videoCunsultation()
	{
		$page['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$page['sub_categories'] = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		$page['gServices'] = $this->servicesArray();
		$page['services'] = $this->MainModel->getAllServices();
		$this->load->view('website/layout/header', $page);
		$this->load->view('website/videoConsultation');
		$this->load->view('website/layout/footer');
	}

	public function payment()
	{
		if (isset($_POST['uName']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['state']) && isset($_POST['redirection']) && isset($_POST['serviceId']) && isset($_POST['price']) && isset($_POST['package'])) {
			$insertData = array(
				'name' => validateInput($_POST['uName']),
				'email' => validateInput($_POST['email']),
				'number' => validateInput($_POST['contact']),
				'amount' => validateInput($_POST['price']),
				'serviceId' => validateInput($_POST['serviceId']),
				'package' => validateInput($_POST['package']),
				'state' => validateInput($_POST['state']),
				'redirection' => validateInput($_POST['redirection']),

			);
			$result = $this->MainModel->insertInto('usertemp', $insertData);
			if ($result) {
				redirect(base_url('ControlUnit/payuMoney'));
			} else {
				$this->session->set_flashdata('error', 'Insufficient information sent try again some time later');
				redirect($_POST['redirection']);
			}
		}
		// $data['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		// $data['sub_categories'] = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		// $data['gServices'] = $this->servicesArray();
		// $data['services'] = $this->MainModel->getAllServices();
		// $data['selectedService'] = $_POST;
		// $data['service'] = $this->MainModel->selectAllFromWhere("services", array("serviceId" => $data['selectedService']['serviceId']));
		// echo "<pre>";
		// print_r($_POST);
		// die;
		// $this->load->view('website/layout/header', $data);
		// $this->load->view('website/payment');
		// $this->load->view('website/layout/footer');

		// 
	}

	public function payuMoney()
	{
		$data['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$data['sub_categories'] = $this->MainModel->selectAllFromTableOrderBy('sub_category', 'sub_cat_name', 'ASC');
		$data['gServices'] = $this->servicesArray();
		$data['services'] = $this->MainModel->getAllServices();
		$data['details'] = $this->MainModel->selectAllFromTableOrderBy('usertemp', 'id', 'ASC');
		$data['service'] = $this->MainModel->selectAllFromWhere("services", array("serviceId" => $data['details'][0]['serviceId']));
		// print_r($data['details']);die;
		$this->load->view('website/layout/header', $data);
		$this->load->view('website/payment');
		$this->load->view('website/layout/footer');
		// $this->load->view('payuMoney/index',$data);
	}

	public function payuMoneyResponse()
	{
		echo "<pre>";
		print_r($_POST);
		die;
		$this->load->view('payuMoney/response');
	}

	public function sendMessage()
	{
		$details = $this->MainModel->selectAllFromTableOrderBy('usertemp', 'id', 'ASC');
		// echo "<pre>";
		// print_r($details);
		// print_r($_POST);
		// die;
		if (isset($_POST['status']) && !empty($_POST['status']) && $_POST['status'] == 'success') {
			$password = $this->passwordGenerate(8);
			$insertData = array(
				'name' => validateInput($details[0]['name']),
				'email' => validateInput($details[0]['email']),
				'contact_no' => validateInput($details[0]['number']),
				'state' => validateInput($details[0]['state']),
				'password' => $password,
				'role' => 'User',
				'status' => 'A',

			);
			$insertData['user_id'] =   $this->MainModel->getNewIDorNo('users', "USR-");
			$userService = array(
				'user_id' => $insertData['user_id'],
				'service_id' => validateInput($details[0]['serviceId']),
				'package' => validateInput($details[0]['package']),
				'status' => Payment_Received,
				'price' => validateInput($_POST['amount'])
			);
			$tranzactionData = array(
				'tranzactionId' => validateInput($_POST['txnid']),
				'serviceId' => 	validateInput($details[0]['serviceId']),
				'package' => 	validateInput($details[0]['package']),
				'price' => validateInput($_POST['amount']),
				'user_id' => $insertData['user_id']
			);
			// $tranzactionData['tranzactionId'] =   $this->MainModel->getNewIDorNo('payments', "TRAN-");
			$validate = $this->MainModel->selectAllFromWhere("users", array("email" => $insertData['email']));

			if (!$validate) {
				$this->load->helper('email');
				$to = $insertData['email'];
				$sub = 'No Reply';
				$mess = 'Dear ' . $_POST['uName'] . ',' . '<br>' . 'Find your creadiential and click on below link for further process' . '<br>' . 'link: ' . base_url('Login') . '<br>User Name: ' . $insertData['email'] . '<br>' . 'Password: ' . $password;
				if (sentmail($to, $sub, $mess)) {
					$result = $this->MainModel->insertInto('users', $insertData);
					$result1 = $this->MainModel->insertInto('user_services', $userService);
					$result2 = $this->MainModel->insertInto('payments', $tranzactionData);
					if ($result && $result1) {
						$this->MainModel->deleteFromTable('usertemp', array('email' => $details[0]['email']));
						$this->session->set_flashdata('success', 'Please Check Your Mail for further process');
						redirect(base_url('Login'));
					} else {
						$this->session->set_flashdata('error', 'Please Try Again');
						redirect($details[0]['redirection']);
					}
				} else {
					$this->session->set_flashdata('error', 'Something Wrong try again after some time.');
					redirect($details[0]['redirection']);
				}
			} else {
				$userService['user_id'] = $validate[0]['user_id'];
				$tranzactionData['user_id'] = $validate[0]['user_id'];
				$result1 = $this->MainModel->insertInto('user_services', $userService);
				$result2 = $this->MainModel->insertInto('payments', $tranzactionData);
				if ($result1) {
					$this->MainModel->deleteFromTable('usertemp', array('email' => $details[0]['email']));
					$this->session->set_flashdata('success', 'Please Login your account for further process');
					redirect(base_url('Login'));
				} else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect($details[0]['redirection']);
				}
				// $this->session->set_flashdata('error', 'Please Check Your Mail and find crediential as we alredy sent you');
				redirect($details[0]['redirection']);
			}
		} else {
			$this->session->set_flashdata('error', 'Payment has been failed please try later');
			redirect($details[0]['redirection']);
		}
	}

	function contactUs()
	{
		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
			$insertData = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone']
			);
			$result = $this->MainModel->insertInto('leads', $insertData);
			if ($result) {

				$this->session->set_flashdata('success', 'Thanks, for your interest we will contact you soon');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('error', 'Something wrong, Try Again');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('error', 'All fields are required');
			redirect(base_url());
		}
	}

	function passwordGenerate($length)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars), 0, $length);
	}
}
