<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
