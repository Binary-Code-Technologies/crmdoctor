<?php 
   
   include("fpdf17/fpdf.php");
   include("adminsession.php");
   
    $ad_form_id=$_GET['id'];
  
   $sql = mysqli_query($conn,"SELECT * from hos_setting where id='$haspid'");
     $rowedit = mysqli_fetch_array($sql);
     //print_r($rowedit);
       $hos_name = $rowedit['hos_name'];
       $address = $rowedit['address'];
       $website = $rowedit['website'];
       $email = $rowedit['email'];
       $contact = $rowedit['contact'];
  
  
  
  class PDF_MC_Table extends FPDF
  {
    var $widths;
    var $aligns;
      function Header()
      { 
      global $hos_name,$address,$website,$email,$contact;
      
         $this->SetXY(2,2);
         $this->SetFont('Times','B',12);
         $this->Cell(206,145,'','1','','C');
         //global $title1,$title2;
         $this->SetXY(25,10);
         $this->SetFont('Times','B',19);
         $this->Cell(150, 7,$hos_name,'','','C');
        // $this->Image('img/logo/logo.png',10,05,30,10);
         $this->SetXY(42,18);
         $this->SetFont('Arial','B',12);
         $this->Cell(100, 7,$address,'','','L');
         $this->SetXY(68,37);
         $this->SetFont('Arial','B',15);
         $this->Cell(180, 7,'Patient Details','','','L');
         
        $this->SetXY(160,9);
       $this->SetFont('Times','B',11);
       $this->Cell(100, 7,'Phone   : ','','','L');
	   $this->SetXY(175,9);
       $this->SetFont('Times','',11);
       $this->Cell(100, 7,$contact,'','','L');
       $this->SetXY(160,14);
       $this->SetFont('Times','B',11);
       $this->Cell(180, 7,'E-mail  : ','','','L');
	   $this->SetXY(175,14);
       $this->SetFont('Times','',11);
       $this->Cell(100, 7,$email,'','','L');
       $this->SetXY(160,19);
       $this->SetFont('Times','B',11);
       $this->Cell(180,7,'Website: ','','','L');
	   $this->SetXY(175,19);
       $this->SetFont('Times','',11);
       $this->Cell(100, 7,$website,'','','L');
            
         $this->ln(8);
         $this->SetXY(2,35);
          $this->SetFont('Times','BU',10);
          $this->Cell(206,0,'','B','L');
          $this->ln();
          $this->Cell(0,0,'','B','L');
          $this->ln();
          $this->Cell(0,0,'','B','L');
          $this->ln(8);
          $this->SetXY(2,105);
          $this->SetFont('Times','BU',10);
          $this->Cell(206,0,'','BU','L');
          $this->ln();
          $this->Cell(0,0,'','BU','L');
          $this->ln();
          $this->Cell(0,0,'','BU','L');
         // $this->Ln(10);
          
              $this->SetFont('courier','b',9);
             // $this->Rect(5, 5, 200, 80, 'D'); //For A4
          $this->SetXY(2,155);
          $this->SetFont('Times','B',7);
          $this->Cell(128,6,'NET TOTAL :','1','','R');
  
          
      }
      function Footer()
      { 
         $this->SetXY(145,125);
         $this->SetFont('Times','B',10);
         $this->Cell(100, 7,'Family Member  Signature  -','','','L');

         $this->SetXY(12,125);
         $this->SetFont('Times','B',10);
         $this->Cell(100, 7,'Hospital Signature  -','','','L');

          $this->SetY(-15);
          $this->SetFont('Arial','I',7);
          $this->Cell(0,10,'|| Software Developed By Binary Code Technology, All rights reserved ||',0,0,'C');
       }
  
  }
  $pdf=new PDF_MC_Table();
  $pdf->SetTitle("Patient Details");
  $pdf->AliasNbPages();
  $pdf->AddPage('P','A4');
    
  //echo "select * from doc_master where doc_id='$opd_id'";die;
   //echo "select * from depart_master where depart_id='$opd_id'" ;die;
  
   
   
         $pdf->SetXY(8,51);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(100, 7,'Patient Name','','','L');
         $pdf->SetXY(36,51);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(100, 7,": ".$set_first." ".ucwords($patient),'','','L');
         $pdf->SetXY(118,51);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Age / Sex','','','L');
         $pdf->SetXY(140,51);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$add_age." / ".$add_gender,'','','L');//$currentdate = date("m-d-Y");
         $pdf->SetXY(8,56);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Mobile No','','','L');
         $pdf->SetXY(36,56);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$add_mobile,'','','L');
         $pdf->SetXY(118,56);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'S/W/D of','','','L');
         $pdf->SetXY(140,56);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$set_second." ".ucwords($parents),'','','L');
         $pdf->SetXY(8,62);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(100, 7,'Address','','','L');
         $pdf->SetXY(36,62);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($add_address),'','','L');
         $pdf->SetXY(118,62);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(150, 7,'Aadhar No','','','L');
         $pdf->SetXY(140,62);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$aadhar_no,'','','L');
         
         $pdf->SetXY(36,68);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$add_opd,'','','L');
         
         $pdf->SetXY(140,68);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$add_ipd,'','','L');
         $pdf->SetXY(8,74);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Category','','','L');
         $pdf->SetXY(36,74);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($category),'','','L');
         $pdf->SetXY(118,74);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Diagnostic','','','L');
         $pdf->SetXY(140,74);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($diagnostic_name),'','','L');
         
         $pdf->SetXY(8,80);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Department Name','','','L');
         $pdf->SetXY(36,80);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($department_name),'','','L');
         $pdf->SetXY(118,80);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Doctor','','','L');
         $pdf->SetXY(140,80);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($doc_name),'','','L');
         
         $pdf->SetXY(8,86);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Addmission Date','','','L');
         $pdf->SetXY(36,86);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$add_date,'','','L');
         $pdf->SetXY(118,86);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Amount','','','L');
         $pdf->SetXY(140,86);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".$admis_fees,'','','L');
         
         $pdf->SetXY(8,92);
         $pdf->SetFont('Times','B',10);
         $pdf->Cell(180, 7,'Payment Type','','','L');
         $pdf->SetXY(36,92);
         $pdf->SetFont('Times','',10);
         $pdf->Cell(180, 7,": ".ucwords($payment_mode),'','','L');
           
    
   
       
        // $pdf->Image('img/anandlogo.png',160,5,'25','25');
      // $pdf->Image('img/cgc-logo.png',4,4,'35','30'); 
  
  
  $pdf->Output();
  
  //exit;
  //==============================================================
  ?>
  
   