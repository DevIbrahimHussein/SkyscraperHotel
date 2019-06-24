<?php

if(isset($_POST['create_image'])){

$post_primary_image = $_FILES['Primary_image']['name'];
$post_primary_image_temp = $_FILES['Primary_image']['tmp_name'];

$post_secondary_image = $_FILES['Secondary_image']['name'];
$post_secondary_image_temp = $_FILES['Secondary_image']['tmp_name'];

$post_ternary_image = $_FILES['Ternary_image']['name'];
$post_ternary_image_temp = $_FILES['Ternary_image']['tmp_name'];

$post_display_image = $_FILES['Display_image']['name'];
$post_display_image_temp = $_FILES['Display_image']['tmp_name'];

$post_lounge_image = $_FILES['Lounge_image']['name'];
$post_lounge_image_temp = $_FILES['Lounge_image']['tmp_name'];

move_uploaded_file($post_primary_image_temp, "../img/$post_primary_image");
move_uploaded_file($post_secondary_image_temp, "../img/$post_secondary_image");
move_uploaded_file($post_ternary_image_temp, "../img/$post_ternary_image");
move_uploaded_file($post_display_image_temp, "../img/$post_display_image");
move_uploaded_file($post_lounge_image_temp, "../img/$post_lounge_image");


$query = "INSERT INTO Images(Image1, Image2, Image3, Image4, Image5)";
$query .=" VALUES('{$post_primary_image}', '{$post_secondary_image}', '{$post_ternary_image}', '{$post_display_image}', '{$post_lounge_image}') ";

$create_images = mysqli_query($connection, $query);

confirmQuery($create_images);

}




 ?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Primary Image:</label>
      <input type="file" name="Primary_image">
  </div>

  <div class="form-group">
    <label for="hotel_city">Secondary Image: </label>
    <input type="file" name="Secondary_image">
  </div>

  <div class="form-group">
    <label for="title">Ternary Image: </label>
    <input type="file" name="Ternary_image">

  </div>

  <div class="form-group">
    <label for="post_content">Display Image: </label>
    <input type="file" name="Display_image">
  </div>

  <div class="form-group">
    <label for="post_status">Lounge Image: </label>
    <input type="file" name="Lounge_image">
  </div>


  <div class="form-group">
    <input type="submit" name="create_image" value="Publish Images" class="btn btn-primary">
  </div>

</form>
