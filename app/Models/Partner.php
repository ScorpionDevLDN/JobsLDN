<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    use HasFactory;
    protected $fillable=[
      'name',
      'image',
      'link',
      'status',
    ];

        public function setImageAttribute($image)
    {
        $this->deleteImage();
        if (gettype($image) != 'string' && $image != null) {
            $image->store('public');
            $this->attributes['image'] = $image->hashName();
        }
    }

    public function getImageAttribute($image): ?string
    {
        return $image ? Storage::url($image) : null;
    }

    public function deleteImage()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            Storage::delete('public/' . $this->attributes['image']);
        }
    }
}
