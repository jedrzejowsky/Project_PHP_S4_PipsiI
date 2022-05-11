<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'image', 'date'];
//    protected $dates = ['date'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 300);
    }

    public function getPhotoAttribute()
    {
        return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
