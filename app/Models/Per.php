<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Per extends Model
{
    use HasFactory;

    protected $fillable = [
        'per',
        'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

