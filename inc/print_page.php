<?php
session_start();
require(dirname(__FILE__).'/mpdf/mpdf.php');

class CoursePDF extends mPDF {

    var $nav_logo;
    var $company_name;
    var $phone;
    var $mobile;
    var $email;

    var $title;
    var $description;
    var $objective;
    var $modules;

    function setNavLogo($nav_logo) {
        $this->nav_logo = $nav_logo;
    }
    function setCompanyName($company_name) {
        $this->company_name = $company_name;
    }
    function setPhoneNumber($phone) {
        $this->phone = $phone;
    }
    function setMobileNumber($mobile) {
        $this->mobile = $mobile;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function setTitle($title) {
        $this->title = $title;
    }
    function setDescription($description) {
        $this->description = $description;
    }
    function setObjective($objective) {
        $this->objective = $objective;
    }
    function setModules($modules) {
        $this->modules = $modules;
    }


    function showPage() {
        if(!empty($this->nav_logo)) {
            $this->Image($this->nav_logo, 15, 10, 30);
        }
        $this->WriteHTML('<h4 style="margin-top: -80px; text-align: center; font-family: Arial; margin-bottom: 0px;">'.$this->company_name.'</h4>');
        $this->WriteHTML('<p style="margin: 0px; text-align: center; font-family: Arial; font-size: 12px;">'.$this->email.'</p>');
        $this->WriteHTML('<p style="margin: 0px; text-align: center; font-family: Arial; font-size: 12px;">Phone: '.$this->phone.'</p>');
        $this->WriteHTML('<p style="margin: 0px; text-align: center; font-family: Arial; font-size: 12px;">Mobile: '.$this->mobile.'</p>');

        $this->Ln(5);

        $this->WriteHTML('<h3 style="font-family: Arial;">'.$this->title.'</h3>');
        $this->WriteHTML($this->description);

        $this->Ln();

        $this->WriteHTML('<h3 style="font-family: Arial;">Objective</h3>');
        $this->WriteHTML($this->objective);

        $this->Ln();

        $this->WriteHTML('<h3 style="font-family: Arial;">Module</h3>');
        $this->WriteHTML($this->modules);
        $this->Ln();
    }


}

$title = $_SESSION['course_title'];
$description = $_SESSION['course_description'];
$objective = $_SESSION['course_outline'];
$modules = $_SESSION['course_module'];

$company_name = $_SESSION['company_name'];
$company_logo = $_SESSION['company_logo'];
$company_phone = $_SESSION['company_phone'];
$company_mobile = $_SESSION['company_mobile'];
$company_email = $_SESSION['company_email'];

$footer = '<p style="text-align: center; font-size: 12px; font-style: italic;">'.$company_name.'</p>';
$footer.= '<p style="text-align: center; font-size: 12px; font-style: italic;">'.$title.'</p>';

$pdf = new CoursePDF();

$pdf->SetHTMLFooter($footer);
$pdf->setNavLogo($company_logo);
$pdf->setCompanyName($company_name);
$pdf->setPhoneNumber($company_phone);
$pdf->setMobileNumber($company_mobile);
$pdf->setEmail($company_email);
$pdf->setTitle($title);
$pdf->AddPage();
$pdf->setTitle($title);
$pdf->setDescription($description);
$pdf->setObjective($objective);
$pdf->setModules($modules);
$pdf->showPage();


$pdf->Output($title.'.pdf', 'I');
