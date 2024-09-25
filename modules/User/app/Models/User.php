<?php

namespace Modules\User\Models;

use Iben\Statable\Statable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Statable;

    protected function getGraph(): string
    {
        return  'user';
    }


    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'boolean',
            'password' => 'hashed',
        ];
    }
}
