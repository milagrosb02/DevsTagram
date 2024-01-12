<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Haciendo relacion con Post Model
    // Referencia: un usuario puede tener múltiples publicaciones
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    // un usuario puede tener varios likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    // guardo los seguidores de un usuario
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }


    // guardo a quienes sigo
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers',  'follower_id', 'user_id');
    }


    // metodo para comprobar si un usuario ya sigue a otro
    public function siguiendo(User $user)
    {
        // este metodo accede al metodo followers() y revisa si el user que esta visitando el muro ya es seguidor de la persona
        return $this->followers->contains($user->id);
    }


    

}
