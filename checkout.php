<?php include 'includes/user_header.php' ?>
<meta charset="utf-8">
<div id="wrapper">
  <?php include 'includes/user_navigation.php' ?>
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <?php $bookingPrice=0;
              $servicePrice=0;
        ?>
        <h1 class="page-header">
            Skyscraper
            <small>Hotels</small>
            <div class="text-center">
              <h1 style="font-style: italic; font-size:7rem;">Checkout:</h1>
            </div>
        </h1>

      <div class="container-fluid">
      <div class="row">
        <div class="roomCheckoutDetails">
          <div class="text-center">
            <h2>Booking Details:</h2>
            </div>
            <br>
           <table class="table table-bordered table-hover">
             <thead>
               <th>Room Type</th>
               <th>Guests</th>
               <th>Check-In</th>
               <th>Check-Out</th>
               <th>Price Per Night</th>
             </thead>
             <tbody>
            <?php
            $userID = $_SESSION['user_id'];
            $SelectBook = "SELECT * FROM booking WHERE UserID = {$userID}";
            $SendQuery = mysqli_query($connection, $SelectBook);
            while($Result = mysqli_fetch_assoc($SendQuery)){
              $roomID = $Result['RoomID'];
              $following = "SELECT * FROM rooms WHERE RoomID = {$roomID}";
              $rquery = mysqli_query($connection, $following);
              $resulting = mysqli_fetch_assoc($rquery);
              $roomType = $resulting['Type'];
              $nbOfGuests = $Result['NbOfAdults']+$Result['NbOfChildren'];
              $arrival = $Result['CheckIn'];
              $departure = $Result['CheckOut'];
              $price = $resulting['Price'];
             ?>

                 <td><?php echo $roomType ?></td>
                 <td><?php echo $nbOfGuests ?></td>
                 <td><?php echo $arrival ?></td>
                 <td><?php echo $departure ?></td>
                 <td><?php echo $price ?></td>


        <?php
            $nbOfDaysSpent = abs(strtotime($arrival) - strtotime($departure));
            $bookingPrice= $price * $nbOfDaysSpent + $bookingPrice;
          } ?>
      </tbody>
    </table>
          </div>
          </div>
      </div>
      <hr>

    <div class="container-fluid">
    <div class="row">

      <div class="roomCheckoutDetails">
        <div class="text-center">
          <h2>Services:</h2>
          </div>
          <br>

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
                $servicePrice= $ServicePrice + $servicePrice;
              }

                ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>
    <hr>

    <div class="container-fluid">
    <div class="row">

      <div class="roomCheckoutDetails">
        <div class="text-center">
          <h2>Total Price:</h2>
          </div>
          <br>
        <dl>
          <dt class="text-center"> Bookings Total: </dt>
          <dd class="text-center"><?php echo $bookingPrice ?>$</dd>
        </dl>
        <dl>
          <dt class="text-center"> Services Total: </dt>
          <dd class="text-center"> <?php echo $servicePrice ?>$</dd>
        </dl>
        </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
<?php include 'includes/user_footer.php' ?>
