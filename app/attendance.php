<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = ['name','email','date','in_at','out_at','accepted'];
}
