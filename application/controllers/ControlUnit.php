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
		$this->load->view('service-header');
		$this->load->view('services');
		$this->load->view('layout/footer');
	}

	public function sendMessage()
	{
		print_r($_POST);
		die;
		$insertData = array(
			'name' => htmlspecialchars(trim($_POST['fname'])),
			'email' => htmlspecialchars(trim($_POST['ymail'])),
			'password' => '',
			'role' => 'User',
		);
		$validate = $this->MainModel->selectAllFromWhere("users", array("email" => $insertData['email']));
		if (!$validate) {
			$this->load->helper('email');
			$to = 'yya9017@gmail.com';
			$sub = 'No Reply';
			$mess = 'Dear ' . $_POST['uName'] . ',' . '/n' . 'Find your creadiential and click on below link for further process';

			$result = $this->MainModel->insertInto('users', $insertData);
			if ($result) {
				sentmail($to, $sub, $mess);
				$this->session->set_flashdata('msg', 'Please Check Your Mail for further process');
				redirect(base_url('#contact-section'));
			} else {
				$this->session->set_flashdata('msg', 'Please Try Again');
				redirect(base_url('#contact-section'));
			}
		}else{
			$this->session->set_flashdata('msg', 'Please Check Your Mail and find crediential as we alredy sent you');
		}
	}
}
