<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation_rates extends Model
{
    protected $fillable = [
        'product_id', 'rates_id'
    ];
}
