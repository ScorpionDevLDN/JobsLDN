<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerJobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'job_id',
        'job_seeker_cv_id',
    ];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function jobSeekerCv()
    {
        return $this->belongsTo(JobSeekerCv::class);
    }
}
