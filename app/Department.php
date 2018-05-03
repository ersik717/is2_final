<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = "departments";
    protected $primaryKey = "dept_no";
    public function dept_emp(){
    return $this->hasMany(Dept_emp::class, 'emp_no');
    }
    //
}
