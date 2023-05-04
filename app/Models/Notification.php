<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'company_id',
        'job_id',
        'type' // 1 apply 2 retract ,3 accept,4 decline
    ];

    public function getTypeTextAttribute()
    {
        $job_title = $this->job->title;
        $job_seeker_name = $this->job_seeker->name ?? 'Deleted User';
        $text = [
            1 => $job_seeker_name . ' applied for a job: ' . '<span>' . $job_title . '</span>' . '. check your email address for more information',
            2 => $job_seeker_name . ' has withdrawn his application from the job: ' . '<span>' . $job_title . '</span>',
            3 => 'Your Job '.'<span>' . $job_title . '</span>' .' has been accepted ',
            4 => 'Your Job '.'<span>' . $job_title . '</span>' .' has been rejected ',
        ];
        return $text[$this->type];
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function job_seeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
