<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Post extends Model implements hasMedia
{
    use InteractsWithMedia;
    protected $fillable=[
        'caption',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
  

}
