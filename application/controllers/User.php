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

        if (!isset($_SESSION['userInfo']))           // On first entry re-direct to logi screen
        {
            redirect('Login/index');
        } else {
            $this->UserDtl = $_SESSION['userInfo'];
        }
    }

    public function index()
    {
        $id = $_SESSION['userInfo']['user_id'];
        $data['services'] = [];
        $data['user_services'] = $this->MainModel->selectAllFromTableOrderBy("user_services", 'id', 'DESC', array("user_id" => $id));
        if (isset($data['user_services']) && !empty($data['user_services'])) {
            for ($i = 0; $i < count($data['user_services']); $i++) {
                $sId = $data['user_services'][$i]['service_id'];
                $result = $this->MainModel->selectAllFromWhere("services", array("serviceId" => $sId));
                array_push($data['services'], array_merge($data['user_services'][$i], $result[0]));
            }
        }
        $data['fLogin'] = $_SESSION['userInfo']['fLogin'];

        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/user-dashboard', $data);
        $this->load->view('user/layout/footer');
    }

    public function uploadFile()
    {
        if (isset($_FILES["file"]["name"]) && isset($_POST["service_id"])) {
            $reportPath = 'uploads/';
            $fileName = $_FILES['file']['name'];
            $override = 'false';
            $upload_ready = false;
            $dirName = $reportPath . $_SESSION['userInfo']['user_id'];

            $insertData = array(
                'user_id' => $_SESSION['userInfo']['user_id'],
                'main_service_id' => validateInput($_POST['mService_id']),
                'service_id' => validateInput($_POST['service_id']),
                'document_name' => validateInput($_POST['document_name']),
                'Document_path' => $dirName . '/' . $fileName,
                'status' => 'U',
                'reason' => ''
            );
            if (!file_exists($dirName)) {
                mkdir($dirName, 0755, true);
            }

            if (file_exists($dirName . '/' . $fileName)) {
                $override = 'true';
                if ($override == 'true') {
                    $fileName = date("Ymd_His") . $_FILES['file']['name'];
                    $insertData['Document_path'] = $dirName . '/' .  $fileName;
                    $upload_ready = true;
                }
            } else {
                $upload_ready = true;
            }

            if ($upload_ready) {
                $config['upload_path'] = './' . 'uploads/' . $_SESSION['userInfo']['user_id'];
                $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                $config['max_size'] = '100000';
                $config['file_name'] = $fileName;
                $config['remove_spaces'] = FALSE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata("error",  $this->upload->display_errors());
                    redirect($_POST['current_url']);
                } else {
                    $condition = array("user_id" => $insertData['user_id'], "service_id" => $insertData['service_id'], 'document_name' => $insertData['document_name']);
                    $validate = $this->MainModel->selectAllFromWhere("uploaded_documents", $condition);

                    if (!$validate) {
                        $data = $this->upload->data();
                        $result = $this->MainModel->insertInto('uploaded_documents', $insertData);
                        $this->session->set_flashdata("success",  "Uploaded successfully.");
                        redirect($_POST['current_url']);
                    } else {
                        if (unlink($validate[0]['Document_path'])) {
                            $data = $this->upload->data();
                            $result = $this->MainModel->updateWhere('uploaded_documents', $insertData, $condition);
                            $this->session->set_flashdata("success",  "Successfully updated");
                            redirect($_POST['current_url']);
                        }
                    }
                }
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('userInfo');
        redirect("login");
    }

    public function updateUserService()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $data = array(
                'status' => 'Documents Uploaded',
                'docSubmit' => 'true'
            );
            $condition = array('user_id' => $_SESSION['userInfo']['user_id'], 'service_id' => $_POST['id']);
            $result = $this->MainModel->updateWhere('user_services', $data, $condition);
            if ($result) {
                $this->load->helper('email');
                $to = BACKEND_EMAIL;
                $sub = 'Documents Uploaded';
                $mess = 'Dear Backend Team' . ',' . '<br>' . 'User ' . $_SESSION['userInfo']['user_id'] . ' has been uploaded his required document for his service , Please pay attention for the next process';
                if (sentmail($to, $sub, $mess)) {
                    echo json_encode(array('success', 'Successfully Uploaded'));
                } else {
                    echo json_encode(array('error', 'Message not sent to backend team, Contact to IT'));
                }
            } else {
                echo json_encode(array('error', 'Could not be Uploaded, contact to IT'));
            }
        } else {
            echo json_encode(array('error', 'Insufficient data found contact to IT'));
        }
    }

    public function updatePassword()
    {
        if (isset($_POST['new-password'])) {
            $pass = $_POST['new-password'];
            $email = $_SESSION['userInfo']['email'];
            $result =  $this->MainModel->updateWhere("users", array('password' => $pass), array("email" => $email));
            if ($result) {
                $this->session->set_flashdata("success",  "Password changed Successfully, Login with your new password");
                $this->session->unset_userdata('userInfo');
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

    public function updateProfile()
    {
        if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['state'])) {
            $email = $_SESSION['userInfo']['email'];
            $data = array(
                'name'  => $_POST['name'],
                'contact_no'  => $_POST['number'],
                'state'  => $_POST['state']
            );
            $result =  $this->MainModel->updateWhere("users", $data, array("email" => $email));
            if ($result) {
                $this->session->set_flashdata("success",  "Profile Updated");
                redirect(base_url('User/index'));
            } else {
                $this->session->set_flashdata("success",  "Profile could not be updated");
                redirect(base_url('User/index'));
            }
        } else {
            $this->session->set_flashdata("error",  "Insufficient information sent");
            redirect(base_url('User/index'));
        }
    }




    public function upload_document($services_id = null)
    {
        $data['documents'] =  $this->getRequiredDocuments($services_id);
        $data['docService'] = $this->MainModel->selectAllFromWhere("user_services", array("user_id" => $_SESSION['userInfo']['user_id'], "service_id" => base64_decode($services_id)));
        $data['uploadwedDocs'] = $this->MainModel->selectAllFromWhere("uploaded_documents", array("user_id" => $_SESSION['userInfo']['user_id']));
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/service-details', $data);
        $this->load->view('user/layout/footer');
    }

    public function getRequiredDocuments($services_id = null)
    {
        $data['services'] = $this->MainModel->getUserServices(base64_decode($services_id), $_SESSION['userInfo']['user_id']);
        // print_r($data['services']);die;
        $packages = json_decode($data['services'][0]['packages'], true);
        switch ($data['services'][0]['package']) {
            case 'Basic':
                $ids = "'" . implode("','", $packages[0]['servicesId']) . "'";
                return array($data['documents'] = $this->CustomModel->getREquiredDocuments($ids), $packages[0]['servicesNames']);
                break;
            case 'Essential':
                $ids = "'" . implode("','", $packages[1]['servicesId']) . "'";
                return array($data['documents'] = $this->CustomModel->getREquiredDocuments($ids), $packages[1]['servicesNames']);
                break;
            case 'Premium':
                $ids = "'" . implode("','", $packages[2]['servicesId']) . "'";
                return array($data['documents'] = $this->CustomModel->getREquiredDocuments($ids), $packages[2]['servicesNames']);
            case 'single':
                return array($data['documents'] = $this->CustomModel->getREquiredDocuments($data['services'][0]['serviceId']), $data['documents'] = $data['services']);
                break;
        }
    }

    public function payment_receipts($services_id = null)
    {
        $data['payments'] = $this->MainModel->getPaymentsWithServices($_SESSION['userInfo']['user_id']);
        // echo "<pre>";print_r($data['payments']);die;
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/payment-receipts', $data);
        $this->load->view('user/layout/footer');
    }

    public function helpdesk($services_id = null)
    {
        $data['tickets'] = $this->getTicketReplyMergeData();
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/help/helpdesk', $data);
        $this->load->view('user/layout/footer');
    }

    public function getTicketReplyMergeData()
    {
        $condition = array('customer_id' => $_SESSION['userInfo']['user_id']);
        $result = $this->MainModel->selectAllFromTableOrderBy('helpdesk', 'id', 'DESC', $condition);
        $result1 = $this->MainModel->getAllUserTickets($_SESSION['userInfo']['user_id']);
        $mergedData = [];
        if ($result && $result1) {
            for ($i = 0; $i < count($result); $i++) {
                $mergedData = [];
                for ($k = 0; $k < count($result1); $k++) {
                    if ($result[$i]['ticket_id'] == $result1[$k]['ticket_no']) {
                        array_push($mergedData, $result1[$k]);
                    }
                }
                $result[$i]['replies'] = $mergedData;
            }

            return $result;
        }
        return 0;
    }

    public function view_ticket($ticket_id = null)
    {
        $id = base64_decode($ticket_id);
        $data['replies'] = $this->getTicketGroupedData($id);
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/help/view-ticket', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function getTicketGroupedData($id)
    {
        $result = $this->MainModel->selectAllFromWhere("helpdesk", array("ticket_id" => $id));
        $result1 = $this->MainModel->selectAllFromWhere("helpdesk_reply", array("ticket_no" => $id));
        $groupedData = [];
        if ($result && $result1) {
            for ($i = 0; $i < count($result); $i++) {
                $groupedData = [];
                for ($k = 0; $k < count($result1); $k++) {
                    if ($result[$i]['ticket_id'] == $result1[$k]['ticket_no']) {
                        array_push($groupedData, $result1[$k]);
                    }
                }
                $result[$i]['replies'] = $groupedData;
            }

            return $result;
        }
        return 0;
    }

    public function chatroom($ticket_id = null)
    {
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/help/chatroom');
        $this->load->view('user/layout/footer.php');
    }

    public function setting($services_id = null)
    {
        $id = $_SESSION['userInfo']['user_id'];
        $data['user'] = $this->MainModel->selectAllFromTableOrderBy("users", 'id', 'ASC', array("user_id" => $id));
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/setting', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function recommendation()
    {

        $data['packages'] = $this->MainModel->selectAllFromTableOrderBy("services", 'service_name', 'ASC', array("category_id" => '2'));
        //    echo "<pre>"; print_r($data['recomm']);
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/packages', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function packages()
    {
        $data['packages'] = $this->MainModel->getPackageServices();
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/packages', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function generic()
    {

        $data['packages'] = $this->MainModel->selectAllFromTableOrderBy("services", 'service_name', 'ASC', array("category_id" => '8'));
        //    echo "<pre>"; print_r($data['recomm']);
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/packages', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function others()
    {

        $data['packages'] = $this->MainModel->selectAllFromTableOrderBy("services", 'service_name', 'ASC', array("category_id" => '3'));
        //    echo "<pre>"; print_r($data['recomm']);
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/packages', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function new_ticket($services_id = null)
    {
        if (isset($_POST['subject']) && isset($_POST['description']) && isset($_POST['type'])) {
            $uploadFile = uploadFile($_FILES, './queryUploads');
            if ($uploadFile[0] == 'success') {
                $ticketId = $this->MainModel->getNewIDorNo('helpdesk', "TCK-");
                $query = array(
                    'customer_id' => $_SESSION['userInfo']['user_id'],
                    'ticket_id' => $ticketId,
                    'subject' => validateInput($_POST['subject']),
                    'query' => validateInput($_POST['description']),
                    'files' => $uploadFile[1],
                    'date_time' => date("Y-m-d H:i:s"),
                    'type' => 'query'
                );
                // Inserting Helpdesk data into the database;
                $result = $this->MainModel->insertInto('helpdesk', $query);

                if ($result) {
                    $this->session->set_flashdata("success",  "Ticket Generated");
                    redirect(base_url('User/helpdesk'));
                } else {
                    $this->session->set_flashdata("error",  "Ticket could not be generated");
                    redirect(base_url('User/helpdesk'));
                }
            }
        } else {
            $this->session->set_flashdata("error",  "Insufficient information found, Contact to IT");
            redirect(base_url('User/helpdesk'));
        }
    }

    public function reply()
    {
        if (isset($_POST['ticket_id']) && isset($_POST['reply'])) {
            $query = array(
                'ticket_no' => validateInput($_POST['ticket_id']),
                'reply' => validateInput($_POST['reply']),
                'timeStamp' => date("Y-m-d H:i:s"),
            );

            if ($_SESSION['userInfo']['role'] == 'User') {
                $query['reply_by'] = 'user';
            } else {
                $query['reply_by'] = 'backend';
            }
            // Inserting Helpdesk data into the database;
            $result = $this->MainModel->insertInto('helpdesk_reply', $query);

            if ($result) {
                $this->session->set_flashdata("success",  "Message Sent");
                if ($_SESSION['userInfo']['role'] == 'User') {
                    redirect(base_url('User/helpdesk'));
                } else {
                    redirect(base_url('BackendTeam/helpdesk'));
                }
            } else {
                $this->session->set_flashdata("error",  "Message could no be sent, try again late.");
                if ($_SESSION['userInfo']['role'] == 'User') {
                    redirect(base_url('User/helpdesk'));
                } else {
                    redirect(base_url('BackendTeam/helpdesk'));
                }
            }
        }
    }
}
