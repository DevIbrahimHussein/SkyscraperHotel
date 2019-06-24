<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Room</th>
      <th>Type</th>
      <th>View</th>
      <th>Floor</th>
      <th>Bed Number</th>
      <th>Bed Size</th>
      <th>Description</th>
      <th>Prices</th>
      <th>ImageID</th>
      <th>HotelID</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php


    $Query= "Select * From Rooms";
    $ExecuteRooms = mysqli_query($connection, $Query);
    if(!$ExecuteRooms){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteRooms)){
      $room_ID = $tuples['RoomID'];
      $room_name = $tuples['RoomName'];
      $room_type = $tuples['Type'];
      $room_description = $tuples['Description'];
      $room_view = $tuples['View'];
      $room_floor =$tuples['Floor'];
      $room_bed_number = $tuples['NbOfBeds'];
      $room_bed_size = $tuples['SizeOfBeds'];
      $room_price = $tuples['Price'];
      $room_images = $tuples['ImageID'];
      $hotelID = $tuples['HotelID'];

      echo "<tr>";
      echo "<td>$room_ID</td>";
      echo "<td>$room_name</td>";
      echo "<td>$room_type</td>";
      echo "<td>$room_view</td>";
      echo "<td>$room_floor</td>";
      echo "<td>$room_bed_number</td>";
      echo "<td>$room_bed_size</td>";
      echo "<td>$room_description</td>";
      echo "<td>$room_price</td>";
      echo "<td>$room_images</td>";
      echo "<td>$hotelID</td>";

      echo "<td><a href='rooms.php?source=edit_room&room_id={$room_ID}'>Edit</a></td>";
      echo "<td><a href='rooms.php?delete={$room_ID}'>Delete</a></td>";
      echo "</tr>";
    }


      ?>
  </tbody>
</table>


<?php

if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteRoomQuery = "Delete From Rooms Where RoomID={$deleteID}";
  $deleteRoom = mysqli_query($connection, $deleteRoomQuery);
  header("Location: rooms.php");
}


 ?>
