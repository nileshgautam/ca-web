<?php

use function PHPSTORM_META\override;

defined('BASEPATH') or exit('No direct script access allowed');

class BackendTeam extends CI_Controller
{
    var $UserDtl;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia

        if (!isset($_SESSION['userInfo']))           // On first entry re-direct to logi screen
        {

            redirect(base_url('Login/index'));
        } else {
            $this->UserDtl = $_SESSION['userInfo'];
        }
    }

    public function index()
    {
        $data['user_services'] = $this->CustomModel->getAllUserServices();
        // print_r( $data['user_services'] );die;
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('backend/backend', $data);
        $this->load->view('user/layout/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('userInfo');
        redirect("login");
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




    public function approveDocuments($services_id = null)
    {
        $data = json_decode(base64_decode($services_id), true);
        $services_id = base64_encode($data[0]);
        $userId = $data[1];
        $data['documents'] =  $this->getRequiredDocuments($services_id, $userId);
        $data['docService'] = $this->MainModel->selectAllFromWhere("user_services", array("user_id" => $userId, "service_id" => base64_decode($services_id)));
        $data['uploadwedDocs'] = $this->MainModel->selectAllFromWhere("uploaded_documents", array("user_id" => $userId));

        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('backend/user_documents', $data);
        $this->load->view('user/layout/footer');
    }

    public function getRequiredDocuments($services_id = null, $userId = null)
    {
        $data['services'] = $this->MainModel->getUserServices(base64_decode($services_id), $userId);
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


    public function helpdesk($services_id = null)
    {
        $result = $this->getTicketReplyMergeData();
        $data['tickets'] = isset($result) ? $result : 0;
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/help/helpdesk', $data);
        $this->load->view('user/layout/footer');
    }

    public function getTicketReplyMergeData()
    {
        $result = $this->MainModel->getAllTicketsWithUser();
        $result1 = $this->MainModel->getAllUserReplyTickets();
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
        return $result;
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
        $id = $_SESSION['userInfo']['user_id'];
        $data['user'] = $this->MainModel->selectAllFromTableOrderBy("users", 'id', 'ASC', array("user_id" => $id));
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/setting', $data);
        $this->load->view('user/layout/footer.php');
    }

    public function new_ticket($services_id = null)
    {
        $upload_ready = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST)) {


                // inserting details

                $subject = validateInput($_POST['subject']);
                $description = validateInput($_POST['description']);
                $tableName = 'helpdesk';

                //Creating array for database 
                $timestamp = date("Y-m-d H:i:s");

                $ticketId = $this->MainModel->getNewIDorNo('helpdesk', "TCI0-");

                $file_name = 'abcd';

                $query = array('customer_id' => $_SESSION['userInfo']['user_id'], 'ticket_id' => $ticketId, 'subject' => $subject, 'query' => $description, 'files' => $file_name, 'date_time' => $timestamp);

                // Inserting Helpdesk data into the database;
                $result = $this->MainModel->insertInto($tableName, $query);

                if ($result > 0) {
                    echo $response = json_encode(array('message' => 'Success! Ticket created', 'type' => 'success'), true);
                } else {
                    echo $response = json_encode(array('message' => 'Error! Opps... Contact IT', 'type' => 'danger'), true);
                }
            }
        }
    }

    public function acceptDocument()
    {
        if (isset($_POST['uId']) && isset($_POST['sId']) && isset($_POST['name'])) {
            $condition = array('user_id' => $_POST['uId'], 'service_id' => $_POST['sId'], 'document_name' => $_POST['name']);
            $result = $this->MainModel->updateWhere("uploaded_documents", array('status' => 'A'), $condition);
            if ($result) {
                echo json_encode(array('success', 'Document Accepted'));
            } else {
                echo json_encode(array('error', 'Document status could not be changed, Contact to IT'));
            }
        } else {
            echo json_encode(array('error', 'Insufficient information found contact to it'));
        }
    }

    public function rejectDocument()
    {
        if (isset($_POST['uId']) && isset($_POST['sId']) && isset($_POST['name']) && isset($_POST['reason']) && isset($_POST['mId'])) {
            $condition = array('user_id' => $_POST['uId'], 'service_id' => $_POST['sId'], 'document_name' => $_POST['name']);
            $condition1 = array('user_id' => $_POST['uId'], 'service_id' => $_POST['mId']);
            $data = array('status' => 'R', 'reason' => $_POST['reason']);
            $result = $this->MainModel->updateWhere("uploaded_documents", $data, $condition);
            $result1 = $this->MainModel->updateWhere("user_services", array('docSubmit' => 'false'), $condition1);
            if ($result && $result1) {
                echo json_encode(array('success', 'Document Rejected'));
            } else {
                echo json_encode(array('error', 'Document status could not be changed, Contact to IT'));
            }
        } else {
            echo json_encode(array('error', 'Insufficient information found contact to it'));
        }
    }

    public function sentReminderMail()
    {
        if (isset($_POST['email']) && isset($_POST['service'])) {
            $this->load->helper('email');
            $to = $_POST['email'];
            $sub = 'Upload Remaining Documents';
            $mess = 'Dear User' . ',' . '<br>' . 'Please upload document for your purchased service <b>"' . $_POST['service'] . '" </b> , so that we can complete further process for your service.';
            if (sentmail($to, $sub, $mess)) {
                echo json_encode(array('success', 'mail sent'));
            } else {
                echo json_encode(array('error', 'Message not sent to user, Try again later'));
            }
        } else {
            echo json_encode(array('error', 'Insufficient information found contact to it'));
        }
    }

    public function getAssignedUser()
    {
        $result = $this->MainModel->selectAllFromWhere("users", array('role' => 'Assigner'));
        if ($result) {
            echo json_encode(array('success', $result));
        }
    }

    public function sendAssignerMail()
    {
        if (isset($_POST['email']) && isset($_POST['uId']) && isset($_POST['sId'])) {
            $condition = array('user_id' => $_POST['uId'], 'main_service_id' => $_POST['sId']);
            $condition1 = array('user_id' => $_POST['uId'], 'service_id' => $_POST['sId']);
            $result = $this->MainModel->selectAllFromWhere("uploaded_documents", $condition);
            $result1 = $this->MainModel->updateWhere("user_services", array('assigned' => 'true'), $condition1);
            $assigner = $this->MainModel->selectAllFromWhere("users", array('email' => $_POST['email']));
            $service = $this->MainModel->selectAllFromWhere("services", array('serviceId' => $_POST['sId']));
            // echo "<pre>";print_r($result);die;
            $insertData = array(
                'assignerId' => $assigner[0]['user_id'],
                'serviceId' =>  $_POST['sId'],
                'userId' => $_POST['uId']
            );
            if ($result && $result1) {
                $this->load->helper('email');
                $to = $_POST['email'];
                $sub = 'Work Assigned';
                $mess = 'Dear Team Member' . ',' . '<br>' . 'Please find the user documents and complete further process for <b>"' .$service[0]['service_name'] .'"<b> service.';
                $inserted = $this->MainModel->insertInto('service_assign', $insertData);
                if ($inserted) {
                    if (sentmail($to, $sub, $mess, $result)) {
                        echo json_encode(array('success', 'mail sent'));
                    } else {
                        echo json_encode(array('error', 'Message not sent to user, Try again later'));
                    }
                }
            } else {
                echo json_encode(array('error', 'No data found, Contact to IT'));
            }
        } else {
            echo json_encode(array('error', 'Insufficient information found, contact to IT'));
        }
    }

    public function slotBook(){
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('backend/timeSlot');
        $this->load->view('user/layout/footer.php');
    }

    public function saveTimeSlot(){
        if(isset($_POST['fDate']) && isset($_POST['tDate']) && isset($_POST['fTime']) && isset($_POST['tTime'])){
            echo "<pre>";
            print_r($_POST);
            die;
        }else{
            $this->session->set_flashdata("error",  "Insuffiecient information found, Contact to IT");
                redirect(base_url('BackendTeam/slotBook')); 
        }
        
    }
}
