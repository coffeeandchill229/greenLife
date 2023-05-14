<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'customer_id', 'id');
    }
    public function reply()
    {
        return $this->hasMany(Reply::class, 'customer_id', 'id');
    }
}
