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
        for ($i = 0; $i < count($data['user_services']); $i++) {
            $sId = $data['user_services'][$i]['service_id'];
            $result = $this->MainModel->selectAllFromWhere("services", array("serviceId" => $sId));
            array_push($data['services'], array_merge($data['user_services'][$i], $result[0]));
        }
        $data['fLogin'] = $_SESSION['userInfo']['fLogin'];
        
        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/user-dashboard', $data);
        $this->load->view('user/layout/footer');
    }

    public function uploadFile()
    {
        // my_print($_SESSION['userInfo']);
        // my_print($_POST);
        // my_print($_FILES);
        // my_print($_POST["redirectUrl"]);



        if (isset($_FILES["file"]["name"]) && isset($_POST["service_id"])) {
            $reportPath = 'uploads/';
            $fileName = $_FILES['file']['name'];
            $override = 'false';
            $upload_ready = false;
            $dirName = $reportPath . $_SESSION['userInfo']['user_id'];

            $insertData = array(
                'user_id' => $_SESSION['userInfo']['user_id'],
                'service_id' => validateInput($_POST['service_id']),
                'document_name' => validateInput($_POST['document_name']),
                'Document_path' => $dirName . '/' . $fileName
            );
            if (!file_exists($dirName)) {
                mkdir($dirName, 0755, true);
            }
            // if (!file_exists('./' . $BKPreportPath)) {
            //     mkdir('./' . $BKPreportPath, 0755, true);
            // }


            if (file_exists($dirName . '/' . $fileName)) {
                $override = 'true';
                if ($override == 'true') {
                    $fileName = date("Ymd_His") . $_FILES['file']['name'];
                    $insertData['Document_path'] = $dirName . '/' .  $fileName;
                    $upload_ready = true;
                } //else {
                // $this->session->set_flashdata('success', 'File already exist.');
                // redirect($_POST['current_url']);
                // echo json_encode(array('success' => true, "file_exist" => true, 'message' =>  "File already exist."));
                // }
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
                    //     echo $this->upload->display_errors();
                    // echo json_encode(array('success' => false, 'message' =>  $this->upload->display_errors()));
                } else {
                    $validate = $this->MainModel->selectAllFromWhere("uploaded_documents", array("user_id" => $insertData['user_id'], "service_id" => $insertData['service_id'], 'Document_path' => $insertData['Document_path']));
                    if (!$validate) {
                        $data = $this->upload->data();
                        $result = $this->MainModel->insertInto('uploaded_documents', $insertData);
                        $this->session->set_flashdata("success",  "Uploaded successfully.");
                        redirect($_POST['current_url']);
                        // if ($result) {
                        //     echo json_encode(array('success', 'Package successfully added'));
                        // } else {
                        //     echo json_encode(array('error', 'Package could not be add, Contact to IT'));
                        // }
                    } //else {
                    //     echo json_encode(array('error', 'Selected service Already have packages'));
                    // }

                    //  echo json_encode(array('success' => true, 'message' =>  "Uploaded successfully."));
                }
            }
        } else {
            $this->session->set_flashdata("success",  "Insufficient Information sent.");
            redirect($_POST['current_url']);
            // echo json_encode(array('success' => false, 'message' =>  "Insufficient Information sent."));
        }
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
                $this->session->set_flashdata("success",  "Password changed Successfully");
                redirect(base_url('User/index'));
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
        // print_r($data['documents']);die;
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
        $condition = array('customer_id' => $_SESSION['userInfo']['user_id']);
        $tableName = 'helpdesk';
        $result = $this->MainModel->selectAllFromTableOrderBy($tableName, 'date_time', 'DESC', $condition);
        $data['tickets'] = isset($result) ? $result : 0;


        $this->load->view('user/layout/header');
        $this->load->view('user/layout/sidenav');
        $this->load->view('user/help/helpdesk', $data);
        $this->load->view('user/layout/footer');
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
        $id = $_SESSION['userInfo']['user_id'];
        $data['user'] = $this->MainModel->selectAllFromTableOrderBy("users", 'id', 'ASC', array("user_id" => $id));
        $this->load->view('user/layout/header.php');
        $this->load->view('user/layout/sidenav.php');
        $this->load->view('user/setting',$data);
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
}
