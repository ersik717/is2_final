<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept_emp extends Model
{
    public $table = "dept_emp";
    public function employee(){
          return $this->belongsTo(Employee::class, 'emp_no');
    }
    public function department(){
          return $this->belongsTo(Department::class, 'dept_no');
    }
    public function salary(){
    	return $this->belongsTo(Salary::class, 'emp_no');
    }
    public function title(){
        return $this->belongsTo(Title::class, 'emp_no');
    }
    public function manager(){
        return $this->belongsTo(Manager::class, 'emp_no');
    }
    
    //
}
