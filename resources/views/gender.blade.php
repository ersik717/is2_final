<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <style>
        body{
           /* background: url(https://cdn.wallpapersafari.com/82/37/om58u1.jpg);*/
           background:url(http://backgroundcheckall.com/wp-content/uploads/2017/12/background-design-hd-4.jpg);
        .container{
            opacity: 0.9;
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
   <a class="btn btn-danger" style="margin-left: 84%; margin-top: 100px;" href="salaries"><-previous</a>                       
<div class="container">
<div class="panel-heading">
                    <h3>All Employees Divided By Gender</h3>
                </div>
<canvas id="myChart" width="400" height="150"></canvas>
<script>
    var url = "{{url('charter3')}}";
    var alblabels = new Array();
    var albdata = new Array();
    var color = new Array();
    $(document).ready(function() {
        $.get(url, function (response) {
        response.forEach(function (response) {
        albdata.push(response.count);
        alblabels.push(response.gender);
        color.push('rgba('
        + Math.round(Math.random() *255) + ','
        + Math.round(Math.random() *255) + ','
        + Math.round(Math.random() *255) + ','
        + '0.7'
        + ')');
        });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
        labels: alblabels,
        datasets: [{
        label: 'Prices',
        data: albdata,
        backgroundColor: color,
        borderWidth: 1
    }]
    },
        options: {
        scales: {
        yAxes: [{
        ticks: {
        beginAtZero: true
        }
        }]
        }      
    }
    });
});
});
</script>

</div>




<script src="/js/menu.js"></script>
</html>