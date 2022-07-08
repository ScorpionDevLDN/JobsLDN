<?php

namespace App\Models\Admin;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_id',
        'amount',
        'symbol'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
