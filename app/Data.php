<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use Searchable;
    protected $guarded = [];
    
}
