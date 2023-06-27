<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }
}
