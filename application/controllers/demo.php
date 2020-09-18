if (isset($_FILES["file"]["name"])) {
$reportPath = 'uploads/';
$fileName = $_FILES['file']['name'];
$override = 'false';
$upload_ready = false;
$dirName = $reportPath . $_SESSION['userInfo']['user_id'];

$insertData = array(
'user_id' => $_SESSION['userInfo']['user_id'],
'Document_path' => $dirName . '/' . $fileName
);
if (!file_exists($dirName)) {
mkdir($dirName, 0755, true);
}
// if (!file_exists('./' . $BKPreportPath)) {
// mkdir('./' . $BKPreportPath, 0755, true);
// }


if (file_exists($dirName . '/' . $fileName)) {
$this->session->set_flashdata('success', 'File already exist.');
redirect($_POST['current_url']);
} else {
$upload_ready = true;
}
if ($upload_ready) {
$config['upload_path'] = './' . 'uploads/' . $_SESSION['userInfo']['user_id'];
$config['allowed_types'] = 'jpeg|jpg|png';
$config['max_size'] = '100000';
$config['file_name'] = $fileName;
$this->load->library('upload', $config);
if (!$this->upload->do_upload('file')) {
$this->session->set_flashdata("error", $this->upload->display_errors());
redirect($_POST['current_url']);
}
else{
$data = $this->upload->data();

$file_name=json_encode($insertData,true);