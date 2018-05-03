<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ChartController extends Controller
{
	public function charter()
	{
		$prices = DB::table('dept_emp')
					->select('departments.dept_name as name', DB::raw('count(dept_emp.emp_no) as total'))	
					->groupBy('dept_emp.dept_no')
					->join('departments', 'dept_emp.dept_no', '=', 'departments.dept_no')
					->get();
	return response()->json($prices);
	}
   public function charter1()
	{
		$prices = DB::table('titles')
					->select('titles.title as title', DB::raw('avg(salaries.salary) as salary'))	
					->groupBy('titles.title')
					->join('salaries', 'salaries.emp_no', '=', 'titles.emp_no')
					->get();
	return response()->json($prices);
	}
	public function charter2()
	{
		$prices = DB::table('titles')
					->select('titles.title as title', DB::raw('count(titles.emp_no) as count'))	
					->groupBy('titles.title')
					->get();
	return response()->json($prices);
	}
	public function charter3()
	{
		$prices = DB::table('employees')
					->select('employees.gender as gender', DB::raw('count(employees.emp_no) as count'))	
					->groupBy('employees.gender')
					->get();
	return response()->json($prices);
	}
	public function charter4()
	{
		$prices = DB::table('titles')
					->select('titles.title as title', DB::raw('count(employees.emp_no) as count'))
					->where('employees.hire_date','<','titles.to_date')
					->groupBy('titles.title')
					->join('employees', 'employees.emp_no', '=', 'titles.emp_no')
					->get();
	return response()->json($prices);
	}
    //
}
