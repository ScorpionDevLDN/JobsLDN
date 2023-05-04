<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'message',
        'attachment',
    ];


    public function setAttachmentAttribute($image)
    {
        $this->deleteAttachment();
        if (gettype($image) != 'string') {
            $image->store('public');
            $this->attributes['attachment'] = $image->hashName();
        }
    }

    /*public function getAttachmentAttribute($image): ?string
    {
        return $image ? Storage::url($image) : null;
    }*/

//
    public function deleteAttachment()
    {
        if (isset($this->attributes['attachment']) && $this->attributes['attachment']) {
            Storage::delete($this->attributes['attachment']);
        }
    }
}
