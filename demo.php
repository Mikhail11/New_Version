<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

require_once( "fpdf/fpdf.php" );

// Конфигурация

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$blockColor = array(240, 237, 228);
$allCount = '584';
$allCountName1 ='Общее';
$allCountName2 ='число';
$allCountName3 ='посетителей';
$allCountColor = array(32,126,177);
$allCountPosX = 15.069;
$allCountPosY = 74.083; 
$unCount = '26345';
$unCountName1 ='Количество';
$unCountName2 ='Уникальных';
$unCountName3 ='посетителей';
$unCountColor = array(95,195,219);
$unCountPosX = 66.6 ;
$unCountPosY = 74.083;
$countsTextSize = 43;
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
$chartXLabel = "Product";
$chartYLabel = "2009 Sales";
$chartYStep = 20000;

$chartColours = array(
                  array( 154, 214, 235 ),
                  array( 145, 80, 154 ),
                  array( 230, 25, 88 ),
                  array( 154, 214, 235 ),
                  array( 145, 80, 154 ),
                  array( 230, 25, 88 ),
                  array( 154, 214, 235 )
                );

$data = array(
          array( 9940, 10100, 9490, 11730 ),
          array( 19310, 21140, 20560, 22590 ),
          array( 25110, 26260, 25210, 28370 ),
          array( 27650, 24550, 30040, 31980 ),
        );

// РљРѕРЅРµС† РєРѕРЅС„РёРіСѓСЂР°С†РёРё




$pdf = new FPDF( 'P', 'mm', 'A4' );
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


$pdf->Output( "report.pdf", "I" );

?>

