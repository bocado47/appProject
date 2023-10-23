<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePerPosition extends Model
{
    use HasFactory;

    protected $table = 'price_per_positions';
    protected $fillable = ['position_id','product_id','price'];
    

}
