<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts'; // explicitly set since it's not plural of "Post"
    protected $primaryKey = 'id_post'; // your PK
    public $timestamps = false; // since you use 'date_posted' manually

    protected $fillable = [
        'id_user',
        'postcontent',
        'date_posted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function likes()
    {
    return $this->hasMany(Like::class, 'id_post', 'id_post');
    }
}