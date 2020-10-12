<?php 
 function uploadFile($FILES)
 {
    $CI = &get_instance();
     // my_print($_SESSION['userInfo']);
     // my_print($_POST);
    //  my_print($FILES);die;
     // my_print($_POST["redirectUrl"]);



     if (isset($FILES['sideImage']["name"])) {
         $reportPath = 'uploads/';
         $fileName = $FILES['sideImage']['name'];
         $override = 'false';
         $upload_ready = false;
         $dirName = './' . 'adminAssets/img/';
       
         if (!file_exists($dirName)) {
             mkdir($dirName, 0755, true);
         }
         


         if (file_exists($dirName . '/' . $fileName)) {
             $override = 'true';
             if ($override == 'true') {
                 $fileName = date("Ymd_His").$fileName;
                 $insertData['Document_path'] = $dirName . '/' .  $fileName;
                 $upload_ready = true;
             }
         } else {
             $upload_ready = true;
         }

         if ($upload_ready) {
             $config['upload_path'] = './' . 'adminAssets/img/';
             $config['allowed_types'] = 'jpeg|jpg|png';
             $config['max_size'] = '100000';
             $config['file_name'] = $fileName;
             $config['remove_spaces'] = FALSE;
             $CI->load->library('upload', $config);
             if (!$CI->upload->do_upload('sideImage')) {
                return array("error",  $CI->upload->display_errors());
                 
             } else {
                //  $validate = $CI->MainModel->selectAllFromWhere("uploaded_documents", array("user_id" => $insertData['user_id'], "service_id" => $insertData['service_id'], 'Document_path' => $insertData['Document_path']));
                //  if (!$validate) {
                     $data = $CI->upload->data();
                     
                     return array("success",  $fileName);
                     
                    
                //  }
             }
         }
     } else {
        return array("success",  "Insufficient Information sent.");
        
     }
 }
