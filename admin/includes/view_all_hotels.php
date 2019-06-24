<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Hotel</th>
      <th>Motto</th>
      <th>Rating</th>
      <th>City</th>
      <th>Prices</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Tags</th>
      <th>Status</th>
      <th>Comments</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php


    $Query= "Select * From Hotels";
    $ExecuteHotels = mysqli_query($connection, $Query);
    if(!$ExecuteHotels){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteHotels)){
      $hotel_ID = $tuples['HotelID'];
      $HotelName = $tuples['HotelName'];
      $HotelRating = $tuples['HotelRating'];
      $HotelMotto = $tuples['HotelMotto'];
      $HotelPrices = $tuples['ApproximatePrice'];
      $HotelEmail =$tuples['Email'];
      $HotelCity = $tuples['CityID'];
      $HotelStatus = $tuples['HotelStatus'];
      $CommentCount = $tuples['CommentCount'];
      $HotelTags = $tuples['HotelTags'];
      $HotelNumber = $tuples['PhoneNumber'];

      echo "<tr>";
      echo "<td>$hotel_ID</td>";
      echo "<td>$HotelName</td>";
      echo "<td>$HotelMotto</td>";
      echo "<td>$HotelRating</td>";
      $CityQueryID = "Select * From City WHERE CityID={$HotelCity}";
      $selectCityID = mysqli_query($connection, $CityQueryID);
      $row = mysqli_fetch_assoc($selectCityID);
      $city_name = $row['CityName'];
      echo "<td>$city_name</td>";
      echo "<td>$HotelPrices</td>";
      echo "<td>$HotelEmail</td>";
      echo "<td>$HotelNumber</td>";
      echo "<td>$HotelTags</td>";
      echo "<td>$HotelStatus</td>";
      echo "<td>$CommentCount</td>";




      // echo "<td>$post_status</td>";
      // echo "<td><img width='100' src='../images/$post_image'></td>";
      // echo "<td>$post_tags</td>";
      // echo "<td>$post_comments</td>";
      // echo "<td>$post_date</td>";
      echo "<td><a href='hotels.php?source=edit_hotel&hotel_id={$hotel_ID}'>Edit</a></td>";
      echo "<td><a href='hotels.php?delete={$hotel_ID}'>Delete</a></td>";
      echo "</tr>";
    }


      ?>
  </tbody>
</table>


<?php

if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteHotelQuery = "Delete From Hotels Where HotelID={$deleteID}";
  $deleteHotel = mysqli_query($connection, $deleteHotelQuery);
  header("Location: hotels.php");
}


 ?>
