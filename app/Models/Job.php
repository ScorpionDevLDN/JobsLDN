<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'status', //0 under preview,1 accepted,2 rejected
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function per()
    {
        return $this->belongsTo(Per::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

//    public function getStatusAttribute(){
//        return collect([
//            0 => 'Under Preview',
//            1 => 'Accepted',
//            2 => 'Rejected',
//        ])->get($this->status);
//    }

//    public function getStatusAttribute()
//    {
//        $arr = [
//            0 => 'Under Preview',
//            1 => 'Accepted',
//            2 => 'Rejected',
//            ];
//        return $arr[$this->status];
//    }

    public function chechStatus()
    {
        if ($this->status == 0){
            return 'Under Preview';
        }elseif ($this->status == 1){
            return 'Accepted';
        }
        return 'Rejected';
    }
}
