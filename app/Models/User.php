<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasMedia, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_editor',
        'avatar',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_editor' => 'boolean',
    ];

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function isEditor(): bool
    {
        return $this->is_editor;
    }

    public function canAccessFilament(): bool
    {
        return $this->isEditor() || $this->isAdmin();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return url('/storage/' . $this->avatar);
    }
}
