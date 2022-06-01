<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable =[
        'company_id',
        'title',
        'summery',
        'pdf_details',
        'city_id',
        'type_id',
        'category_id',
        'currency_id',
        'per_id',
        'salary',
        'expired_at',
        'job_post_email',
        'is_super_post',
        'applicants_count',
        'views_count',
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    public function per(){
        return $this->belongsTo(Per::class);
    }
}
