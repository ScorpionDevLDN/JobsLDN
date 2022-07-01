<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function setPdfAttribute($pdf)
    {
        $this->deletePdf();
        if (gettype($pdf) != 'string') {
            $pdf->store('public');
            $this->attributes['pdf'] = $pdf->hashName();
            $this->attributes['cv_name'] = $pdf->getClientOriginalName();
        } else {
            $this->attributes['pdf'] = $pdf;
        }
    }

//
    public function getPdfAttribute($pdf): ?string
    {
        return $pdf ? Storage::url($pdf) : null;
    }

//
    public function deletePdf()
    {
        if (isset($this->attributes['pdf']) && $this->attributes['pdf']) {
            Storage::delete($this->attributes['pdf']);
        }
    }
}
