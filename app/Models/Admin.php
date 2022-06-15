<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $guard_name = 'web';
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_super_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

//    public function setImageAttribute($image)
//    {
//        $this->deleteImage();
//        if (gettype($image) != 'string') {
//            $image->store('admin');
//            $this->attributes['image'] = $image->hashName();
//        }
//    }
//
    public function getImageAttribute($image): ?string
    {
        return $image ? Storage::url($image) : asset('assets/user.png');
    }
//
//    public function deleteImage()
//    {
//        if (isset($this->attributes['image']) && $this->attributes['image']) {
//            Storage::delete('admin/' . $this->attributes['image']);
//        }
//    }
}
