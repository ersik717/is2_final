<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public $table = "dept_manager";
    protected $primaryKey = "emp_no";
    public function dept_emp(){
   	return $this->has(Dept_emp::class, 'emp_no');
   }
    //
}
