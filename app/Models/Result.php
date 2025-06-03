<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['program_id', 'course_id', 'batch_id', 'student_id', 'student_name', 'module_name', 'result'];
}