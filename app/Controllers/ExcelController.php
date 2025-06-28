<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StudentModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelController extends Controller
{
    public function exportStudents()
    {
        $studentModel = new StudentModel();
        $students = $studentModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'Roll No');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Course ID');
        $sheet->setCellValue('D1', 'Semester ID');

        // Data
        $row = 2;
        foreach ($students as $s) {
            $sheet->setCellValue('A' . $row, $s['roll_no']);
            $sheet->setCellValue('B' . $row, $s['name']);
            $sheet->setCellValue('C' . $row, $s['course_id']);
            $sheet->setCellValue('D' . $row, $s['semester_id']);
            $row++;
        }

        // Output as download
        $writer = new Xlsx($spreadsheet);
        $filename = 'students.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $writer->save("php://output");
        exit;
    }

    public function importStudents()
    {
        $file = $this->request->getFile('excel_file');
        if ($file && $file->isValid()) {
            $ext = $file->getClientExtension();
            if ($ext === 'xlsx' || $ext === 'xls') {
                $spreadsheet = IOFactory::load($file->getTempName());
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $studentModel = new StudentModel();

                // Skip header row (0)
                for ($i = 1; $i < count($sheetData); $i++) {
                    $row = $sheetData[$i];
                    $studentModel->save([
                        'roll_no'     => $row[0],
                        'name'        => $row[1],
                        'course_id'   => $row[2],
                        'semester_id' => $row[3]
                    ]);
                }

                return redirect()->back()->with('success', 'Students imported successfully.');
            }
        }

        return redirect()->back()->with('error', 'Invalid file');
    }

    public function downloadStudentTemplate()
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headings
    $sheet->setCellValue('A1', 'Roll No');
    $sheet->setCellValue('B1', 'Name');
    $sheet->setCellValue('C1', 'Course ID');
    $sheet->setCellValue('D1', 'Semester ID');

    // Sample row (optional)
    $sheet->setCellValue('A2', '1001');
    $sheet->setCellValue('B2', 'John Doe');
    $sheet->setCellValue('C2', '1');
    $sheet->setCellValue('D2', '1');

    $writer = new Xlsx($spreadsheet);
    $filename = 'student_import_template.xlsx';

    // Send to browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $writer->save('php://output');
    exit;
}
}



