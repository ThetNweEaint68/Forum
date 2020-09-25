<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    /**
     * A thread belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A thread is assigned a channel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * A thread may have many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Add a reply to the thread.
     *
     * @param $reply
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
