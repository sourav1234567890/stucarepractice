<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stu extends Model
{
    //
    protected $fillable = ['name', 'dob', 'department' ,'designation','agecount','salary','image'];
}
