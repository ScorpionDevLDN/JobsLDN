<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'confirm_email',
        'password',
        'read_conditions',
        'photo',
        'type',
        'company_name',
        'employee_count',
        'industry',
        'website_url',
        'overview',
        'active',
        'is_deleted' // 1 deleted account
    ];

    protected $guarded = 'company';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /*public function setPhotoAttribute($image)
    {
        $this->deletePhoto();
        if (gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['photo'] = $image->hashName();
        }
    }*/

//
    public function getPhotoAttribute($image): ?string
    {
        return $image ? asset('storage/'.$image) : asset('frontend/images/company-logo.svg');
    }

//
    public function deletePhoto()
    {
        if (isset($this->attributes['photo']) && $this->attributes['photo']) {
            Storage::delete($this->attributes['photo']);
        }
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
