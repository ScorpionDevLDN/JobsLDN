<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PaymentSetting extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'image',
      'description',
      'days_count',
      'text',
      'price',
      'support_by',
      'paypal_logo',
    ];


    public function setImageAttribute($image)
    {
        $this->deleteImage();
        if (gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['image'] = $image->hashName();
        }
    }
//
    public function getImageAttribute($image): ?string
    {
        return $image ? Storage::url($image) : null;
    }
//
    public function deleteImage()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            Storage::delete($this->attributes['image']);
        }
    }

    public function setPaypalLogoAttribute($image)
    {
        $this->deletePaypalLogo();
        if (gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['paypal_logo'] = $image->hashName();
        }
    }
//
    public function getPaypalLogoAttribute($image): ?string
    {
        return $image ? Storage::url($image) : null;
    }
//
    public function deletePaypalLogo()
    {
        if (isset($this->attributes['paypal_logo']) && $this->attributes['paypal_logo']) {
            Storage::delete($this->attributes['paypal_logo']);
        }
    }
}
