<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'shown',
        'is_deleted',
    ];

    protected $casts = [
        'expired_at' => 'date'
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

    public function scopeActive($query)
    {
        return $query->where('status', 1)->where('shown', 1)->where('is_deleted', 0);
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
        if ($this->status == 0) {
            return 'Under Review';
        } elseif ($this->status == 1) {
            return 'Accepted';
        }
        return 'Rejected';
    }

    public function setPdfDetailsAttribute($image)
    {
        if ($image && gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['pdf_details'] = $image->hashName();
        }
    }

    /*public function getPdfDetailsAttribute($image): ?string
    {
        return $image ? Storage::url($image) : null;
    }*/

    public function deletePdfDetails()
    {
        if (isset($this->attributes['pdf_details']) && $this->attributes['pdf_details']) {
            Storage::delete($this->attributes['pdf_details']);
        }
    }

    public function seekerjobs()
    {
        return $this->hasMany(JobSeekerJob::class);
    }


    public function scopeAccepted($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFilterStatus($query)
    {
        $sortField = \request('sort_field', 'created_at');

        if (!in_array($sortField, ['id', 'title', 'type_id', 'salary', 'created_at'])) {
            $sortField = 'created_at';
        }

        $sortDirection = \request('sort_direction', 'desc');

        if (!in_array($sortDirection, ['desc', 'asc'])) {
            $sortDirection = 'desc';
        }

        $query->orderBy($sortField, $sortDirection);

        if (\request()->filled('category')) {
            $query->where('category_id', \request()->category);
        }

        if (\request()->filled('city')) {
            $query->where('city_id', \request()->city);
        }

        if (\request()->filled('type')) {
            $query->where('type_id', \request()->type);
        }
        if (\request()->filled('salary')) {
            $min = explode('-', \request('salary'));
            $less = explode('£', $min[0]);
            $than = explode('£', $min[1]);
            $query->where('salary', '>=', $less[1])->orWhere('salary', '<=', $than[1]);

        }

        if (\request()->filled('keywords')) {
            $keywords = \request()->keywords;
            $query->whereRaw('(title like ?)', ["%$keywords%"]);
        }
    }

}
