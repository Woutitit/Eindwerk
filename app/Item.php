<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'description', 'thumbnail', 'price', 'item_name_id', 'user_id'
    ];
}
