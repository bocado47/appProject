<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_products extends Model
{
    use HasFactory;

    protected $table = 'users_products';

    protected $fillable = ['own_price'];
}
