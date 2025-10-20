<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $primaryKey = 'id_like';
    protected $fillable = ['id_user', 'id_post'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function post() {
        return $this->belongsTo(Posts::class, 'id_post', 'id_post');
    }
}
