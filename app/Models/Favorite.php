<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory, RecordsActivity;

    protected $fillable = ['user_id'];

    /**
     * Fetch the model that was favorited.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function favorited()
    {
        return $this->morphTo();
    }
}
