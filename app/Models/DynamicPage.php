<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicPage extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'images', // بجدول لحالها
        'description',
        'content',
        'slug',
        'keywords', // بدها جدول لحالها
        'metadata',
    ];
}
