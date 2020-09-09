<?php

use function PHPSTORM_META\override;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	var $UserDtl;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia

		if (!isset($_SESSION['userInfo']))		   // On first entry re-direct to logi screen
		{
			redirect('Login/index');
		} else {
			$this->UserDtl = $_SESSION['userInfo'];
		}
	}

	public function index()
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/user-dashboard');
		$this->load->view('user/layout/footer.php');
	}

	public function upload_document($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/service-details');
		$this->load->view('user/layout/footer.php');
	}

	public function payment_receipts($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/payment-receipts');
		$this->load->view('user/layout/footer.php');
	}

	public function helpdesk($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/help/helpdesk');
		$this->load->view('user/layout/footer.php');
	}

	public function view_ticket($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/help/view-ticket');
		$this->load->view('user/layout/footer.php');
	}

	public function chatroom($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/help/chatroom');
		$this->load->view('user/layout/footer.php');
	}

	public function setting($services_id = null)
	{
		$this->load->view('user/layout/header.php');
		$this->load->view('user/layout/sidenav.php');
		$this->load->view('user/setting');
		$this->load->view('user/layout/footer.php');
	}

	// public function upload_pdf()
	// {
	// 	// my_print($_POST);
	// 	// 	// my_print($_POST["redirectUrl"]);
	// 	// 	die;


	// 	if (isset($_FILES["file"]["name"]) && isset($_POST["pdffilename"]) && isset($_POST["override"]) && isset($_POST["report_type"])) {

	// 		$override = $_POST["override"];
	// 		$fileName = validateInput($_POST["pdffilename"]);
	// 		$report_type = validateInput($_POST["report_type"]);
	// 		$reportPath = '../' . $report_type;
	// 		$BKPreportPath = '../' . $report_type . '_report_bkp';
	// 		$pdfreporturl = $report_type;


	// 		$upload_ready = false;

	// 		if (!file_exists('./' . $reportPath)) {
	// 			mkdir('./' . $reportPath, 0755, true);
	// 		}
	// 		if (!file_exists('./' . $BKPreportPath)) {
	// 			mkdir('./' . $BKPreportPath, 0755, true);
	// 		}


	// 		if (file_exists('./' . $reportPath . '/' . $fileName . '.pdf')) {
	// 			if ($override == 'true') {
	// 				rename('./' . $reportPath . '/' . $fileName . '.pdf', './' . $BKPreportPath . '/' . $fileName . '_bkp_' . date("Ymd_His") . '.pdf');
	// 				$upload_ready = true;
	// 			} else {
	// 				echo json_encode(array('success' => true, "file_exist" => true, 'message' =>  "File already exist."));
	// 			}
	// 		} else {
	// 			$upload_ready = true;
	// 		}

	// 		if ($upload_ready) {
	// 			$config['upload_path'] = './' . $reportPath;
	// 			$config['allowed_types'] = 'pdf';
	// 			$config['max_size'] = '100000';
	// 			$config['file_name'] = $fileName;
	// 			$this->load->library('upload', $config);
	// 			if (!$this->upload->do_upload('file')) {
	// 				//	$this->session->set_flashdata("error",  $this->upload->display_errors());
	// 				//echo $this->upload->display_errors();
	// 				echo json_encode(array('success' => false, 'message' =>  $this->upload->display_errors()));
	// 			} else {
	// 				$data = $this->upload->data();
	// 				//	$pdf_link = base_url($pdfreporturl) . '/' . $data['file_name'];
	// 				$pdf_link = PDF_SERVER . "/" . $pdfreporturl . '/' . $data['file_name'];

	// 				echo json_encode(array('success' => true, 'pdf_link' => $pdf_link, 'message' =>  "Uploaded successfully."));
	// 			}
	// 		}
	// 	} else {

	// 		echo json_encode(array('success' => false, 'message' =>  "Insufficient Information sent."));
	// 	}
	// }

	public function logout()
	{
		$this->session->unset_userdata('userInfo');
		redirect("login");
	}
}
