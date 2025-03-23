<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Achievement extends Model
{
    protected $fillable = [
        'student_id',
        'nim',
        'name',
        'phone',
        'study_program',
        'achievement_type',
        'program_by',
        'achievement_level',
        'participation_type',
        'execution_model',
        'event_name',
        'participant_count',
        'university_count',
        'achievement_title',
        'start_date',
        'end_date',
        'news_link',
        'certificate_file',
        'award_photo_file',
        'student_assignment_letter',
        'nidn',
        'supervisor_assignment_letter',
        'status',
        'verified_by',
        'verified_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($achievement) {
            if ($achievement->student_id) {
                $student = User::find($achievement->student_id);
                if ($student) {
                    $achievement->nim = $student->nim;
                    $achievement->name = $student->name;
                    $achievement->phone = $student->phone;
                    $achievement->study_program = $student->study_program;
                }
            }
        });
    }
}
