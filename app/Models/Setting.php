<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'logo',
        'cover',
        'address',
        'bio',
        'contact_email',
        'phone',
//        'social_links', //
        'slogan_text',
        'copy_right_text',
        'main_color',
        'secondary_color',

        'phone',
        'phone2',
        'whatsapp_phone',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
        'telegram_link',
    ];


//    public function setLogoAttribute($logo)
//    {
//        $this->deleteLogo();
//        if (gettype($logo) != 'string') {
//            $logo->store('setting');
//            $this->attributes['logo'] = $logo->hashName();
//        }
//    }
//
//    public function getLogoAttribute($logo): ?string
//    {
//        return $logo ? Storage::url($logo) : asset('assets/user.png');
//    }

//    public function deleteLogo()
//    {
//        if (isset($this->attributes['logo']) && $this->attributes['logo']) {
//            Storage::delete('setting/' . $this->attributes['logo']);
//        }
//    }


//    public function setCoverAttribute($cover)
//    {
//        $this->deleteCover();
//        if (gettype($cover) != 'string') {
//            $cover->store('setting');
//            $this->attributes['cover'] = $cover->hashName();
//        }
//    }

//    public function getCoverAttribute($cover): ?string
//    {
//        return $cover ? Storage::url( $cover) : asset('assets/user.png');
//    }

//    public function deleteCover()
//    {
//        if (isset($this->attributes['cover']) && $this->attributes['cover']) {
//            Storage::delete('setting/' . $this->attributes['cover']);
//        }
//    }
}
