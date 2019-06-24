<?php

if(isset($_GET['edit_room'])) {
  $thatId = $_GET['edit_room'];
  $RoomEditQuery= "Select * From Rooms WHERE RoomID= {$thatId}";
  $ExecuteEdit = mysqli_query($connection, $RoomEditQuery);
  if(!$ExecuteEdit){
    die("Something went wrong... ".mysqli_error());
  }

  while($tuples = mysqli_fetch_assoc($ExecuteEdit)){
    $Room_id = $tuples['RoomID'];
    $RoomName = $tuples['RoomName'];
    $Type = $tuples['Type'];
    $Description = $tuples['Description'];
    $View = $tuples['View'];
    $Floor = $tuples['Floor'];
    $NbOfBeds = $tuples['NbOfBeds'];
    $SizeOfBeds = $tuples['SizeOfBeds'];
    $Price = $tuples['Price'];
    $ImageID = $tuples['ImageID'];
    $HotelID = $tuples['HotelID'];
}
}



if(isset($_POST['edit_room'])){
$room_name = $_POST['room_name'];
$room_type = $_POST['room_type'];
$room_bed_number = $_POST['room_bed_number'];
$room_bed_size = $_POST['room_bed_size'];
$room_view = $_POST['room_view'];
$room_description = $_POST['room_description'];
$room_floor = $_POST['room_floor'];
$room_price = $_POST['room_price'];
$room_images = $_POST['room_images'];
$room_hotel = $_POST['hotelID'];


        $query= "UPDATE Rooms SET ";
        $query .="RoomName = '{$room_name}', ";
        $query .="Type = '{$room_type}', ";
        $query .="Description = '{$room_description}', ";
        $query .="View = '{$room_view}', ";
        $query .="Floor = {$room_floor}, ";
        $query .="NbOfBeds = {$room_bed_number}, ";
        $query .="SizeOfBeds = '{$room_bed_size}', ";
        $query .="Price = {$room_price}, ";
        $query .="ImageID = '{$room_images}', ";
        $query .="HotelID = {$room_hotel}  WHERE RoomID= '{$Room_id}'";
        $edit_Room = mysqli_query($connection, $query);
        confirmQuery($edit_Room);

}




 ?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Room Name:</label>
    <input type="text" name="room_name" value="<?php echo $RoomName ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="room_images">Images: </label>&nbsp;
    <select name="room_images" id="room_images">
      <option value="<?php echo $ImageID ?>"><?php echo $ImageID ?></option>
      <?php

      $ImageQueryID = "Select * From Images";
      $selectImageID = mysqli_query($connection, $ImageQueryID);

      confirmQuery($selectImageID);

      while($row = mysqli_fetch_assoc($selectImageID)){
        $image_id = $row['ImageID'];

        echo "<option value='{$image_id}'>{$image_id}</option>";

      }

       ?>
    </select>
    &nbsp;&nbsp;
    <label for="title">Room Type: </label>&nbsp;
    <select name="room_type" id="room_type">
      <option value="<?php echo $Type ?>"><?php echo $Type ?></option>
      <option value="Standard">Standard</option>
      <option value="Superior">Superior</option>
      <option value="Presidential">Presidential</option>
      <option value="Suite">Suite</option>
    </select>
    &nbsp;&nbsp;
    <label for="room_view">Room View: </label>&nbsp;
    <select name="room_view" id="room_view">
      <option value="Sea View">Sea View</option>
      <option value="Mountain View">Mountain View</option>
      <option value="City View">City View</option>
      <option value="No View">No View</option>
    </select>

    <label for="hotel">Hotel: </label>&nbsp;
    <select name="hotel" id="hotelID">
      <?php $query = "Select * FROM Hotels Where HotelID={$HotelID}";
            $execution = mysqli_query($connection, $query);
            $r = mysqli_fetch_assoc($execution);
            $hotelName = $r['HotelName'];
       ?>

      <option value="<?php echo $HotelID ?>"><?php echo $hotelName ?></option>
      <?php $q= "Select * From Hotels";
            $e = mysqli_query($connection, $q);
            while($r = mysqli_fetch_assoc($e)){
              $hotelID = $r['HotelID'];
              $hotelName= $r['HotelName'];
      ?>
      <option value="<?php echo $hotelID ?>"><?php echo $hotelName ?></option>
      <?php
            }
       ?>
    </select>
  </div>

  </div>


  <div class="form-group">
    <label for="post_status">Room Description: </label>
    <textarea type="text" class="form-control" name="room_description" id="" cols="30" rows="10">
    </textarea>
  </div>


  <div class="form-group">
    <label for="post_content">Floor: </label>
    <input type="int" name="room_floor" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Price: </label>
    <input type="int" name="room_price" class="form-control">
  </div>

<div class="form-group">
    <label for="room_bed_number">Number Of Beds: </label>
    <select name="room_bed_number" id="room_bed_number">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    &nbsp;&nbsp;
  <label for="room_bed_size">Size Of Bed: </label>&nbsp;
  <select name="room_bed_size" id="room_bed_size">
    <option value="Single">Single</option>
    <option value="Double">Double</option>
    <option value="Queen">Queen</option>
    <option value="King">King</option>
  </select>
</div>

  <div class="form-group">
    <input type="submit" name="edit_Room" value="Edit Room" class="btn btn-primary">
  </div>

</form>
