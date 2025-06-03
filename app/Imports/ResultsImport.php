<?php
namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultsImport implements ToModel, WithHeadingRow
{
    protected $program_id;
    protected $course_id;
    protected $batch_id;

    public function __construct($program_id, $course_id, $batch_id)
    {
        $this->program_id = $program_id;
        $this->course_id = $course_id;
        $this->batch_id = $batch_id;
    }

    public function model(array $row)
    {
        return new Result([
            'program_id' => $this->program_id,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'student_id' => $row['student_id'],
            'student_name' => $row['student_name'],
            'module_name' => $row['module_name'],
            'result' => $row['result'],
        ]);
    }
}