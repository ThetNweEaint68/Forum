<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;

    protected $guraded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
