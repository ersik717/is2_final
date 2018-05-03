<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public $table = "employees";
    protected $primaryKey = "emp_no";
    public function dept_emp(){
    	return $this->has(Dept_emp::class, 'emp_no');
    }

}
