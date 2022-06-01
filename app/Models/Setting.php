<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
      'website_name',
      'logo',
      'cover',
      'address',
      'bio',
      'contact_email',
      'phone',
      'social_links',
      'slogan_text',
      'copy_right_text',
      'main_color',
      'secondary_color',
    ];
}
