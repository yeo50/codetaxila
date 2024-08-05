<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enroll extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'student_id',
        'course',
        'payment',
        'fee',
        'paid',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
