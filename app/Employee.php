<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	//protected $table ='employees';
    protected $fillable = ['emp_name', 'emp_status'];
}
