<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
   body{
   background-image: url(https://hdwallsource.com/img/2014/6/blue-and-white-wallpaper-8899-9239-hd-wallpapers.jpg);
   }
   .container{
   	opacity: 0.9;
   }
}
  </style>
</head>

<body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Final
                    </a>
                </li>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="show">Tables</a>
                </li>
                 <li>
                    <a href="charts">Charts</a>
                </li>
            </ul>
        </nav>

<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Employees Info </h3>
				</div>
			<div class="panel-body">
				<div class="form-group">
				
					<div class="col-md-1"><input type="text" class="form-controller" id="search" name="search" placeholder="Search..."></div>
					<div class="col-md-1" style="display:none" id=loading><img class="small" src="images/orig.gif"/></div>
					<div class="col-md-1"></div>
						<div class="dropdown">
						  <span>Departments</span>
						  <div class="dropdown-content">
						    <a name="All" href="show"><p>All Departments</p></a>
						    <a name="Development" href="development.show"><p>Development</p></a>
						    <a name="Sales" href="sales.show"><p>Sales</p></a>
						    <a name="Production" href="production.show"><p>Production</p></a>
						    <a name="Human Resources" href="human.show"><p>Human Resources</p></a>
						    <a name="Research" href="research.show"><p>Research</p></a>
						    <a name="Customer" href="service.show"><p>Customer Service</p></a>
						    <a name="Finance" href="finance.show"><p>Finance</p></a>
						    <a name="Marketing" href="marketing.show"><p>Marketing</p></a>
						    <a name="Quality" href="quality.show"><p>Quality Management</p></a>
						  </div>
						</div>
					</div>
				
				</div>
			<table class="table table-bordered table-hover">
				<thead >
			<tr>
			<th style='padding-left:30px;'>First_name</th>
			<th style='padding-left:30px;'>Last_name</th>
			<th style='padding-left:30px;'>Birth_Date</th>
			<th style='padding-left:30px;'>Gender</th>
			<th style='padding-left:20px;'>Hire_date</th>
			<th style='padding-left:45px;'>Department</th>
			<th style='padding-left:30px;'>Salary</th>
			<th style='padding-left:47px;'>Position</th>
			<th style='padding-left:30px;'>isManager</th>
			</tr>
			</thead>
			<tbody class="text-center">
			@foreach($dept_emps as $dept_emp)
				<tr>
					<td>{{$dept_emp->employee->first_name}}</td>
					<td>{{$dept_emp->employee->last_name}}</td>
					<td>{{$dept_emp->employee->birth_date}}</td>
					<td class="text-center">{{$dept_emp->employee->gender}}</td>
					<td>{{$dept_emp->employee->hire_date}}</td>
					<td>{{$dept_emp->department->dept_name}}</td>
					<td>{{$dept_emp->salary->salary}}&euro;	</td>
					<td>{{$dept_emp->title->title}}</td>
					<td class="text-center">{{ App\Http\Controllers\employeesController::ifMan($dept_emp->emp_no) }}</td>
				</tr>	
				@endforeach
			</tbody>
			</table>
				<div class="text-center">	
					<ul class="pagination">
						<li>{{$dept_emps->links()}}</li>
					</ul>
				</div>
			</div>
			</div>
		</div>
	</div>

<script src="/js/menu.js"></script>
<script type="text/javascript">
	
</script>
<script type="text/javascript">
	var timeout;
	$('#search').on('keyup',function(){	
	 $("#loading").show();	
	$value=$(this).val();

	if (timeout) {
		clearTimeout(timeout);
	}
	timeout = setTimeout(function() {
		$.ajax({
		type : 'get',
		url : '{{URL::to('search')}}',
		data:{'search':$value},
		success:function(data){
			 $("#loading").hide();	
		$('tbody').html(data);
		}
		
	});

	}, 1000);
	


})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</html>