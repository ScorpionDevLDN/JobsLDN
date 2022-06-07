<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DynamicPage extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'image', // بجدول لحالها
        'description',
        'content',
        'slug',
        'keywords', // بدها جدول لحالها
        'metadata',
        'status',
        'shown_in',
    ];

    public function setImageAttribute($image)
    {
        $this->deleteImage();
        if (gettype($image) != 'string') {
            $image->store('setting');
            $this->attributes['image'] = $image->hashName();
        }
    }

    public function getImageAttribute($image): ?string
    {
        return $image ? Storage::url('setting/' . $image) : asset('assets/user.png');
    }

    public function deleteImage()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            Storage::delete('setting/' . $this->attributes['image']);
        }
    }
}
