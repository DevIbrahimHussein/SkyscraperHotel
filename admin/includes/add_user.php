<?php

if(isset($_POST['create_user'])){

$firstName = $_POST['user_firstname'];
$lastName = $_POST['user_lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['user_role'];
$phoneNumber = $_POST['phoneNumber'];
$age = $_POST['age'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$city = $_POST['usercity'];


// $post_image = $_FILES['image']['name'];
// $post_image_temp = $_FILES['image']['tmp_name'];
//
// move_uploaded_file($post_image_temp, "../images/$post_image");


$query = "INSERT INTO Users(Email, Password, FirstName, LastName, PhoneNumber, Address, CityID, Gender, Age, Role)";
$query .="VALUES('{$email}', '{$password}', '{$firstName}', '{$lastName}',{$phoneNumber}, '{$address}', {$city}, '{$gender}', {$age}, '{$role}') ";

$create_user = mysqli_query($connection, $query);

confirmQuery($create_user);

}


 ?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">FirstName</label>
    <input type="text" name="user_firstname" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <select name="gender" id="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>&nbsp;&nbsp;
    <select name="user_role" id="user_role">
      <option value="subscriber">Subscriber</option>
      <option value="admin">Admin</option>
    </select>
  </div>

  <div class="form-group">
    <label for="age">Age:</label>&nbsp;
    <input type="number" name="age" min="18" max="100">
  </div>

  <div class="form-group">
    <label for="post_status">Email</label>
    <input type="email" name="email" class="form-control">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->

  <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_tags">Phone Number</label>
    <input type="number" name="phoneNumber" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Address</label>
    <input type="text" name="address" class="form-control">
  </div>

  <div class="form-group">
    <label for="hotel_city">City: </label>&nbsp;
    <select name="usercity" id="usercity">
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
  </div>

  <div class="form-group">
    <input type="submit" name="create_user" value="Add User" class="btn btn-primary">
  </div>

</form>
