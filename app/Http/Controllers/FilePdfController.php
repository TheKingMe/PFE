<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\PdfReader;
use Fpdf\Fpdf;
use App\Models\Course;

class FilePdfController extends Controller
{

    public function createCertificateTemplate($course_id,$id)
    {
        $templatePath = public_path('master/dcc.pdf');
        $name=auth()->user()->name;
        $id=auth()->user()->id;

        $course = Course::find($course_id); 
        // Ensure the directory exists
        if (!file_exists(public_path('master'))) {
            mkdir(public_path('master'), 0777, true);
        }
        // Create a new PDF document using FPDF
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Certificate of Achievement', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'This is to certify that', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'I', 14);
        $pdf->Cell(0, 10, $name, 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'has successfully completed the course', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, $course->name, 0, 1, 'C');
        $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, 'Signature', 0, 0, 'L');
        $pdf->Cell(0, 10, 'Date', 0, 0, 'R');
        $pdf->Output(public_path('master/dcc.pdf'), 'F');

        return redirect()->route('get-certificate', ['id' => $id,'course_id'=>$course_id]);
    }
    public function process(Request $request)
    {
        $name = "";
        $outputfile = public_path().'dcc.pdf';
        $this->fillPDF(public_path().'/master/dcc.pdf',$outputfile,$name);
        
        return response()->file($outputfile);
        }
        public function fillPDF($file,$outputfile,$name)
        {
            $fpdi = new FPDI;
            $fpdi->setSourceFile($file);
            $template=$fpdi->importPage(1);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
            $fpdi->useTemplate($template);
            $top=105;
            $right=135;
            $nom=$name;
            $fpdi->SetFont("helvetica","","17");
            $fpdi->SetTextColor(25,26,25);
            $fpdi->Text($right,$top,$nom);

            return $fpdi->Output($outputfile,'F');
             
        }

}
