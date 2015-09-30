<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

// require_once( "fpdf/fpdf.php" );
  require("diag/diag.php");
  require 'includes/core/db_config.php';
  require 'includes/core/DBWiFiInterface.php';

  $database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

// Êîíôèãóðàöèÿ

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$blockColor = array(240, 237, 228);

$allCount = '55849';
$allCountName1 ='�����';
$allCountName2 ='����������';
$allCountName3 ='�����������';
$allCountColor = array(32,126,177);
$allCountPosX = 15.069;
$allCountPosY = 74.083; 

$unCount = '26345';
$unCountName1 ='����������';
$unCountName2 ='����������';
$unCountName3 ='�����������';
$unCountColor = array(95,195,219);
$unCountPosX = 60.6 ;
$unCountPosY = 74.083;

$coverageCount = '1763209';
$coverageCountName1 ='����������';
$coverageCountName2 ='���������';
$coverageCountName3 ='(�������)';
$coverageCountColor = array(204,14,81);
$coverageCountPosX = 133.677  ;
$coverageCountPosY = 138.356;
$coverageCellPosX =-51.069;
$coverageCellPosY = 140.356;
$coverageCellWidth = 37.042;
$coverageCellHeight = 6.416;

$birthCount = '45';
$birthCountName1 ='����������';
$birthCountName2 ='�������������';
$birthCountName3 ='�����������';
$birthCountColor = array(32,126,177);
$birthCountPosX = 15.069 ;
$birthCountPosY = 200.433;

$birthAuthCount = '10';
$birthAuthCountName1 ='����������';
$birthAuthCountName2 ='�����������';
$birthAuthCountName3 ='���������';
$birthAuthCountName4 ='� ����';
$birthAuthCountName5 ='���� ��������';
$birthAuthCountColor = array(204,14,81);
$birthAuthCountPosX = 60.6;
$birthAuthCountPosY = 200.433;

$footerOfficialPosX = 15 ;
$footerOfficialPosY = 259.185 ;
$footerOfficialWidth = 122.7 ;
$footerOfficialHeight = 5.295;
$footerOfficial1 = "������� �� ������ �� ������ ������ ������ ���������.";
$footerOfficial2 = " ������ ����������� ���������: support@respot.ru";

$footerFormalPosX = 15 ;
$footerFormalPosY = 273.185;
$footerFormalWidth = 100.7;
$footerFormalHeight = 5.295;
$footerFormal1 = "������� �� ������������� ������ �������!" ;
$footerFormal2 = " � �������, ������� Respot!";

$countsTextSize = 39;

$reportName = "����������� �����";
$reportSurName = "������ 2015";
$reportNameYPos = 31.275;
$reportNameXPos = 15.069;
$reportSurNameYPos = 36.275;

$QRCodeFile = "images/qr-code.gif";
$QRCodeXPos = 165.141 ;
$QRCodeYPos = 15.380;
$QRCodeWidth = 32.53;
$QRCodeHeight = 32.53;

$logoFile = "images/logo-black.png";
$logoXPos = 15.069;
$logoYPos = 19.403;
$logoWidth = 34.558;
$logoHeight = 5.983;

$LabelXPos = 60.754;
$LabelYPos = 130.628;
$LabelWidth = 4;
$LabelHeight = 4;

$LabelXPosVK = 60.754;
$LabelYPosVK = 130.628;
$LabelWidthVK = 3;
$LabelHeightVK = 3.76;

$LabelXPosFB = 60.754;
$LabelYPosFB = 136.628;
$LabelWidthFB = 2.56;
$LabelHeightFB = 4.92;

$LabelXPosOK = 60.754;
$LabelYPosOK = 143.628;
$LabelWidthOK = 3.38;
$LabelHeightOK = 5.66;

$LabelXPosMB = 60.754;
$LabelYPosMB = 152.628;
$LabelWidthMB = 5.07;
$LabelHeightMB = 1.74;

$LabelXPosTW = 60.754;
$LabelYPosTW = 158.35;
$LabelWidthTW = 4.28;
$LabelHeightTW = 3.48;

$labelsFontSize = 14;
$rowLabels = array( "��", "��", "��", "��", "��", "��", "��");
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartLabel = "����������� �� ���� ������";
$diagramLabel = "����������� �� ���. �����";
$genderAgeDiagramsLabel = "����������� �������������� ������";
$chartYStep = 20000;






$pdf = new PDF_Diag('P', 'mm', 'A4' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->AddPage();
$pdf->AddFont('PT_Sans-Web-Regular','');

$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth, $logoHeight );

$pdf->SetFont( 'PT_Sans-Web-Regular', '', 12 );
$pdf->Text( $reportNameXPos, $reportNameYPos, $reportName);
$pdf->Text( $reportNameXPos, $reportSurNameYPos, $reportSurName);
$pdf->Image( $QRCodeFile, $QRCodeXPos, $QRCodeYPos, $QRCodeWidth, $QRCodeHeight );


$pdf->SetFillColor($blockColor[0],$blockColor[1],$blockColor[2]);
$pdf->Ln(45);
$pdf->Rect(0,50,254,63.322,'F');
$pdf->Rect(0,177.794,254,63.322,'F');
$pdf->AddFont('Roboto-Black','');


$pdf->SetTextColor($allCountColor[0],$allCountColor[1],$allCountColor[2]);
$pdf->SetFont( 'Roboto-Black', '', $countsTextSize);
$pdf->Text( $allCountPosX, $allCountPosY, $allCount);
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize );
$pdf->Text( $allCountPosX, $allCountPosY+6, $allCountName1);
$pdf->Text( $allCountPosX, $allCountPosY+12, $allCountName2);
$pdf->Text( $allCountPosX, $allCountPosY+18, $allCountName3);


$pdf->SetTextColor($unCountColor[0],$unCountColor[1],$unCountColor[2]);
$pdf->SetFont( 'Roboto-Black', '', $countsTextSize);
$pdf->Text( $unCountPosX, $unCountPosY, $unCount);
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize );
$pdf->Text( $unCountPosX, $unCountPosY+6, $unCountName1);
$pdf->Text( $unCountPosX, $unCountPosY+12, $unCountName2);
$pdf->Text( $unCountPosX, $unCountPosY+18, $unCountName3);


$pdf->SetTextColor($coverageCountColor[0],$coverageCountColor[1],$coverageCountColor[2]);
$pdf->SetFont( 'Roboto-Black', '', $countsTextSize);
$pdf->Text( $coverageCountPosX, $coverageCountPosY, $coverageCount);
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize );
$pdf->Text( $coverageCountPosX, $coverageCountPosY+6, $coverageCountName1);
$pdf->Text( $coverageCountPosX, $coverageCountPosY+12, $coverageCountName2);
$pdf->Text( $coverageCountPosX, $coverageCountPosY+18, $coverageCountName3);


$pdf->SetTextColor($birthCountColor[0],$birthCountColor[1],$birthCountColor[2]);
$pdf->SetFont( 'Roboto-Black', '', $countsTextSize);
$pdf->Text( $birthCountPosX, $birthCountPosY, $birthCount);
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize );
$pdf->Text( $birthCountPosX, $birthCountPosY+6, $birthCountName1);
$pdf->Text( $birthCountPosX, $birthCountPosY+12, $birthCountName2);
$pdf->Text( $birthCountPosX, $birthCountPosY+18, $birthCountName3);

$pdf->SetTextColor($birthAuthCountColor[0],$birthAuthCountColor[1],$birthAuthCountColor[2]);
$pdf->SetFont( 'Roboto-Black', '', $countsTextSize);
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY, $birthAuthCount);
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize );
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY+6, $birthAuthCountName1);
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY+12, $birthAuthCountName2);
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY+18, $birthAuthCountName3);
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY+24, $birthAuthCountName4);
$pdf->Text( $birthAuthCountPosX, $birthAuthCountPosY+30, $birthAuthCountName5);

$pdf->AddFont('PT_Sans-Web-Italic','');

$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize-2);
$pdf->Text( $footerOfficialPosX, $footerOfficialPosY, $footerOfficial1);
$pdf->Text( $footerOfficialPosX-1, $footerOfficialPosY+5, $footerOfficial2);

$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'PT_Sans-Web-Italic', '', $labelsFontSize-2);
$pdf->Text( $footerFormalPosX, $footerFormalPosY, $footerFormal1);
$pdf->Text( $footerFormalPosX-1, $footerFormalPosY+5, $footerFormal2);

$data[0] = array(3, 6, 2,3, 12,26, 23);

$pdf->AddFont('PT_Sans-Web-Bold','');
// Column chart
$pdf->SetFont('PT_Sans-Web-Bold', '', 12);
$pdf->SetX(43.606);
$pdf->Cell(210, 5, $chartLabel, 0, 1, 'C');
$pdf->Ln(8);
$pdf->SetXY(119.306,63.501 );
$pdf->ColumnChart(80, 40, $data, null, array(255,175,100));

$pdf->SetFont('PT_Sans-Web-Bold', '', 12);
$pdf->Text(15.069,119.628, $diagramLabel);
$pdf->Ln(8);
$socialNetworks = array('vk'=>58,'facebook'=>42,'odnoklassniki'=>29,'mobile'=>10,'twitter'=>3);
$pdf->SetXY(15.069,130.628);
$col1=array(32,126,177);
$col2=array(95,195,219);
$col3=array(231,230,175);
$col4=array(204,14,81);
$col5=array(145,80,154);
$pdf->PieChart(100, 35, $socialNetworks, '%v %p', array($col1, $col2, $col3,$col4,$col5));

$pdf->Image( 'images/vk.png', $LabelXPosVK, $LabelYPosVK, $LabelWidthVK, $LabelHeightVK );
$pdf->Image( 'images/facebook.png', $LabelXPosFB, $LabelYPosFB, $LabelWidthFB, $LabelHeightFB );
$pdf->Image( 'images/odnoklassniki.png', $LabelXPosOK, $LabelYPosOK, $LabelWidthOK, $LabelHeightOK );
$pdf->Image( 'images/mobile.png', $LabelXPosMB, $LabelYPosMB, $LabelWidthMB, $LabelHeightMB );
$pdf->Image( 'images/twitter.png', $LabelXPosTW, $LabelYPosTW, $LabelWidthTW, $LabelHeightTW );

foreach ($socialNetworks as $key => $value) {

  $pdf->SetFont( 'PT_Sans-Web-Regular', '', $labelsFontSize);
  $pdf->SetTextColor(0,0,0);
  $pdf->Text($LabelXPos+10,$LabelYPos+3.5,$value);
  $pdf->SetTextColor(175,175,175);
  $pdf->Text($LabelXPos+22,$LabelYPos+3.5,$value.'%');
  $LabelYPos+=7;
}

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 12);
$pdf->Text(114.606,185.433, $genderAgeDiagramsLabel);
$pdf->Ln(8);
 
$men = array(32,126,177); 
$women = array(204,14,81);
$other = array($blockColor[0],$blockColor[1],$blockColor[2]);

$age18 = array('women'=>22,'men'=>18,'other'=>200);
$age18_27 = array('women'=>44,'men'=>36,'other'=>120);
$age28_35 = array('women'=>18,'men'=>32,'other'=>150);
$age36_55 = array('women'=>8,'men'=>12,'other'=>180);
$age55 = array('women'=>2,'men'=>8,'other'=>190);

$pdf->SetXY(104.606,190.433);
$pdf->PieChart(48,25, $age18, '%v %p', array($women,$men,$other));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 10);
$pdf->Text(111.606,218.433, '�� 18');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(111.606,223.433, '20%');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(111.606,227.433, '40 ���.');


$pdf->SetXY(124.606,190.433);
$pdf->PieChart(48,25, $age18_27, '%v %p', array($women,$men,$other));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 10);
$pdf->Text(131.606,218.433, '18-27');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(131.606,223.433, '40%');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(131.606,227.433, '80 ���.');


$pdf->SetXY(144.606,190.433);
$pdf->PieChart(48,25, $age28_35, '%v %p', array($women,$men,$other));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 10);
$pdf->Text(151.606,218.433, '28-35');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(151.606,223.433, '25%');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(151.606,227.433, '50 ���.');


$pdf->SetXY(164.606,190.433);
$pdf->PieChart(48,25, $age36_55, '%v %p', array($women,$men,$other));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 10);
$pdf->Text(171.606,218.433, '36-55');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(171.606,223.433, '10%');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(171.606,227.433, '20 ���.');


$pdf->SetXY(184.606,190.433);
$pdf->PieChart(48,25, $age55, '%v %p', array($women,$men,$other));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('PT_Sans-Web-Bold', '', 10);
$pdf->Text(191.606,218.433, '�� 55');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(191.606,223.433, '5%');
$pdf->SetFont('PT_Sans-Web-Regular', '', 10);
$pdf->Text(191.606,227.433, '10 ���.');





$pdf->Output( "respot.pdf", "I" );

?>

