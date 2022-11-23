<?php
    include('../utils/db_config.php');
    require('../fpdf184/fpdf.php');
    date_default_timezone_set("Asia/Manila");
    
    if(isset($_GET['from']) && isset($_GET['to'])){
        $from_date = date('Y-m-d H:i:s', strtotime($_GET['from']));
        $to_date = date('Y-m-d H:i:s', strtotime($_GET['to']));

        class PDF extends FPDF
        {
            // function Header()
            // {
            //     global $title;
            //     $w = $this->GetStringWidth($title)+80;
                
            // }
            
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Text color in gray
                $this->SetTextColor(128);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
            }
            
            // function KhobarHeader($description){
                
            //     // $this->Cell(190,2,$description,0,1,'C');
            //     // $this->Ln(1);
            // }
            
            function PrintedHeader($name, $datetime){
                $this->SetFont('Arial','I',8);
                $this->SetFillColor(200,220,255);
                $this->Cell(20,10,'Generated By:',0,0,'L');
                $this->Cell(70,10,$name,0,0,'L');
                $this->Cell(65,10,'Date Generated:',0,0,'R');
                $this->Cell(35,10,$datetime,0,0,'R');
                $this->Ln(10);
            }

            function ChapterHeader()
            {
                $this->SetFont('Arial','B',10);
                $this->Cell(20,6,"ID",0,0,'C');
                $this->Cell(50,6,"Full Name",0,0,'L');
                $this->Cell(30,6,"Service",0,0,'L');
                $this->Cell(60,6,"Booked Date",0,0,'L');
                $this->Cell(30,6,"Status",0,0,'L');
                $this->Ln(6);
            }
            
            function ChapterItem($id, $name, $service, $booked_date, $status)
            {
                $this->SetFont('Arial','',10);
                $this->Cell(20,6,$id,1,0,'C');
                $this->Cell(50,6,$name,1,0,'L');
                $this->Cell(30,6,$service,1,0,'L');
                $this->Cell(60,6,date('F j, Y, g:i a', strtotime($booked_date)),1,0,'L');
                $this->SetFillColor(200,0,0,1);
                $this->Cell(30,6,$status,1,0,'L');
                $this->Ln(6);
            }
        }
        $datetime = date("Y-m-d h:i:sa");
        $pdf = new PDF();
        $title = 'Appointment Report';
        $pdf->SetTitle($title);
        $pdf->AddPage();
        $pdf->SetFont('Arial','I',15);
        // $image = "G. Verzosa";
        // $pdf->Cell(60,2,$pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 23.78),0, 0, 'C', false );
        $pdf->Cell(190,2,"G. Verzosa",0,0,'C');
        $pdf->Cell(60,2,"",0,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',8);
        // // $appointment_query = "SELECT * FROM tbl_appointment";
        // // $appointment_result = $conn -> query($appointment_query);
       
        // // while($rows = mysqli_fetch_assoc($appointment_result)){
        // //     $description = $rows['APP_NAME'];
        // //     $pdf->KhobarHeader($description);
            
        // // }
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(190,2,$title,0,1,'C');
        $pdf->Ln(5);
        $pdf->SetTextColor(128);
        $pdf->PrintedHeader('Hello', $datetime);
        $pdf->SetTextColor(0);
        $pdf->ChapterHeader();
        $sql = "SELECT tbl_appointment.*, tbl_service.SERVICE_NAME, tbl_service.SERVICE_ID FROM tbl_appointment INNER JOIN tbl_service ON tbl_appointment.SERVICE_ID = tbl_service.SERVICE_ID WHERE tbl_appointment.START_DATE BETWEEN '$from_date' AND '$to_date'";
        // else{
        //     $sql = "SELECT * FROM tblcategory WHERE Category_ID LIKE '%$search%' AND Category_Status = 'Active' OR
        //                                             Category_Name LIKE '%$search%' AND Category_Status = 'Active' OR
        //                                             Category_Description LIKE '%$search%' AND Category_Status = 'Active'";
        // }
        $res = $conn -> query($sql);
        while($rows1 = mysqli_fetch_assoc($res)){
            $id = $rows1['APP_ID'];
            $name = $rows1['APP_NAME'];
            $service = $rows1['SERVICE_NAME'];
            $booked_date = $rows1['START_DATE'];
            $status = $rows1['APP_STATUS'];

            if($status == 0){
                $pdf->ChapterItem($id, $name, $service, $booked_date, 'PENDING');
            }
            else if($status == 1){
                $pdf->ChapterItem($id, $name, $service, $booked_date, 'ACCEPTED');
            }
            else if($status == 2){
                $pdf->ChapterItem($id, $name, $service, $booked_date, 'REJECTED');
            }
            else if($status == 3){
                $pdf->ChapterItem($id, $name, $service, $booked_date, 'CANCELED');
            }
            
        }
        $pdf->Output();
    }
    else{
        header("Location: admin_appointment_report.php");
    }

?>