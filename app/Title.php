<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $table = "titles";
    protected $primaryKey = "emp_no";
    public function dept_emp(){
    	return $this->has(Dept_emp::class, 'emp_no');
    }
    //
}
