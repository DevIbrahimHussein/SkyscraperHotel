<?php include "includes/user_header.php" ?>
    <div id="wrapper">
<?php
  $userid = $_SESSION['user_id'];
?>


<?php
if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteBookingQuery = "Delete From booking Where BookingID={$deleteID}";
  $deleteBooking = mysqli_query($connection, $deleteBookingQuery);
  header("Location: bookings.php");
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
      <th>Room</th>
      <th>Hotel</th>
      <th>Adults</th>
      <th>Children</th>
      <th>Check-In</th>
      <th>Check-Out</th>
      <th>Price</th>
      <th>Cancel</th>
    </tr>
  </thead>
  <tbody>

    <?php


    $Query= "Select * From booking Where UserID = {$userid}";
    $ExecuteBookings = mysqli_query($connection, $Query);
    if(!$ExecuteBookings){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteBookings)){
      $booking_ID = $tuples['BookingID'];
      $room_ID = $tuples['RoomID'];
      //GET HOTELNAME FROM ROOMID

      $AnotherQuery = "SELECT * FROM rooms WHERE RoomID = {$room_ID}";
      $Fetch = mysqli_query($connection, $AnotherQuery);
      $tuple = mysqli_fetch_assoc($Fetch);
      //USE HOTELID TO FECTH HOTELNAME
      $HotelID= $tuple['HotelID'];
      $AThirdQuery = "SELECT * FROM Hotels WHERE HotelID= {$HotelID}";
      $ExecuteThird = mysqli_query($connection, $AThirdQuery);
      $ThirdResults = mysqli_fetch_assoc($ExecuteThird);
      $HotelName = $ThirdResults['HotelName'];
      $Price = $tuple['Price'];


      $checkIn = $tuples['CheckIn'];
      $checkOut = $tuples['CheckOut'];
      $Adults= $tuples['NbOfAdults'];
      $Children= $tuples['NbOfChildren'];

      echo "<tr>";
      echo "<td>$room_ID</td>";
      echo "<td>$HotelName</td>";
      echo "<td>$Adults</td>";
      echo "<td>$Children</td>";
      echo "<td>$checkIn</td>";
      echo "<td>$checkOut</td>";
      echo "<td>$Price</td>";
      echo "<td><a href='bookings.php?delete={$booking_ID}'>Cancel</a></td>";
      echo "</tr>";
    }

      ?>
  </tbody>
</table>

  </tbody>
</table>
<hr>

            </div>
          </div>


          </div>
        </div>
    </div>
    <!-- /.row -->

</div>
            <!-- /.container-fluid -->

<?php include "includes/user_footer.php"?>
