<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use yii\helpers\Url;
use backend\controllers\QuotationController;

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

$arrayHeader = ['Quotation Type','Quotation Code','Quotation Firstname','Quotation Lastname','Quotation Email','Quotation Telephone','Quotation Company','Quotation Tax ID','Quotation Address','Quotation Building','Quotation Moo','Quotation District','Quotation Amphur','Quotation Province','Quotation Postal Code','Quotation Project Category ID','Quotation Product Name','Quotation Delivery Type','Quotation Delivery Firstname','Quotation Delivery Lastname','Quotation Delivery Telephone','Quotation Delivery Address','Quotation Delivery Building','Quotation Delivery Moo','Quotation Delivery District','Quotation Delivery Amphur','Quotation Delivery Province','Quotation Delivery Postal Code','Quotation Delivery Note','Created Date'];

$sheet->fromArray(
    $arrayHeader, // The data to set
    NULL, // Array values with this value will not be set
    'A'.$row_sheet // Top left coordinate of the worksheet range where
//  we want to set these values (default is A1)
);
$sheet->getStyle('A'.$row_sheet.':'.'AD'.$row_sheet)->applyFromArray($header_row);

$row_sheet++;
foreach($dataExcel as $data){


    $data->quotation_district = QuotationController::convert('\common\models\Districts','name_'.Yii::$app->language,'id',$data->quotation_district);
    $data->quotation_amphur = QuotationController::convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$data->quotation_amphur);
    $data->quotation_province = QuotationController::convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$data->quotation_province);

    $data->quotation_delivery_tax_district = QuotationController::convert('\common\models\Districts','name_'.Yii::$app->language,'id',$data->quotation_delivery_tax_district);
    $data->quotation_delivery_tax_amphur = QuotationController::convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$data->quotation_delivery_tax_amphur);
    $data->quotation_delivery_tax_province = QuotationController::convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$data->quotation_delivery_tax_province);

    $data->quotation_delivery_other_district = QuotationController::convert('\common\models\Districts','name_'.Yii::$app->language,'id',$data->quotation_delivery_other_district);
    $data->quotation_delivery_other_amphur = QuotationController::convert('\common\models\Amphures','name_'.Yii::$app->language,'id',$data->quotation_delivery_other_amphur);
    $data->quotation_delivery_other_province = QuotationController::convert('\common\models\Provinces','name_'.Yii::$app->language,'id',$data->quotation_delivery_other_province);

    $data->quotation_project_category_id = QuotationController::convert('\common\models\ProjectCategory','project_category_name_'.Yii::$app->language,'project_category_id',$data->quotation_project_category_id);
    $FILE = '';

    if(!empty($data->quotation_product_image)){
        $FILE = $baseUrl.'/uploads/'.$data->quotation_product_image_path.'/'.$data->quotation_product_image;
    }

    $QuotationProductMapping = \common\models\QuotationProductMapping::findAll(['quotation_id' => $data->quotation_id]);
    $QuotationProduct = array();
    foreach ($QuotationProductMapping as $key => $value) {

        $product_name = 'product_name_'.Yii::$app->language;
        $Product = \common\models\Product::findOne(['product_id' => $value->product_id]);
        $QuotationProduct[] = $Product->$product_name;

    }
    $QuotationProduct = implode(',', $QuotationProduct);


    switch ($data->quotation_delivery_type) {
        case 1:
            $quotation_delivery_type = Yii::t('app', 'txt_pick_up_branch');
            $quotation_delivery_firstname = '';
            $quotation_delivery_lastname = '';
            $quotation_delivery_telephone = '';
            $quotation_delivery_address = $data->quotation_address;
            $quotation_delivery_building = $data->quotation_building;
            $quotation_delivery_moo = $data->quotation_moo;
            $quotation_delivery_district = $data->quotation_district;
            $quotation_delivery_amphur = $data->quotation_amphur;
            $quotation_delivery_province = $data->quotation_province;
            $quotation_delivery_postal_code = $data->quotation_postal_code;
            $quotation_delivery_note = '';
            break;
        case 2:
            $quotation_delivery_type = Yii::t('app', 'txt_delivery_destination');
            $quotation_delivery_firstname = '';
            $quotation_delivery_lastname = '';
            $quotation_delivery_telephone = '';
            $quotation_delivery_address = $data->quotation_delivery_tax_address;
            $quotation_delivery_building = $data->quotation_delivery_tax_building;
            $quotation_delivery_moo = $data->quotation_delivery_tax_moo;
            $quotation_delivery_district = $data->quotation_delivery_tax_district;
            $quotation_delivery_amphur = $data->quotation_delivery_tax_amphur;
            $quotation_delivery_province = $data->quotation_delivery_tax_province;
            $quotation_delivery_postal_code = $data->quotation_delivery_tax_postal_code;
            $quotation_delivery_note = '';
            break;
        case 3:
            $quotation_delivery_type = Yii::t('app', 'txt_same_address_other');
            $quotation_delivery_firstname = $data->quotation_delivery_other_firstname;
            $quotation_delivery_lastname = $data->quotation_delivery_other_lastname;
            $quotation_delivery_telephone = $data->quotation_delivery_other_telephone;
            $quotation_delivery_address = $data->quotation_delivery_other_address;
            $quotation_delivery_building = $data->quotation_delivery_other_building;
            $quotation_delivery_moo = $data->quotation_delivery_other_moo;
            $quotation_delivery_district = $data->quotation_delivery_other_district;
            $quotation_delivery_amphur = $data->quotation_delivery_other_amphur;
            $quotation_delivery_province = $data->quotation_delivery_other_province;
            $quotation_delivery_postal_code = $data->quotation_delivery_other_postal_code;
            $quotation_delivery_note = $data->quotation_delivery_other_note;
            break;
    }

    $sheet->setCellValue("A".$row_sheet, $data->quotation_type);
    $sheet->setCellValue("B".$row_sheet, $data->quotation_code);
    $sheet->setCellValue("C".$row_sheet, $data->quotation_firstname);
    $sheet->setCellValue("D".$row_sheet, $data->quotation_lastname);
    $sheet->setCellValue("E".$row_sheet, $data->quotation_email);
    $sheet->setCellValue("F".$row_sheet, $data->quotation_telephone);
    $sheet->setCellValue("G".$row_sheet, $data->quotation_company);
    $sheet->setCellValue("H".$row_sheet, $data->quotation_tax_id);
    $sheet->setCellValue("I".$row_sheet, $data->quotation_address);
    $sheet->setCellValue("J".$row_sheet, $data->quotation_building);
    $sheet->setCellValue("K".$row_sheet, $data->quotation_moo);
    $sheet->setCellValue("L".$row_sheet, $data->quotation_district);
    $sheet->setCellValue("M".$row_sheet, $data->quotation_amphur);
    $sheet->setCellValue("N".$row_sheet, $data->quotation_province);
    $sheet->setCellValue("O".$row_sheet, $data->quotation_postal_code);
    $sheet->setCellValue("P".$row_sheet, $data->quotation_project_category_id);
    $sheet->setCellValue("Q".$row_sheet, $QuotationProduct);
    $sheet->setCellValue("R".$row_sheet, $quotation_delivery_type);
    $sheet->setCellValue("S".$row_sheet, $quotation_delivery_firstname);
    $sheet->setCellValue("T".$row_sheet, $quotation_delivery_lastname);
    $sheet->setCellValue("U".$row_sheet, $quotation_delivery_telephone);
    $sheet->setCellValue("V".$row_sheet, $quotation_delivery_address);
    $sheet->setCellValue("W".$row_sheet, $quotation_delivery_building);
    $sheet->setCellValue("X".$row_sheet, $quotation_delivery_moo);
    $sheet->setCellValue("Y".$row_sheet, $quotation_delivery_district);
    $sheet->setCellValue("Z".$row_sheet, $quotation_delivery_amphur);
    $sheet->setCellValue("AA".$row_sheet, $quotation_delivery_province);
    $sheet->setCellValue("AB".$row_sheet, $quotation_delivery_postal_code);
    $sheet->setCellValue("AC".$row_sheet, $quotation_delivery_note);
    $sheet->setCellValue("AD".$row_sheet, date('d/m/Y', strtotime($data->created_date)));

    $row_sheet++;

}

foreach ($sheet->getColumnIterator() as $column) {
    $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
}


// Rename worksheet
$sheet->setTitle('Report quotation');

$fileName = "report_quotation_".date("Y_m_d")."_".date("His").'.xlsx';
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