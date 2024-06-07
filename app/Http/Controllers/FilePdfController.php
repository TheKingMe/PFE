<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Fpdf\Fpdf;
use App\Models\Course;
use Carbon\Carbon;

class FilePdfController extends Controller
{
    public function createCertificateTemplate($course_id)
    {
        $templatePath = public_path('master/dcc.pdf');
        $name = auth()->user()->name;
        $userId = auth()->user()->id;

        $course = Course::find($course_id);

        // Ensure the directory exists
        if (!file_exists(public_path('master'))) {
            mkdir(public_path('master'), 0777, true);
        }

        // Create a new PDF document using FPDF
        $pdf = new Fpdf();
        $pdf->AddPage();

        // Add the background image
        // $backgroundPath = public_path('images/certifica.jpg');
        // $pdf->Image($backgroundPath, 0, 0, 210, 297); // Full-page background

        // Add borders
        $pdf->SetDrawColor(50, 50, 100);
        $pdf->Rect(10, 10, 190, 277);

       
        $logoPath = public_path('images/LogoS.jpg'); // Path to logo image
        if (file_exists($logoPath)) {
            // Draw a white rectangle behind the logo
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Image($logoPath, 159, 20, 40); // Positioned on the right with a 10mm margin
            $pdf->Ln(30); // Move to the next line after logo
        }

        // Add title
        $pdf->SetFont('Arial', 'B', 24);
        $pdf->SetTextColor(50, 50, 100);
        $pdf->Cell(0, 20, 'Certificate of Achievement', 0, 1, 'C');
        $pdf->Ln(10);

        // Add subtitle
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(0, 10, 'This is to certify that', 0, 1, 'C');
        $pdf->Ln(10);

        // Add name
        $pdf->SetFont('Arial', 'I', 20);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, $name, 0, 1, 'C');
        $pdf->Ln(10);

        // Add course information
        $pdf->SetFont('Arial', '', 16);
        $pdf->SetTextColor(50, 50, 100);
        $pdf->Cell(0, 10, 'has successfully completed the course', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, $course->name, 0, 1, 'C');
        $pdf->Ln(20);

       
        // Add signature and date
        $pdf->SetFont('Arial', '', 14);
        $pdf->SetY( 161); // Set position for the date

        $pdf->Cell(0, 10, 'Signature:', 0, 0, 'L');
        $signaturePath = public_path('images/Sign.png'); // Use public_path instead of asset
        $pdf->Image($signaturePath, 35, 157, 40, 20); // Adjust y coordinate to avoid overlap

        $pdf->SetXY(140, 161); // Set position for the date
        $pdf->Cell(0, 10, 'Date: ' . Carbon::now()->format('Y-m-d'), 0, 1, 'R');

        // Output the PDF
        $pdf->Output($templatePath, 'F');

        return redirect()->route('get-certificate', ['id' => $userId, 'course_id' => $course_id]);
    }

    public function process(Request $request)
    {
        $name = auth()->user()->name;
        $outputfile = public_path('dcc.pdf');
        $this->fillPDF(public_path('master/dcc.pdf'), $outputfile, $name);
        
        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $name)
    {
        $fpdi = new FPDI();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $fpdi->useTemplate($template);

        $top = 105;
        $right = 135;
        $fpdi->SetFont("helvetica", "", 17);
        $fpdi->SetTextColor(25, 26, 25);
        $fpdi->Text($right, $top, "");

        $fpdi->Output($outputfile, 'F');
    }
}
