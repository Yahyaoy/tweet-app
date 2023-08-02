<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value){
        $defaultImage = '/images/default-avatar.jpeg';
        $avatarPath = $value ? "storage/".$value : $defaultImage;
        return asset($avatarPath);
    }
    public function getCoverImageAttribute($value){
        $defaultImage = '/images/default-profile-banner.jpg';
        $coverPath = $value ? "storage/".$value : $defaultImage;
        return asset($coverPath);
    }

    public function timeline(){
        $friends = $this->follows()->pluck('id');

        return
            Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()->paginate(10);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
