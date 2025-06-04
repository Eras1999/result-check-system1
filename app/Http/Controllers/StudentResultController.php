<?php
namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentResultController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function show(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string',
        ]);

        $results = Result::with(['program', 'course', 'batch'])
            ->where('student_id', $request->student_id)
            ->get();

        if ($results->isEmpty()) {
            return redirect()->back()->with('error', 'No results found for this Student ID.');
        }

        return view('student.results', compact('results'));
    }

    public function downloadPdf(Request $request)
    {
        $student_id = $request->query('student_id');
        $results = Result::with(['program', 'course', 'batch'])
            ->where('student_id', $student_id)
            ->get();

        if ($results->isEmpty()) {
            return redirect()->route('student.index')->with('error', 'No results found for this Student ID.');
        }

        $pdf = Pdf::loadView('student.pdf', compact('results'));
        return $pdf->download('results_' . $student_id . '.pdf');
    }
}