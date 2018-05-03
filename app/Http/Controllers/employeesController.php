<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Dept_emp;
use App\Department;
use App\Salary;
use App\Title;
use App\Manager;
use Illuminate\Support\Facades\DB;

class employeesController extends Controller
{
    //
    public function show(){
    $dept_emps =Dept_emp::where('to_date', '=', '9999-01-01')->paginate(15);
        return view('show', ['dept_emps'=>$dept_emps]); 
    }
    public static function ifMan($emp_no){

        $manager=Manager::where('emp_no', '=', $emp_no)->where('to_date', '=', '9999-01-01')->first();
        if($manager === null){
            $res=" ";
}
        else{
            $res="&#10004;";
        }
        echo $res;
    }
    //public function manag(){
    //	$second = DB::table('dept_manager')
    //			->rightJoin('employees', 'employees.emp_no', '=', 'dept_manager.emp_no');
    //
    //	$first = DB::table('employees')
    //			->leftJoin('dept_manager', 'employees.emp_no', '=', 'dept_manager.emp_no')
    //			->unionAll($second)
    //			->select('employees.emp_no as ee', 'dept_manager.emp_no as dd')
    //			->get();		
    //			return view('show', ['first'=>$first]); 
    //}
}
