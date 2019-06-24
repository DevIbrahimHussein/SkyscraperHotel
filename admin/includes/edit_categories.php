<form class="" action="" method="post">
  <div class="form-group">
    <label for="cat_title">Edit Category</label>

    <?php
    if(isset($_GET['edit'])){
      $get_id =$_GET['edit'];
      $CategoriesQueryID = "Select * From Category WHERE cat_id={$get_id}";
      $selectCategoriesID = mysqli_query($connection, $CategoriesQueryID);
      while($row = mysqli_fetch_assoc($selectCategoriesID)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

     ?>

       <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">


   <?php }} ?>

   <?php

   if(isset($_POST['Update'])){ //UPDATING QUERY
     $to_be_updated= $_POST['cat_title'];
     $UpdateQuery = "UPDATE Category SET cat_title='{$to_be_updated}' WHERE cat_id = {$cat_id}";
     $ExecuteUpdate = mysqli_query($connection, $UpdateQuery);
     if(!$ExecuteUpdate){
       die("Category not updated! ".mysqli_error());
     }
     header("Location: categories.php");
   }


    ?>



  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="Update" value="Update">
  </div>
</form>
