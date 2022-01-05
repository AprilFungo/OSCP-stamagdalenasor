<?php
session_start();
require_once('../database/connection.php');
date_default_timezone_set('Asia/Manila');
//$pdf->Cell(width, height, text, border, position-next-cell, alignment);
if(!empty($_POST['appid']))
{
    require('../admin/pdf/fpdf.php');
    $pdf = new FPDF('P','mm','Letter');
    $pdf->AddPage();    
    $pdf->SetAutoPageBreak(false);   
    $pdf->SetFont('Arial', '', 12);

    $id = $_POST["appid"];  

    $r = @mysqli_query($dbc, "SELECT * from tbl_applications where clm_id = '$id'");
    $row = @mysqli_fetch_array($r);


    $pdf->Image('../admin/pdf/src/dswd_logo_new.png', 80, 10, 50, 10);
    $pdf->Cell(0,25,"SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS ",0,1,'C');
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(0,-15,"SORSOGON CITY ",0,1,'C');
    $pdf->Cell(0,25,"MUNICIPALIT OF STA. MAGDALENA",0,1,'C');
    $pdf->SetFont('Arial', 'B', 12);
    if ($row['clm_status'] == 2)
    {
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(0,-15,"APPROVED ",0,1,'C');
    }
    else if ($row['clm_status'] == 3)
    {
        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(0,-10,"CANCELLED ",0,1,'C');
    }
    else if ($row['clm_status'] == 1)
    {
        $pdf->SetTextColor(0,0,255);
        $pdf->Cell(0,-10,"PENDING ",0,1,'C');
    }
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0,30,"GENERAL INTAKE SHEET",0,1,'C');

    $pdf->Cell(1,15,'I. IDENTIFYING INFORMATION',0);

    $pdf->Cell(15,40,'NAME:',0);
    $pdf->Cell(1,40,'________________________________________',0);
    $pdf->Cell(100,40,$row['clm_name'], 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(30,40,'CITIZENSHIP:',0);
    $pdf->Cell(1,40,'_______________',0);
    $pdf->Cell(1,40,$row['clm_citizenship'], 0);
    $pdf->Ln();

    $pdf->Cell(45,-25,'PRESENT ADDRESS:',0);
    $pdf->Cell(1,-25,'________________________________________________',0);
    $pdf->Cell(1,-25,$row['clm_address'], 0);
    $pdf->Ln();

    $pdf->Cell(11,40,'AGE:',0);
    $pdf->Cell(5,40,'________',0);
    $pdf->Cell(18,40,$row['clm_age'], 0);

    $pdf->Cell(11,40,'SEX:',0);
    $pdf->Cell(5,40,'________',0);
    $pdf->Cell(18,40,$row['clm_sex'], 0);

    $pdf->Cell(30,40,'CIVIL STATUS:',0);
    $pdf->Cell(2,40,'_________',0);
    $pdf->Cell(25,40,$row['clm_civil_status'], 0);

    $pdf->Cell(22,40,'RELIGION:',0);
    $pdf->Cell(2,40,'______________',0);
    $pdf->Cell(18,40,$row['clm_religion'], 0);
    $pdf->Ln();

    $pdf->Cell(27,-24,'BIRTH DATE:',0);
    $pdf->Cell(1,-24,'_____________',0);
    $pdf->Cell(35,-24,$row['clm_bday'], 0);

    $pdf->Cell(30,-24,'BIRTH PLACE:',0);
    $pdf->Cell(1,-24,'_____________',0);
    $pdf->Cell(18,-24,$row['clm_bday'], 0);
    $pdf->Ln();

    $pdf->Cell(60,38,'EDUCATIONAL ATTAINMENT:',0);
    $pdf->Cell(2,38,'______________________________',0);
    $pdf->Cell(35,38,$row['clm_education'], 0);
    $pdf->Ln();

    $pdf->Cell(40,-10,'AFFILLATION/GROUP:',0);

    $check1 ="";
    $check2 ="";
    $check3 ="";
    $check4 ="";
    $check5 ="";
    if($row['clm_listahanan'] == 1)
    {
        $check1 = "4";
    }
    else if($row['clm_pantawid'] == 1)
    {
        $check2 = "4";
    }
    else if($row['clm_indigenous_people'] == 1)
    {
        $check3 = "4";
    }
    else if($row['clm_senior_organization'] == 1)
    {
        $check4 = "4";
    }
    else if($row['clm_others'] == 1)
    {
        $check5 = "4";
    }


    $pdf->SetX(50);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $check1, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(30,6,'LISTAHANAN',0);
    $pdf->Cell(73,6,'(Please specify house hold number)  _____________',0);
    $pdf->Cell(60,6,$row['clm_household_number'],0);
    $pdf->Ln();


    $pdf->SetX(50);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $check2, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60,6,'PANTAWID BENEFICIARY',0);
    $pdf->SetX(120);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $check4, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60,6,'SENIOR CITIZEN ORG',0);
    $pdf->Ln();

    $pdf->SetX(50);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $check3, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50,6,'INDIGENOUS PEOPLE',0);
    $pdf->Cell(73,6,'(Please specify)  _______________',0);
    $pdf->Cell(60,6,$row['clm_please_specify'],0);
    $pdf->Ln();

    $pdf->SetX(50);
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(5, 5, $check5, 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(20,6,'OTHERS',0);
    $pdf->Cell(73,6,'(Please specify)  __________________________',0);
    $pdf->Cell(60,6,$row['clm_other_specify'],0);
    $pdf->Ln();

    $pdf->Cell(70,10,'ID NUMBER:',0);
    $pdf->Ln();
    $pdf->Cell(75,0,'OSCA: _____________',0,0, 'R');
    $pdf->Cell(5,0,'',0,0, 'R');
    $pdf->Cell(45,0,'TIN: ____________',0);
    $pdf->Cell(10,0,'GSIS: ____________',0);
    $pdf->Ln();
    $pdf->Cell(45,0,'',0);
    $pdf->Cell(45,0,$row['clm_osca'],0);
    $pdf->Cell(50,0,$row['clm_tin'],0);
    $pdf->Cell(60,0,$row['clm_gsis'],0);

    $pdf->Ln();
    $pdf->Cell(75,15,'SSS: _____________',0,0, 'R');
    $pdf->Cell(5,0,'',0,0, 'R');
    $pdf->Cell(60,15,'PHILHEALTH: ____________',0);
    $pdf->Cell(10,15,'OTHERS: ____________',0);
    $pdf->Ln();
    $pdf->Cell(45,0,'',0);
    $pdf->Cell(65,-15,$row['clm_sss'],0);
    $pdf->Cell(50,-15,$row['clm_philhealth'],0);
    $pdf->Cell(60,-15,$row['clm_others_id'],0);

    $scid = $row['clm_scid'];
    $r1 = @mysqli_query($dbc, "SELECT * from tbl_seniors where clm_scid = '$scid'");
    $row1 = @mysqli_fetch_array($r1);


    $pdf->Image('../uploads/'.$row1['clm_valid'].'', 20, 180, 80, 70);
    $pdf->Image('../uploads/'.$row1['clm_seniorid'].'', 110, 180, 80, 70);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 9);
    $date = "Date Printed: " . date("F d, Y - h:i:sa");
    $pdf->Cell(0,220,$date,0,0, 'R');
    $pdf->Output();
}
else
{
    echo'<script>location.replace("index")</script>';
}
?>