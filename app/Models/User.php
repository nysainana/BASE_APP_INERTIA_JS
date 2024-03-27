<?php

namespace App\Models;

use App\Enums\TypeUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Lang;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable, \Illuminate\Auth\MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'email_verified_at'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => TypeUser::class
    ];

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Verifer votre adresse e-mail'))
            ->line(Lang::get("S'il vous plait clicker sur le boutton"))
            ->action(Lang::get('Verification d\'email'), $url)
            ->line(Lang::get("Si vous n'avez pas creer de compte, Aucune action n'est requise."));
    }

    public function isAdmin(): bool
    {
        return $this->type === TypeUser::ADMINISTRATEUR;
    }

}
