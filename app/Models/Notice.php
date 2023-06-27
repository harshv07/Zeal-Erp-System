<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Notice extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'caption',
        'user_id',
        'year_id',
        'branch_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function branch()
    {
        return $this->belongsTo(branch::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('notice')
            ->singleFile();
    }
}
