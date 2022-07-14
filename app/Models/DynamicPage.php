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
        'shown_in',//1 header 0 footer,2both
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
            Storage::delete('public/' . $this->attributes['image']);
        }
    }

    public function getShownAttribute()
    { //1 header 0 footer
        return collect([
            1 => 'Header',
            0 => 'Footer',
            2 => 'Header & Footer',
        ])->get($this->shown_in);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 1);
    }

    public function scopeHeaderAndFooter($query)
    {
        return $query->whereIn('shown_in', 1,2);
    }

}
