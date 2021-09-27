<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected  $table = 'stores';

    protected $fillable = ['name', 'description','phone', 'mobile_phone', 'slug', 'user_id', 'logo'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    public function  product()
    {
        return $this->hasMany(Product::class);
    }
}
