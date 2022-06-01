<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerCv extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'pdf',
        'cv_name',
    ];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
