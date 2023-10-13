<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_info extends Model
{
    use HasFactory;

    protected $table = 'users_info';

    protected $fillable = ['user_id','user_type','bau_id_number'];

}
