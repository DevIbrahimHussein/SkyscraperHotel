<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'includes/db.php' ?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
  <link href="hotelprofiles.css" type="text/css" rel="stylesheet">
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
  <?php
  $HotelID = $_GET['HotelID'];
  $query = "SELECT * FROM Hotels WHERE HotelID= {$HotelID}";
  $exec = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($exec)){
    $hotelName= $row['HotelName'];
    $hotelRating= $row['HotelRating'];
    $hotelDes1= $row['HotelDescription1'];
    $hotelDes2= $row['HotelDescription2'];
    $hotelDes3= $row['HotelDescription3'];
    $hotelMotto= $row['HotelMotto'];
    $hotelImages= $row['ImageID'];
    $hotelCity= $row['CityID'];
    $hotelEmail= $row['Email'];
    $hotelPhoneNumber= $row['PhoneNumber'];
  }

  $selectImages = "SELECT * FROM Images WHERE ImageID = {$hotelImages}";
  $getImages = mysqli_query($connection, $selectImages);
  $tuple = mysqli_fetch_assoc($getImages);
  $PrimaryImage = $tuple['Image1'];
  $SecondaryImage = $tuple['Image2'];
  $TertiaryImage = $tuple['Image3'];
  $FourthImage = $tuple['Image4'];
  $FifthImage = $tuple['Image5'];
   ?>
  <div class="container-fluid">
    <div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/<?php echo $PrimaryImage ?>" alt="w">
        <div class="carousel-caption">
          <div class = "text-box">
            <h1> Spend your best holiday at our hotel <br><br><br><br><br><br></h1>
          </div>
        </div>
        </div>

      <div class="item">
        <img src="img/<?php echo $SecondaryImage ?>" alt="w">
        <div class="carousel-caption">
          <div class = "text-box">
            <h1> Enjoy our accommodations <br><br><br><br><br><br></h1>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="img/<?php echo $TertiaryImage ?>" alt="w">
        <div class="carousel-caption">
          <div class = "text-box">
            <h1> Relish the great view <br><br><br><br><br><br></h1>
          </div>
        </div>
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


<div class="container-fluid">
<div class="row">
  <div class="col-lg-6">
<div class = "greyBg">
  <div class="title1">
    WELCOME TO THE
  </div>
  <div class="regTitle">
    <?php echo $hotelName ?>
  </div>
  <div class="hotelDesc">
    <?php echo $hotelDes1 ?>
  </div>
    </div>
    </div>
  <div class = "greyBg">
  <div class="col-lg-6">
  <img class="hotelImg" src="img/<?php echo $FourthImage ?>" alt="hotel">
</div>
</div>
</div>
</div>
  <br><br><br><br>

  <div class="container-fluid">
    <div class="titleI"> PLENTY OF ROOMS..</div>
    <div class="titleII"> Rooms & Suites </div>
    <div class="roomsDesc">
      <?php echo $hotelDes2 ?>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">

<?php
 $selectRooms = "SELECT * FROM Rooms WHERE HotelID={$HotelID}";
 $getRooms = mysqli_query($connection, $selectRooms);
 $i=0;
 while($i<3 && $info = mysqli_fetch_assoc($getRooms)){
   $i++;
   $roomID = $info['RoomID'];
   $roomImage = $info['ImageID'];
   $roomName = $info['RoomName'];
   $roomType = $info['Type'];
   $roomPrice = $info['Price'];
   $RoomNbOfBeds = $info['NbOfBeds'];
   $SizeOfBeds = $info['SizeOfBeds'];
   $view = $info['View'];
   $floor = $info['Floor'];
 ?>

      <div class="col-lg-4">
        <div class="greyBg2">
          <?php
            $SelectRoomImages = "SELECT * FROM Images WHERE ImageID = '{$roomImage}'";
            $GetRoomImages = mysqli_query($connection, $SelectRoomImages);
            while($data = mysqli_fetch_assoc($GetRoomImages)){
              $Pimage = $data['Image1'];
           ?>
        <img class="roomImages" src="img/<?php echo $Pimage ?>">
      <?php } ?>
      </div>
      <div class="roomTitle"> <?php echo $roomName ?> </div>
      <div class="roomPrice">
      <b>$</b> <font size="40px" face="yeseva-one"><?php echo $roomPrice ?></font> <b>/per night</b>
    </div>
    <ul>
      <li><?php echo $roomType ?> Room</li>
      <li>A <?php echo $SizeOfBeds ?> bed</li>
      <li>Concierge Services</li>
    </ul>
      <a href="room.php?RoomID=<?php echo $roomID ?>" style="text-decoration:none;" class="buttonHotel1"> Book Now! </a>
      </div>


    <?php } ?>

<br><br>

<div class="container-fluid">
<div class="row">
  <div class="col-lg-6">
<div class = "greyBg">
  <div class="title1">
    ENJOY OUR
  </div>
  <div class="regTitle">
    Bar, Spa & Dining Experience
  </div>
  <div class="amenitiesDesc">
  <?php echo $hotelDes3 ?>
  </div>
</div>
</div>
<!--end of column 1-->

<div class = "greyBg">
<div class="col-lg-6">
<img class="hotelImg" src="img/<?php echo $FifthImage ?>" alt="hotel">
</div>
</div>
<!--end of column 2-->
</div>
</div>

</body>
</html>
