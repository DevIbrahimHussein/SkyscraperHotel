<?php include "includes/user_header.php" ?>
    <div id="wrapper">
<?php
      $userID = $_SESSION['user_id'];
    if(isset($_POST['addService'])){

      if(isset($_POST['Safe'])){
        $safeInRoom = $_POST['Safe'];
        $safe_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($safeInRoom,$userID) ";
        $safe_service_query_result = mysqli_query($connection,$safe_service_query) or die('query error');
      }

      if(isset($_POST['baggageStorage'])){
        $Baggage= $_POST['baggageStorage'];
        $Baggage_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($Baggage,$userID) ";
        $Baggage_service_query_result = mysqli_query($connection,$Baggage_service_query) or die('query error');
      }

      if(isset($_POST['bikeRental'])){
        $bike_service = $_POST['bikeRental'];
        $bike_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($bike_service,$userID) ";
        $bike_service_query_result = mysqli_query($connection,$bike_service_query) or die('query error');
      }

      if(isset($_POST['Breakfast_service'])){
        $breakfast_service = $_POST['Breakfast_service'];
        $breakfast_service = (int)$breakfast_service ;
        $breakfast_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($breakfast_service,$userID) ";
        $breakfast_service_query_result = mysqli_query($connection,$breakfast_service_query) or die('query error');
      }
      if(isset($_POST['carRental_service'])){
        $carRental_service = $_POST['carRental_service'];
        $carRental_service = (int)$breakfast_service ;
        $carRental_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($carRental_service,$userID) ";
        $carRental_service_query_result = mysqli_query($connection,$carRental_service_query) or die('query error');
      }
      if(isset($_POST['travelGuide_service'])){
        $travelGuide_service = $_POST['travelGuide_service'];
        $travelGuide_service = (int)$travelGuide_service ;
        $travelGuide_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($travelGuide_service,$userID) ";
        $travelGuide_service_query_result = mysqli_query($connection,$travelGuide_service_query) or die('query error');
      }
      if(isset($_POST['airportHotelTransportations_service'])){
        $airportHotelTransportations_service = $_POST['airportHotelTransportations_service'];
        $airportHotelTransportations_service = (int)$airportHotelTransportations_service ;
        $airportHotelTransportations_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($airportHotelTransportations_service,$userID) ";
        $airportHotelTransportations_service_query_result = mysqli_query($connection,$airportHotelTransportations_service_query) or die('query error');
      }
      if(isset($_POST['spaAndGym_service'])){
        $spaAndGym_service = $_POST['spaAndGym_service'];
        $spaAndGym_service = (int)$spaAndGym_service ;
        $spaAndGym_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                      VALUES ($spaAndGym_service,$userID) ";
        $spaAndGym_service_query_result = mysqli_query($connection,$spaAndGym_service_query) or die('query error');
      }
    }

      ?>

<!-- Navigation -->
<?php include "includes/user_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                      <h1 class="page-header">
                          Skyscraper
                          <small>Hotels</small>
                      </h1>

<!--  -->

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Service</th>
      <th>Description</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $Query= "Select * From userservices WHERE UserID = {$userID}";
    $ExecuteUserService = mysqli_query($connection, $Query);
    if(!$ExecuteUserService){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteUserService)){
      $serviceID = $tuples['ServiceID'];

      $FollowUpQuery = "Select * FROM services WHERE ServiceID = {$serviceID}";
      $ExecuteOneLastTime = mysqli_query($connection, $FollowUpQuery);
      $info = mysqli_fetch_assoc($ExecuteOneLastTime);
      $ServiceName = $info['ServiceName'];
      $ServiceDescription = $info['Description'];
      $ServicePrice = $info['Price'];
      echo "<tr>";
      echo "<td>$ServiceName</td>";
      echo "<td>$ServiceDescription</td>";
      echo "<td>$ServicePrice</td>";
      echo "</tr>";
    }

      ?>
  </tbody>
</table>
<hr>

<!--  -->
                      <h4>
                        Choose Additional Services:
                      </h4>

                      <div class="container-fluid">
                      <div class="row">
                        <form class="" action="services.php" method="post">

                      <div class="radioBtnContainer">
                        <label class="container"> <div class="radioBtnTitle"> Baggage Storage (Free)
                          &nbsp;
                        <input type="checkbox" name="baggageStorage" value="10">
                        <span class="checkmark"></span>
                        </div>
                      </div>

                        <div class="radioBtnContainer">
                          <label class="container"> <div class="radioBtnTitle"> Safe ($30)
                            &nbsp;
                          <input type="checkbox" name="Safe" value="8">
                          <span class="checkmark"></span>
                          </div>
                        </div>

                          <div class="radioBtnContainer">
                            <label class="container"> <div class="radioBtnTitle"> Bicycle Rent ($10/PerDay)
                              &nbsp;
                            <input type="checkbox" name="bikeRental" value="9">
                            <span class="checkmark"></span>
                          </div>
                          </div>

                          <div class="radioBtnContainer">
                            <label class="container"> <div class="radioBtnTitle"> Spa ($30/PerDay)
                              &nbsp;
                            <input type="checkbox" name="spaAndGym_service">
                            <span class="checkmark"></span>
                          </div>
                        </div>

                        <div class="radioBtnContainer">
                          <label class="container"> <div class="radioBtnTitle"> Breakfast (150$)
                            &nbsp;
                          <input type="checkbox" name="Breakfast_service" value="3">
                          <span class="checkmark"></span>
                        </div>
                      </div>

                      <div class="radioBtnContainer">
                        <label class="container"> <div class="radioBtnTitle"> Car Rental (100$)
                          &nbsp;
                        <input type="checkbox" name="carRental_service" value="4">
                        <span class="checkmark"></span>
                      </div>
                    </div>

                    <div class="radioBtnContainer">
                      <label class="container"> <div class="radioBtnTitle"> Travel Guide (75$)
                        &nbsp;
                      <input type="checkbox" name="travelGuide_service" value="5">
                      <span class="checkmark"></span>
                    </div>
                  </div>

                  <div class="radioBtnContainer">
                    <label class="container"> <div class="radioBtnTitle"> Airport Hotel Transportations (50$)
                      &nbsp;
                    <input type="checkbox" name="airportHotelTransportations_service" value="6">
                    <span class="checkmark"></span>
                  </div>
                </div>

                  &nbsp;&nbsp;&nbsp;<input type="submit" name="addService" class="btn btn-primary">
              </form>
                        </div>
                      </div>


                      </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include "includes/user_footer.php"?>
