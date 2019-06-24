<?php

if(isset($_POST['create_hotel'])){

$hotel_name = $_POST['hotel_name'];
$hotel_city = $_POST['hotel_city'];
$hotel_rating = $_POST['hotel_rating'];
$hotel_motto = $_POST['hotel_motto'];

// $post_image = $_FILES['image']['name'];
// $post_image_temp = $_FILES['image']['tmp_name'];
$hotel_images= $_POST['hotel_images'];
$hotel_description = $_POST['hotel_description'];
$hotel_suites = $_POST['suites_description'];
$hotel_services = $_POST['services_description'];
$email = $_POST['hotel_email'];
$price = $_POST['hotel_price'];
$hotel_number = $_POST['hotel_number'];
$hotel_tags = $_POST['hotel_tags'];
$hotel_status = $_POST['hotel_status'];

//move_uploaded_file($post_image_temp, "../images/$post_image");



$query = "INSERT INTO Hotels(HotelName, HotelRating, HotelDescription1, HotelDescription2, HotelDescription3, HotelMotto, ApproximatePrice, ImageID, CityID, Email, PhoneNumber, HotelStatus, HotelTags, CommentCount)";
$query .=" VALUES('{$hotel_name}', {$hotel_rating}, '{$hotel_description}', '{$hotel_suites}', '{$hotel_services}', '{$hotel_motto}', {$price}, {$hotel_images}, '{$hotel_city}', '{$email}', {$hotel_number}, '{$hotel_status}', '{$hotel_tags}', 4) ";

$create_hotel = mysqli_query($connection, $query);

confirmQuery($create_hotel);

}




 ?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Hotel Name:</label>
    <input type="text" name="hotel_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="hotel_city">City: </label>&nbsp;
    <select name="hotel_city" id="hotel_city">
      <?php

      $CityQueryID = "Select * From City";
      $selectCityID = mysqli_query($connection, $CityQueryID);

      confirmQuery($selectCityID);

      while($row = mysqli_fetch_assoc($selectCityID)){
        $city_id = $row['CityID'];
        $city_name = $row['CityName'];

        echo "<option value='{$city_id}'>{$city_name}</option>";

      }

       ?>
    </select>
    &nbsp;&nbsp;
    <label for="title">Hotel Rating: </label>&nbsp;
    <select name="hotel_rating" id="hotel_rating">
      <option value="1">1 star</option>
      <option value="2">2 star</option>
      <option value="3">3 star</option>
      <option value="4">4 star</option>
      <option value="5">5 star</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_content">Hotel Motto: </label>
    <input type="text" name="hotel_motto" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_status">Hotel Description: </label>
    <textarea type="text" class="form-control" name="hotel_description" id="" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <label for="post_image">Suites Description: </label>
    <textarea type="text" class="form-control" name="suites_description" id="" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <label for="post_tags">Services Description: </label>
    <textarea type="text" class="form-control" name="services_description" id="" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <label for="post_content">Email: </label>
    <input type="text" name="hotel_email" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">ImageID: </label>
    <input type="text" name="hotel_images" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Phone Number: </label>
    <input type="text" name="hotel_number" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Price Range: </label>
    <input type="int" name="hotel_price" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Hotel Status: </label>
    <select name="hotel_status" id="hotel_status">
      <option value="public">Published</option>
      <option value="private">Unpublished</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_status">Hotel Tags: </label>
    <textarea type="text" class="form-control" name="hotel_tags" id="" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="create_hotel" value="Publish Hotel" class="btn btn-primary">
  </div>

</form>
