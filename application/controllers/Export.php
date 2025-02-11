<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Export extends CI_Controller{
    public function __construct ()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper ('url');
    }
public function index () {
    $users = $this->user_model->getUsers();
    $this->load->view ('export', array('users' => $users));
}
public function data () {
$users = $this->user_model->getUsers();
if (count($users)>0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Phone');
        $row = 2;
        foreach($users as $user) {
            $sheet->setCellValue('A'.$row,$user->name);
            $sheet->setCellValue('B'.$row,$user->email);
            $sheet->setCellValue('C'.$row,$user->phone);
            $row++;
    } 
    $writer = new Xlsx($spreadsheet);
    $filename = "users_data";
    header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition:attachment;filename='.$filename.'.xlsx;');
				header('Cache-Control:max-age-0;');
				$writer->save('php://output');
    
}else {
        echo "No data to export";
    }
}
}



?>