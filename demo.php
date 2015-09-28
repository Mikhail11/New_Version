<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

// require_once( "fpdf/fpdf.php" );
  require("diag/diag.php");

// ГЉГ®Г­ГґГЁГЈГіГ°Г Г¶ГЁГї

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$blockColor = array(240, 237, 228);

$allCount = '5849';
$allCountName1 ='Общее';
$allCountName2 ='число';
$allCountName3 ='посетителей';
$allCountColor = array(32,126,177);
$allCountPosX = 15.069;
$allCountPosY = 74.083; 

$unCount = '26345';
$unCountName1 ='Количество';
$unCountName2 ='уникальных';
$unCountName3 ='посетителей';
$unCountColor = array(95,195,219);
$unCountPosX = 60.6 ;
$unCountPosY = 74.083;

$coverageCount = '1763209';
$coverageCountName1 ='Охваченная';
$coverageCountName2 ='аудитория';
$coverageCountName3 ='(человек)';
$coverageCountColor = array(204,14,81);
$coverageCountPosX = 133.677  ;
$coverageCountPosY = 138.356;
$coverageCellPosX =-51.069;
$coverageCellPosY = 140.356;
$coverageCellWidth = 37.042;
$coverageCellHeight = 6.416;

$birthCount = '45';
$birthCountName1 ='Количество';
$birthCountName2 ='поздравленных';
$birthCountName3 ='именинников';
$birthCountColor = array(32,126,177);
$birthCountPosX = 15.069 ;
$birthCountPosY = 200.433;

$birthAuthCount = '10';
$birthAuthCountName1 ='Количество';
$birthAuthCountName2 ='именинников';
$birthAuthCountName3 ='пришедших';
$birthAuthCountName4 ='в свой';
$birthAuthCountName5 ='День Рождения';
$birthAuthCountColor = array(204,14,81);
$birthAuthCountPosX = 60.6;
$birthAuthCountPosY = 200.433;

$footerOfficialPosX = 15 ;
$footerOfficialPosY = 259.185 ;
$footerOfficialWidth = 122.7 ;
$footerOfficialHeight = 5.295;
$footerOfficial1 = "Вопросы по отчету вы можете задать своему менеджеру.";
$footerOfficial2 = " Служба технической поддержки: support@respot.ru";

$footerFormalPosX = 15 ;
$footerFormalPosY = 273.185;
$footerFormalWidth = 100.7;
$footerFormalHeight = 5.295;
$footerFormal1 = "Спасибо за использование нашего сервиса!" ;
$footerFormal2 = " С любовью, Команда Respot!";

$countsTextSize = 39;

$reportName = "Ежемесячный отчет";
$reportSurName = "АВГУСТ 2015";
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

$labelsFontSize = 14;
$rowLabels = array( "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс");
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartLabel = "ПОДКЛЮЧЕНИЯ ПО ДНЯМ НЕДЕЛИ";
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


$pdf->Output( "report.pdf", "I" );

?>

