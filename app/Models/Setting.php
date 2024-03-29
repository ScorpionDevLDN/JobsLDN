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
        'icon_logo',
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
        'linkedin_link',
        'telegram_link',
        'site_key',
        'secret_key',
        'mailchimp_list_id',
        'mailchimp_api_key',

        'email_from',
        'email_port',
        'email_password',
        'email_host',
        'email_logo',
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
    public function getLogoAttribute($logo): ?string
    {
        return $logo ? asset('storage/' . $logo) : asset('assets/user.png');
    }

    /*public function getIconLogoAttribute($logo): ?string
    {
        return $logo ? $logo : asset('assets/user.png');
    }*/
    public function getEmailLogoAttribute($email_logo): ?string
    {
        return $email_logo ? asset('storage/' . $email_logo) : asset('assets/user.png');
    }

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

    public function getCoverAttribute($cover): ?string
    {
        return $cover ? asset('storage/' . $cover) : asset('assets/user.png');
    }

//    public function deleteCover()
//    {
//        if (isset($this->attributes['cover']) && $this->attributes['cover']) {
//            Storage::delete('setting/' . $this->attributes['cover']);
//        }
//    }
}
