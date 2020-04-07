<?php

namespace ErikFig\Feature\products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description'];
}
