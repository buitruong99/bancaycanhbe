<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = "menus";
    use SoftDeletes;
    protected $guarded = [];


}
