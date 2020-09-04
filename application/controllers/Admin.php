<?php

use function PHPSTORM_META\override;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	var $UserDtl;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia

		// if (!isset($_SESSION['userInfo']))		   // On first entry re-direct to logi screen
		// {
		// 	redirect('Login/index');
		// } else {
		// 	$this->UserDtl = $_SESSION['userInfo'];
		// }
	}
	private function load_view($views = [], $vars = [])
	{
		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/sidenav.php');
		// print_r($views);die;
		if (is_array($views)) {
			foreach ($views as $view) {
				$this->load->view('admin/' . $view, $vars);
			}
		} else {
			$this->load->view('admin/' . $views, $vars);
		}
		$this->load->view('admin/layout/footer.php');
	}
	public function index()
	{
		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/sidenav.php');
		$this->load->view('admin/adminDashboard.php');
		$this->load->view('admin/layout/footer.php');
	}
	public function countries()
	{
		$data['data'] = $this->MainModel->selectAllFromTable('countries');
		$data['keys'] = array_keys($data['data'][0]);
		$data['th'] = ['#', 'Country', 'Action'];
		$data['title'] = 'Countries';
		$this->load_view('dataTables', $data);
		//my_print($list);
	}
	public function addCountries()
	{
		$insertData = array(
			"country_name" => $_POST['name']
		);
		$validate = $this->MainModel->selectAllFromWhere("countries", array("country_name" => $insertData['country_name']));
		if (!$validate) {
			$result = $this->MainModel->insertInto('countries', $insertData);
			if ($result) {
				echo json_encode(array('success', 'Country successfully added'));
			} else {
				echo json_encode(array('error', 'Country could not be add, Contact to IT'));
			}
		} else {
			echo json_encode(array('error', 'Country already exist'));
		}
	}

	public function categories()
	{
		$data['data'] = $this->MainModel->selectAllFromTable('categories');
		$data['keys'] = array_keys($data['data'][0]);
		$data['th'] = ['#', 'Categories', 'Action'];
		$data['title'] = 'Categories';
		$this->load_view('dataTables', $data);
	}

	public function addCategories()
	{
		$insertData = array(
			"category" => $_POST['name']
		);
		$validate = $this->MainModel->selectAllFromWhere("categories", array("category" => $insertData['category']));
		if (!$validate) {
			$result = $this->MainModel->insertInto('categories', $insertData);
			if ($result) {
				echo json_encode(array('success', 'Category successfully added'));
			} else {
				echo json_encode(array('error', 'Category could not be add, Contact to IT'));
			}
		} else {
			echo json_encode(array('error', 'Category already exist'));
		}
	}

	public function showServices()
	{
		$data['services'] = $this->MainModel->selectAllFromTableOrderBy('services', 'service_name', 'ASC');		
		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/sidenav.php');
		$this->load->view('admin/showServices.php', $data);
		$this->load->view('admin/layout/footer.php');
	}

	public function addServices($id = '')
	{
		if($id !=""){
			$data['selectedService'] = $this->MainModel->selectAllFromWhere("services", array("id" => $id));
			$data['submitType'] = 'update';
		}
		$data['services'] = $this->MainModel->selectAllFromTableOrderBy('services', 'service_name', 'ASC');
		$data['categories'] = $this->MainModel->selectAllFromTableOrderBy('categories', 'category', 'ASC');
		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/layout/sidenav.php');
		$this->load->view('admin/addServices.php', $data);
		$this->load->view('admin/layout/footer.php');
	}

	public function saveServices()
	{
		//KeyHighlight json
		$keyHLight = [
			validateInput($_POST['keyHighlight1']),
			validateInput($_POST['keyHighlight2']),
			validateInput($_POST['keyHighlight3']),
			validateInput($_POST['keyHighlight4']),
			validateInput($_POST['keyHighlight5']),
			validateInput($_POST['keyHighlight6']),
		];
		//Features json
		$features = [
			['heading' => validateInput($_POST['featureHeading1']), 'description' => validateInput($_POST['featureDescription1'])],
			['heading' => validateInput($_POST['featureHeading2']), 'description' => validateInput($_POST['featureDescription2'])],
			['heading' => validateInput($_POST['featureHeading3']), 'description' => validateInput($_POST['featureDescription3'])],
			['heading' => validateInput($_POST['featureHeading4']), 'description' => validateInput($_POST['featureDescription4'])],
			['heading' => validateInput($_POST['featureHeading5']), 'description' => validateInput($_POST['featureDescription5'])],
			['heading' => validateInput($_POST['featureHeading6']), 'description' => validateInput($_POST['featureDescription6'])],
		];

		$insertData = array(
			'category_id' => $_POST['category'],
			'service_name' => $_POST['sName'],
			'service_price' => $_POST['servicePrice'],
			'service_short_description' => $_POST['sdescription'],
			'service_description' => $_POST['ldescription'],
			'keyhighlight_points' => json_encode($keyHLight),
			'banner_image' => '',
			'service_side_image' => '',
			'label_points' => json_encode($features),
			'service_packages	' => $_POST['packages'],
			'priority' => '',
		);

		$validate = $this->MainModel->selectAllFromWhere("services", array("service_name" => $insertData['service_name']));
		if(!$validate){
			$result = $this->MainModel->insertInto('services', $insertData);
			if ($result) {
				echo json_encode(array('success', 'Service successfully added'));
			} else {
				echo json_encode(array('error', 'Service could not be add, Contact to IT'));
			}
		}else{
			echo json_encode(array('error', 'Service already exist'));
		}
	}
	public function upload_pdf()
	{
		// my_print($_POST);
		// 	// my_print($_POST["redirectUrl"]);
		// 	die;


		if (isset($_FILES["file"]["name"]) && isset($_POST["pdffilename"]) && isset($_POST["override"]) && isset($_POST["report_type"])) {

			$override = $_POST["override"];
			$fileName = validateInput($_POST["pdffilename"]);
			$report_type = validateInput($_POST["report_type"]);
			$reportPath = '../' . $report_type;
			$BKPreportPath = '../' . $report_type . '_report_bkp';
			$pdfreporturl = $report_type;


			$upload_ready = false;

			if (!file_exists('./' . $reportPath)) {
				mkdir('./' . $reportPath, 0755, true);
			}
			if (!file_exists('./' . $BKPreportPath)) {
				mkdir('./' . $BKPreportPath, 0755, true);
			}


			if (file_exists('./' . $reportPath . '/' . $fileName . '.pdf')) {
				if ($override == 'true') {
					rename('./' . $reportPath . '/' . $fileName . '.pdf', './' . $BKPreportPath . '/' . $fileName . '_bkp_' . date("Ymd_His") . '.pdf');
					$upload_ready = true;
				} else {
					echo json_encode(array('success' => true, "file_exist" => true, 'message' =>  "File already exist."));
				}
			} else {
				$upload_ready = true;
			}

			if ($upload_ready) {
				$config['upload_path'] = './' . $reportPath;
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '100000';
				$config['file_name'] = $fileName;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')) {
					//	$this->session->set_flashdata("error",  $this->upload->display_errors());
					//echo $this->upload->display_errors();
					echo json_encode(array('success' => false, 'message' =>  $this->upload->display_errors()));
				} else {
					$data = $this->upload->data();
					//	$pdf_link = base_url($pdfreporturl) . '/' . $data['file_name'];
					$pdf_link = PDF_SERVER . "/" . $pdfreporturl . '/' . $data['file_name'];

					echo json_encode(array('success' => true, 'pdf_link' => $pdf_link, 'message' =>  "Uploaded successfully."));
				}
			}
		} else {

			echo json_encode(array('success' => false, 'message' =>  "Insufficient Information sent."));
		}
	}




	public function logout()
	{

		$this->session->unset_userdata('userInfo');

		redirect("login");
	}
}
