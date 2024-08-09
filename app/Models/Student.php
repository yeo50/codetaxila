<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'dob',
        'phone',
        'address',
        'status',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function enroll()
    {
        return $this->hasMany(Enroll::class);
    }
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
