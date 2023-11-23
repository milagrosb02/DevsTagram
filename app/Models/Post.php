<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'user_id'];


    // Hago relacion con usuario
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }


    // Hago relacion con comentario
    // Un post va a tener multiples comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }


    // un post va a tener muchos likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
