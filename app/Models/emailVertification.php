<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailVertification extends Model
{
    use HasFactory;
    protected $fillable = ['entity_id' , 'entity_type' , 'expire_on' , 'status'];
}
