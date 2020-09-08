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
		$page['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASCS');
		$page['services'] = $this->MainModel->selectAllFromTableOrderBy('services', 'service_name', 'ASC');
		$page['title'] = 'CA Web';
		$this->load->view('layout/header', $page);
		$this->load->view('index');
		$this->load->view('layout/footer');
	}

	public function service($id = '')
	{
		$id = base64_decode($id);
		$page['service'] = $this->MainModel->selectAllFromWhere("services", array("id" => $id));
		$page['title'] = 'Proprietorship Company';
		$this->load->view('layout/header', $page);
		$this->load->view('services');
		$this->load->view('layout/footer');
	}

	public function sendMessage()
	{
		// print_r($_POST);

		// // print_r($password);
		// die;
		$password = $this->passwordGenerate(8);
		$insertData = array(
			'name' => validateInput($_POST['uName']),
			'email' => validateInput($_POST['email']),
			'contact_no' => validateInput($_POST['contact']),
			'state' => validateInput($_POST['state']),
			'password' => $password,
			'role' => 'User',
			'status' => 'A'
		);
		$insertData['user_id'] =   $this->MainModel->getNewIDorNo('users', "USR-");
		$userService = array(
			'user_id' => $insertData['user_id'],
			'service_id' => validateInput($_POST['serviceId']),
			'package' => validateInput($_POST['package']),
			'status' => Payment_Received

		);

		$validate = $this->MainModel->selectAllFromWhere("users", array("email" => $insertData['email']));
		if (!$validate) {
			$this->load->helper('email');
			$to = $insertData['email'];
			$sub = 'No Reply';
			$mess = 'Dear ' . $_POST['uName'] . ',' . '<br>' . 'Find your creadiential and click on below link for further process' . '<br>' . 'link: ' . base_url('Login') . '<br>User Name: ' . $insertData['email'] . '<br>' . 'Password: ' . $password;
			if (sentmail($to, $sub, $mess)) {
				$result = $this->MainModel->insertInto('users', $insertData);
				$result1 = $this->MainModel->insertInto('user_services', $userService);
				if ($result && $result1) {

					$this->session->set_flashdata('success', 'Please Check Your Mail for further process');
					redirect($_POST['redirection']);
				} else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect($_POST['redirection']);
				}
			} else {
				$this->session->set_flashdata('error', 'Something Wrong try again after some time.');
				redirect($_POST['redirection']);
			}
		} else {
			$result1 = $this->MainModel->insertInto('user_services', $userService);
				if ($result1) {

					$this->session->set_flashdata('success', 'Please Login your account for further process');
					redirect($_POST['redirection']);
				} else {
					$this->session->set_flashdata('error', 'Please Try Again');
					redirect($_POST['redirection']);
				}
			// $this->session->set_flashdata('error', 'Please Check Your Mail and find crediential as we alredy sent you');
			redirect($_POST['redirection']);
		}
	}

	function passwordGenerate($length)
	{

		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars), 0, $length);
	}
}
