<?php
namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Course;
use App\Models\Batch;
use App\Imports\ResultsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminResultController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $courses = Course::all();
        $batches = Batch::all();
        return view('admin.upload', compact('programs', 'courses', 'batches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required',
            'course' => 'required',
            'batch' => 'required',
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Create or get program
        $program = Program::firstOrCreate(['name' => $request->program]);
        // Create or get course
        $course = Course::firstOrCreate(['name' => $request->course]);
        // Create or get batch
        $batch = Batch::firstOrCreate(['name' => $request->batch]);

        // Import Excel
        Excel::import(new ResultsImport($program->id, $course->id, $batch->id), $request->file('excel_file'));

        return redirect()->back()->with('success', 'Results uploaded successfully!');
    }
}