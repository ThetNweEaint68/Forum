<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'confirmed' => 'boolean'
    ];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Fetch all threads that were created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    /**
     * Fetch the last published reply for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    /**
     * Get the path to the user's avatars.
     *
     * @param  string $avatar
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        return asset(\Storage::url($avatar ?: 'avatars/default.png'));
    }

    /**
     * Get all activity for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Mark the user's account as confirmed.
     */
    public function confirm()
    {
        $this->confirmed = true;

        $this->save();
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return in_array($this->name, ['Thet', 'Nwe']);
    }
}
