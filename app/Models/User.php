<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getRoleColorAttribute()
    {
        $colors = [
            'admin' => '#f44336',
            'moderator' => '#2196f3',
            'editor' => '#ffeb3b',
            'user' => '#4caf50',
            'default' => '#9e9e9e',
        ];
        $roles = $this->getRoleNames();
        // sort role by importance
        $roles = collect($roles)->sortByDesc(function ($role) {
            return [
                'admin' => 0,
                'moderator' => 1,
                'editor' => 2,
                'user' => 3,
            ][$role];
        });
        return $colors[$roles->first()] ?? $colors['default'];
    }
}
