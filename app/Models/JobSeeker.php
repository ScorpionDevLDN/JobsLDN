<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
class JobSeeker extends Authenticatable
{
    protected $table='job_seekers';
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
        'overview',
        'active',
        'is_deleted',
        'email_verified_at'

    ];
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

    public function approve()
    {
        $this->email_verified_at = Carbon::now();
        return $this->save();
    }

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
        return $image ? asset('storage/'.$image) : asset('frontend/new/images/account-img.svg');
    }

//
    public function deletePhoto()
    {
        if (isset($this->attributes['photo']) && $this->attributes['photo']) {
            Storage::delete($this->attributes['photo']);
        }
    }

    public function bookmarks(){
        return $this->hasMany(JobSeekerBookmark::class);
    }

    public function postbookmarked($post){
        return $this->bookmarks()->where('job_id',$post)->doesntExist();
    }

    public function cvs(){
        return $this->hasMany(JobSeekerCv::class);
    }

    public function jobs(){
        return $this->hasMany(JobSeekerJob::class);
    }

    public function myjob($id){
        return $this->jobs()->where('job_id',$id)->exists();
    }

}
