<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Advertise extends Model
{
    use HasFactory;
    protected $fillable=[
        'text',
        'image',
        'cta',
        'url',
    ];

        public function setImageAttribute($image)
    {
        $this->deleteImage();
        if (gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['image'] = $image->hashName();
        }
    }

    public function getImageAttribute($image): ?string
    {
        return $image ? Storage::url($image) : asset('assets/user.png');
    }

    public function deleteImage()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            Storage::delete($this->attributes['image']);
        }
    }
}
