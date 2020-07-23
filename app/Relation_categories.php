<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation_categories extends Model
{
    protected $fillable = [
        'product_id', 'category_id'
    ];
}
