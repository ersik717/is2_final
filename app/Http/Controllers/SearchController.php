<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
use DB;
class SearchController extends employeesController
{
 
   public function index()
   {
		return view('search.search');
	}
	public static function ifMan($emp_no){

        $manager=Manager::where('emp_no', '=', $emp_no)->first();
        if($manager === null){
            $res=" ";
		}
        else{
            $res="Yes";
        }
        echo $res;
    }
	public function search(Request $request)
	{
		if($request->ajax())
		{
 
			$output="";			
			$employees=DB::table('employees')
				->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE','%'.$request->search."%")
				->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
				->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
				->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
				->join('titles', 'titles.emp_no', '=', 'employees.emp_no')				
				->where('salaries.to_date', '=', '9999-01-01')
				->where('titles.to_date', '=', '9999-01-01')
				->paginate(15);

			if($employees)
			{
				foreach ($employees as $key => $employee)  { 
				$output.='<tr>'. 
				'<td>'.$employee->first_name.'</td>'.
				'<td>'.$employee->last_name.'</td>'.
				'<td>'.$employee->birth_date.'</td>'.
				'<td>'.$employee->gender.'</td>'.
				'<td>'.$employee->hire_date.'</td>'.
				'<td>'.$employee->dept_name.'</td>'.
				'<td>'.$employee->salary.'&euro;</td>'.
				'<td>'.$employee->title.'</td>'.
				'<td>'.'	 '.'</td>'.
				'</tr>';
				
			}
			
return Response($output);

 
   }
  
   }
 
}
 
}