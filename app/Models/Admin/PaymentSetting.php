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
}
