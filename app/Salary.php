<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public $table = "salaries";
    protected $primaryKey = "emp_no";
    public function dept_emp(){
    	return $this->has(Dept_emp::class, 'emp_no');
    }//
}
