<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'course',
        'subject',

        'value',
        'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
