<?php include "includes/head.php" ?>
<?php  include "includes/sessions.php"?>
<?php include "includes/db.php"?>
<body>
  <!-- container section start -->
  <section id="container" class="">


    <?php include "includes/nav.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/sidebar.php" ?> 
    <!--sidebar end-->
    <style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}
		</style>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 style="color:green" class="page-header text-center"><b>Dashboard</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <?php 
          $month1 = (int)date('m');
          $year1 = date('Y');
          $query = mysqli_query($con, "SELECT * FROM add_employee");
          $query1 = mysqli_query($con, "SELECT * FROM register where status=1");
          $query2 = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amount) as adv FROM `advances` where month='$month1' && year='$year1'"))['adv'];
          $query3 = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amount) as sal FROM `salaries` where month='$month1' && year='$year1'"))['sal'];
          $query4 = mysqli_query($con, "SELECT salary FROM add_employee");
          $query5 = mysqli_query($con, "SELECT * FROM salaries where 
          month='$month1' && year='$year1' && balance=0");
          $query6 = mysqli_query($con, "SELECT * FROM salaries where 
          month='$month1' && year='$year1' && balance!=0");
          $count  = mysqli_num_rows($query);
          $count1  = mysqli_num_rows($query1);
          // $count2  = mysqli_fetch_array($query2);
          // $count3  = mysqli_fetch_array($query3);
          $count4  = mysqli_num_rows($query4);
          $count5  = mysqli_num_rows($query5);
          $count6  = mysqli_num_rows($query6);
          $month = date('M');
          $year = date('Y');
        ?>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-users"></i>
              <div class="count"><?php echo $count; ?></div>
              <div class="title">Employees</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-users"></i>
              <div class="count"><?php echo $count1; ?></div>
              <div class="title">Users</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              
              <div class="count"><?php echo $query2; ?></div>
              <div class="title">Advances for <?php echo $month; ?> <?php echo $year; ?></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <div class="count"><?php echo $query3; ?></div>
              <div class="title">Salaries paid for <?php echo $month;?> <?php echo $year;?></div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


<!-- pie-chart-start -->
<figure class="highcharts-figure">
    <div id="containerx"></div>
    <p class="highcharts-description">
        Pie charts for salaries
    </p>
</figure>
<!-- pie-chart-end -->
  </section>
  <?php include "includes/footer.php" ?>
  <script src="highcharts/code/highcharts.js"></script>
<script src="highcharts/code/modules/exporting.js"></script>
<script src="highcharts/code/modules/export-data.js"></script>
<script src="highcharts/code/modules/accessibility.js"></script>
<script type="text/javascript">
Highcharts.chart('containerx', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Employee Salaries for <?php echo $month;?> <?php echo $year;?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Number',
        colorByPoint: true,
        data: [{
            name: 'Fully Paid Employees',
            y: <?php echo $count5 ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Partially paid Employees',
            y: <?php echo $count6 ?>
        }]
    }]
});
		</script>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>



