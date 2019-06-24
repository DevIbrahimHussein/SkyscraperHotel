<!DOCTYPE html>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'includes/db.php' ?>

<?php
$RoomID = $_GET['RoomID'];
if(isset($_SESSION['role'])){
  $userID = $_SESSION['user_id'];
} else {
  $userID = "";
}
if(isset($_POST['book_room'])) {
  $arrivalDate = $_POST['arrival'];
  $departureDate = $_POST['departure'];
  $adults = $_POST['adultNb'];
  $children = $_POST['childrenNb'];
  $BookChamber ="INSERT INTO booking(UserID, RoomID, CheckIn, CheckOut, NbOfAdults, NbOfChildren) VALUES ({$userID}, {$RoomID}, '{$arrivalDate}', '{$departureDate}', {$adults}, {$children})";

  if(isset($_POST['Breakfast_service'])){
    $breakfast_service = $_POST['Breakfast_service'];
    $breakfast_service = (int)$breakfast_service ;
    $breakfast_service_query = " INSERT INTO userservices(ServiceID,UserID)
                                  VALUES ($breakfast_service,$userID) ";
    $breakfast_service_query_result = mysqli_query($connection,$breakfast_service_query) or die('query error');
  }
  if(isset($_POST['carRental_service'])){
    $carRental_service = $_POST['carRental_service'];
    $carRental_service = (int)$carRental_service ;
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
    $airportHotelTransportations_service_query = "INSERT INTO userservices(ServiceID,UserID)
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
  $Execute = mysqli_query($connection,$BookChamber) or die('insert query error');
    header("Location: user.php");
}

 ?>


<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
  <link href="roomprofiles.css" type="text/css" rel="stylesheet">

  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <?php
  $AQuery = "SELECT * FROM Rooms WHERE RoomID = {$RoomID}";
  $ExecutingThisQuery = mysqli_query($connection, $AQuery);
  while($row = mysqli_fetch_assoc($ExecutingThisQuery)){
    $roomID = $row['RoomID'];
    $roomImage = $row['ImageID'];
    $roomName = $row['RoomName'];
    $roomType = $row['Type'];
    $roomPrice = $row['Price'];
    $roomDescription = $row['Description'];
    $RoomNbOfBeds = $row['NbOfBeds'];
    $SizeOfBeds = $row['SizeOfBeds'];
    $view = $row['View'];
    $floor = $row['Floor'];
  }
  $AnotherQuery = "SELECT * FROM Images WHERE ImageID = $roomImage";
  $ExecuteIT = mysqli_query($connection, $AnotherQuery);
  while($tuple = mysqli_fetch_assoc($ExecuteIT)) {
    $roomPrimary = $tuple['Image1'];
    $roomSecondary = $tuple['Image2'];
    $roomTertiary = $tuple['Image3'];
    $roomFourth = $tuple['Image4'];
    $roomFifth = $tuple['Image5'];
  }
   ?>
  <div class="roomTypeTitle">
    <?php echo $roomName ?>
  </div>
  <div class="roomTypeTitle2">
    Prices start at
  </div>
  <div class="price">
    <b>$</b> <font size="40px" face="yeseva-one"><?php echo $roomPrice ?></font> /per night
  </div>

  <div class="container-fluid">
    <div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/<?php echo $roomPrimary; ?>" alt="">
      </div>

      <div class="item">
        <img src="img/<?php echo $roomSecondary; ?>" alt="">
      </div>

      <div class="item">
        <img src="img/<?php echo $roomTertiary; ?>" alt="">
      </div>

      <div class="item">
        <img src="img/<?php echo $roomFourth; ?>" alt="">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  </div>
<!--end cousel stuff -->

<div class="rDescription">
  Description
</div>
<div class="bodyText">
<?php echo $roomDescription ?>
</div>
<div class="h-divider"></div>

<div class="rDescription">
  Room Details
</div>
<div class="bodyText">
  <ul>
    <li><span>Adults: <?php echo $RoomNbOfBeds ?> </span></li>
    <li><span> Facilities: Bathroom tub and shower and hair Dryer, Digital Personal Safe, Free high
      speed Wi-Fi and cable internet access, HD flat-screen TV (including Satellite TV) </span></li>
    <li><span> Bed Type: <?php echo $RoomNbOfBeds ?> <?php echo $SizeOfBeds ?> Bed(s) </span></li>
  </ul>
</div>
<div class="h-divider"></div>

<?php
  if(isset($_SESSION['role'])){
    ?>
    <div class="rDescription">
      Reservation Form
    </div>
    <div class="bodyText">
      Required fields are followed by *
    </div>
    <div class="resForm">
      <?php include 'includes/reservationTable.php'; ?>
    <?php
  }
?>
</div>
</body>
</html>
