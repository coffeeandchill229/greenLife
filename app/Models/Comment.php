<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id', 'id');
    }
}
