<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\helpers\Url;
use backend\controllers\MemberController;

$baseUrl = str_replace('/admin', '', Url::base(true));
// Create new Spreadsheet object
$formatter = \Yii::$app->formatter;
$spreadsheet = new Spreadsheet();

// Set active sheet
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();

$header_row = array(
    'fill' => array(
        'fillType' => Fill::FILL_SOLID,
        'startColor' => array('rgb' => 'cccccc' )
    ),
    'font' => array(
        'color' => array('rgb' => '000000'),
    )
);


$row_sheet = 1;

$arrayHeader = ['User Email','User Firstname','User Lastname','User Telephone','User Age','User Career','User Location','User Company','User Address Tax','User Tax ID','User Address','User Building','User Moo','User District','User Amphur','User Province','User Postal Code','User Customer','Created Date'];

$sheet->fromArray(
    $arrayHeader, // The data to set
    NULL, // Array values with this value will not be set
    'A'.$row_sheet // Top left coordinate of the worksheet range where
//  we want to set these values (default is A1)
);
$sheet->getStyle('A'.$row_sheet.':'.'S'.$row_sheet)->applyFromArray($header_row);

$row_sheet++;
foreach($dataExcel as $data){


    $data->user_district = MemberController::convert('\common\models\Districts','name_'.Yii::$app->language,'id',$data->user_district);
    $data->user_amphur = MemberController::convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$data->user_amphur);
    $data->user_province = MemberController::convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$data->user_province);

    $sheet->setCellValue("A".$row_sheet, $data->user_email);
    $sheet->setCellValue("B".$row_sheet, $data->user_firstname);
    $sheet->setCellValue("C".$row_sheet, $data->user_lastname);
    $sheet->setCellValue("D".$row_sheet, $data->user_telephone);
    $sheet->setCellValue("E".$row_sheet, $data->user_age);
    $sheet->setCellValue("F".$row_sheet, $data->user_career);
    $sheet->setCellValue("G".$row_sheet, $data->user_location);
    $sheet->setCellValue("H".$row_sheet, $data->user_company);
    $sheet->setCellValue("I".$row_sheet, $data->user_address_tax);
    $sheet->setCellValue("J".$row_sheet, $data->user_tax_id);
    $sheet->setCellValue("K".$row_sheet, $data->user_address);
    $sheet->setCellValue("L".$row_sheet, $data->user_building);
    $sheet->setCellValue("M".$row_sheet, $data->user_moo);
    $sheet->setCellValue("N".$row_sheet, $data->user_district);
    $sheet->setCellValue("O".$row_sheet, $data->user_amphur);
    $sheet->setCellValue("P".$row_sheet, $data->user_province);
    $sheet->setCellValue("Q".$row_sheet, $data->user_postal_code);
    $sheet->setCellValue("R".$row_sheet, $data->user_customer);
    $sheet->setCellValue("S".$row_sheet, date('d/m/Y', strtotime($data->created_date)));

    $row_sheet++;

}

foreach ($sheet->getColumnIterator() as $column) {
    $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
}


// Rename worksheet
$sheet->setTitle('Report Member');

$fileName = "report_member_".date("Y_m_d")."_".date("His").'.xlsx';
// $path = '../web/files/';

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fileName.'" ');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save("php://output");
// exit();

ob_start();
$writer->save("php://output");
$xlsData = ob_get_contents();

ob_end_clean();
$response =  array(
    'status' => $status,
    'result' => $result,
    'op' => 'ok',
    'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($xlsData),
    'filename' => $fileName
);
die(json_encode($response));