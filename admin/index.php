<?php include "includes/admin_header.php" ?>
    <div id="wrapper">


<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin!
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                      </div>
                    </div>
                             <!-- /.row -->

             <div class="row">
                 <div class="col-lg-3 col-md-6">
                     <div class="panel panel-primary">
                         <div class="panel-heading">
                             <div class="row">
                                 <div class="col-xs-3">
                                     <i class="fa fa-file-text fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                   <?php
                                   $Q = "SELECT * FROM Hotels";
                                   $ExecuteQ = mysqli_query($connection, $Q);
                                   if(!$ExecuteQ) {
                                     die("Query failed! ".mysqli_error($connection));
                                   }
                                   $numberOfHotels = mysqli_num_rows($ExecuteQ);
                                   echo "<div class='huge'> $numberOfHotels </div>";

                                    ?>
                                     <div>Hotels</div>
                                 </div>
                             </div>
                         </div>
                         <a href="hotels.php">
                             <div class="panel-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="panel panel-green">
                         <div class="panel-heading">
                             <div class="row">
                                 <div class="col-xs-3">
                                     <i class="fa fa-comments fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                   <?php
                                   $C = "SELECT * FROM Comments";
                                   $ExecuteC = mysqli_query($connection, $C);
                                   if(!$ExecuteC) {
                                     die("Query failed! ".mysqli_error($connection));
                                   }
                                   $numberOfComments = mysqli_num_rows($ExecuteC);
                                   echo "<div class='huge'> $numberOfComments </div>";

                                    ?>
                                   <div>Comments</div>
                                 </div>
                             </div>
                         </div>
                         <a href="comments.php">
                             <div class="panel-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="panel panel-yellow">
                         <div class="panel-heading">
                             <div class="row">
                                 <div class="col-xs-3">
                                     <i class="fa fa-user fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                   <?php
                                   $U = "SELECT * FROM Users";
                                   $ExecuteU = mysqli_query($connection, $U);
                                   if(!$ExecuteU) {
                                     die("Query failed! ".mysqli_error($connection));
                                   }
                                   $numberOfUsers = mysqli_num_rows($ExecuteU);
                                   echo "<div class='huge'> $numberOfUsers </div>";
                                    ?>

                                     <div> Users</div>
                                 </div>
                             </div>
                         </div>
                         <a href="users.php">
                             <div class="panel-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="panel panel-red">
                         <div class="panel-heading">
                             <div class="row">
                                 <div class="col-xs-3">
                                     <i class="fa fa-list fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                   <?php
                                   $City = "SELECT * FROM City";
                                   $ExecuteCity = mysqli_query($connection, $City);
                                   if(!$ExecuteCity) {
                                     die("Query failed! ".mysqli_error($connection));
                                   }
                                   $numberOfCities = mysqli_num_rows($ExecuteCity);
                                   echo "<div class='huge'> $numberOfCities </div>";

                                    ?>
                                      <div>Cities</div>
                                 </div>
                             </div>
                         </div>
                         <a href="cities.php">
                             <div class="panel-footer">
                                 <span class="pull-left">View Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                             </div>
                         </a>
                     </div>
                 </div>
             </div>
                             <!-- /.row -->



             <?php
             $QD = "SELECT * FROM Hotels WHERE HotelStatus= 'draft'";
             $Select_all_drafts = mysqli_query($connection, $QD);
             if(!$Select_all_drafts) {
               die("Query failed! ".mysqli_error($connection));
             }
             $numberOfDrafts = mysqli_num_rows($Select_all_drafts);

             $QUnapproved = "SELECT * FROM Comments WHERE Status= 'unapproved'";
             $Select_all_unapproved = mysqli_query($connection, $QUnapproved);
             if(!$Select_all_unapproved) {
               die("Query failed! ".mysqli_error($connection));
             }
             $numberOfUnpprovedComments = mysqli_num_rows($Select_all_unapproved);

             $QSubscriber = "SELECT * FROM Users WHERE Role= 'subscriber'";
             $Select_all_subsc = mysqli_query($connection, $QSubscriber);
             if(!$Select_all_subsc) {
               die("Query failed! ".mysqli_error($connection));
             }
             $numberOfSubscribers = mysqli_num_rows($Select_all_subsc);

              ?>


             <br/><br/>
             <!-- DATA CHART -->
             <div class="row">
              <script type="text/javascript">
               google.charts.load('current', {'packages':['bar']});
               google.charts.setOnLoadCallback(drawChart);

               function drawChart() {
                 var data = google.visualization.arrayToDataTable([
                   ['Data', 'Count'],
                   <?php

                  $element_text = ['Active Hotels','Passive Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Cities'];
                  $element_count = [$numberOfHotels, $numberOfDrafts, $numberOfComments, $numberOfUnpprovedComments, $numberOfUsers, $numberOfSubscribers, $numberOfCities];

                  for ($i=0; $i < 7; $i++) {
                    echo "['{$element_text[$i]}'".","."{$element_count[$i]}"."],";
                  }
                  ?>

                 ]);

                 var options = {
                   chart: {
                     title: '',
                     subtitle: '',
                   }
                 };

                 var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                 chart.draw(data, google.charts.Bar.convertOptions(options));
               }
             </script>
              <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
             </div>
             <!-- END OF DATA CHART -->
             <br/><br/><hr>
             <!-- BOOKING CHART -->
             <div class="row">
               <h3 class="text-center">Booking Dates</h3>
                <script type="text/javascript">
                google.charts.load("current", {packages:["timeline"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {

                var container = document.getElementById('example5.2');
                var chart = new google.visualization.Timeline(container);
                var dataTable = new google.visualization.DataTable();

                dataTable.addColumn({ type: 'string', id: 'Room' });
                dataTable.addColumn({ type: 'string', id: 'Name' });
                dataTable.addColumn({ type: 'date', id: 'Start' });
                dataTable.addColumn({ type: 'date', id: 'End' });
                dataTable.addRows([
                [ 'Magnolia Room',  'CSS Fundamentals',    new Date(0,0,0,12,0,0),  new Date(0,0,0,14,0,0) ],
                [ 'Magnolia Room',  'Intro JavaScript',    new Date(0,0,0,14,30,0), new Date(0,0,0,16,0,0) ],
                [ 'Magnolia Room',  'Advanced JavaScript', new Date(0,0,0,16,30,0), new Date(0,0,0,19,0,0) ],
                [ 'Gladiolus Room', 'Intermediate Perl',   new Date(0,0,0,12,30,0), new Date(0,0,0,14,0,0) ],
                [ 'Gladiolus Room', 'Advanced Perl',       new Date(0,0,0,14,30,0), new Date(0,0,0,16,0,0) ],
                [ 'Gladiolus Room', 'Applied Perl',        new Date(0,0,0,16,30,0), new Date(0,0,0,18,0,0) ],
                [ 'Petunia Room',   'Google Charts',       new Date(0,0,0,12,30,0), new Date(0,0,0,14,0,0) ],
                [ 'Petunia Room',   'Closure',             new Date(0,0,0,14,30,0), new Date(0,0,0,16,0,0) ],
                [ 'Petunia Room',   'App Engine',          new Date(0,0,0,16,30,0), new Date(0,0,0,18,30,0) ]]);

                var options = {
                timeline: { singleColor: '#8d8' },
                };

                chart.draw(dataTable, options);
                }
                </script>
                <div id="example5.2" style="height: 'auto';"></div>
             </div>
             <!-- END OF BOOKING CHART -->


                </div>
              </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php"?>
