<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'newsletter_id',
        'scheduled_at',
        'status',
    ];

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class)->withPivot('opened')->withTimestamps();
    }
}
