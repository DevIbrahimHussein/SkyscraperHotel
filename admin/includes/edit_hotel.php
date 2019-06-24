<?php

    if(isset($_GET['hotel_id'])){
      $thehotelID = $_GET['hotel_id'];
    }

    $Query= "Select * From Hotels WHERE HotelID= {$thehotelID}";
    $select_hotel_by_id = mysqli_query($connection, $Query);
    if(!$select_hotel_by_id){
      die("Something went wrong... ".mysqli_error());
    }

      $tuples = mysqli_fetch_assoc($select_hotel_by_id);
      $HotelID = $tuples['HotelID'];
      $HotelName = $tuples['HotelName'];
      $HotelRating = $tuples['HotelRating'];
      $HotelDescription = $tuples['HotelDescription1'];
      $HotelSuites = $tuples['HotelDescription2'];
      $HotelSpa = $tuples['HotelDescription3'];
      $HotelMotto = $tuples['HotelMotto'];
      $ApproximatePrice = $tuples['ApproximatePrice'];
      $ImageID = $tuples['ImageID'];
      $CityID = $tuples['CityID'];
      $Email = $tuples['Email'];
      $PhoneNumber = $tuples['PhoneNumber'];
      $HotelStatus = $tuples['HotelStatus'];
      $HotelTags = $tuples['HotelTags'];


      if(isset($_POST['update_hotel'])){
        $hotel_name = $_POST['hotel_name'];
        $hotel_city = $_POST['hotel_city'];
        $hotel_rating = $_POST['hotel_rating'];
        $hotel_motto = $_POST['hotel_motto'];
        $hotel_images= $_POST['hotel_images'];
        $hotel_description = $_POST['hotel_description'];
        $hotel_suites = $_POST['suites_description'];
        $hotel_services = $_POST['services_description'];
        $email = $_POST['hotel_email'];
        $price = $_POST['hotel_price'];
        $hotel_number = $_POST['hotel_number'];
        $hotel_tags = $_POST['hotel_tags'];
        $hotel_status = $_POST['hotel_status'];

        $query= "UPDATE Hotels SET ";
        $query .="HotelName = '{$hotel_name}', ";
        $query .="HotelRating = {$hotel_rating}, ";
        $query .="CityID = {$hotel_city}, ";
        $query .="HotelStatus = '{$hotel_status}', ";
        $query .="ImageID = {$hotel_images}, ";
        $query .="HotelMotto = '{$hotel_motto}', ";
        $query .="HotelDescription2 = '{$hotel_suites}', ";
        $query .="HotelDescription3 = '{$hotel_services}', ";
        $query .="Email = '{$email}', ";
        $query .="ApproximatePrice = {$price}, ";
        $query .="PhoneNumber = '{$hotel_number}', ";
        $query .="HotelTags = '{$hotel_tags}', ";
        $query .="HotelDescription1 = '{$hotel_description}' Where HotelID= '{$thehotelID}'";

        $update = mysqli_query($connection, $query);
        confirmQuery($update);

      }



 ?>


 <form action="" method="post" enctype="multipart/form-data">

   <div class="form-group">
     <label for="title">Hotel Name:</label>
     <input type="text" name="hotel_name" value="<?php echo $HotelName ?>" class="form-control">
   </div>

   <div class="form-group">
     <label for="hotel_city">City: </label>&nbsp;
     <select name="hotel_city" id="hotel_city">
       <?php
       $CityQueryID = "Select * From City WHERE CityID={$CityID}";
       $selectCityID = mysqli_query($connection, $CityQueryID);
       $row = mysqli_fetch_assoc($selectCityID);
       $city_name = $row['CityName'];
        ?>
        <option value="<?php echo $CityID ?>"><?php echo $city_name ?></option>
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
       <option value="<?php echo $HotelRating ?>"><?php echo $HotelRating ?></option>
       <option value="1">1 star</option>
       <option value="2">2 star</option>
       <option value="3">3 star</option>
       <option value="4">4 star</option>
       <option value="5">5 star</option>
     </select>
   </div>

   <div class="form-group">
     <label for="post_content">Hotel Motto: </label>
     <input type="text" name="hotel_motto" value="<?php echo $HotelMotto ?>" class="form-control">
   </div>

   <div class="form-group">
     <label for="post_status">Hotel Description: </label>
     <textarea type="text" class="form-control" name="hotel_description" id="" cols="30" rows="10">
       <?php echo $HotelDescription ?>
     </textarea>
   </div>

   <div class="form-group">
     <label for="post_image">Suites Description: </label>
     <textarea type="text" class="form-control" name="suites_description" id="" cols="30" rows="10">
       <?php echo $HotelSuites ?>
     </textarea>
   </div>

   <div class="form-group">
     <label for="post_tags">Services Description: </label>
     <textarea type="text" class="form-control" name="services_description" id="" cols="30" rows="10">
       <?php echo $HotelSpa ?>
     </textarea>
   </div>

   <div class="form-group">
     <label for="post_content">Email: </label>
     <input type="text" name="hotel_email" class="form-control" value="<?php echo $Email ?>">
   </div>

   <div class="form-group">
     <label for="post_content">ImageID: </label>
     <input type="text" name="hotel_images" class="form-control" value="<?php echo $ImageID ?>">
   </div>

   <div class="form-group">
     <label for="post_content">Phone Number: </label>
     <input type="text" name="hotel_number" class="form-control" value="<?php echo $PhoneNumber ?>">
   </div>

   <div class="form-group">
     <label for="post_content">Price Range: </label>
     <input type="int" name="hotel_price" class="form-control" value="<?php echo $ApproximatePrice ?>">
   </div>

   <div class="form-group">
     <label for="post_content">Hotel Status: </label>
     <select name="hotel_status" id="hotel_status">
       <option value="<?php echo $HotelStatus ?>"><?php echo $HotelStatus ?></option>
       <option value="public">Published</option>
       <option value="private">Unpublished</option>
     </select>
   </div>

   <div class="form-group">
     <label for="post_status">Hotel Tags: </label>
     <textarea type="text" class="form-control" name="hotel_tags" id="" cols="30" rows="10">
       <?php echo $HotelTags ?>
     </textarea>
   </div>

   <div class="form-group">
     <input type="submit" name="update_hotel" value="Update Hotel" class="btn btn-primary">
   </div>

 </form>
