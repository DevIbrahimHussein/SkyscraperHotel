<?php

    if(isset($_GET['p_id'])){

      $thepostID = $_GET['p_id'];

    }

    $Query= "Select * From Posts WHERE post_id= {$thepostID}";
    $select_posts_by_id = mysqli_query($connection, $Query);
    if(!$select_posts_by_id){
      die("Something went wrong... ".mysqli_error());
    }

      $tuples = mysqli_fetch_assoc($select_posts_by_id);
      $post_ID = $tuples['post_id'];
      $post_author = $tuples['post_author'];
      $post_title = $tuples['post_title'];
      $post_categories = $tuples['post_category_id'];
      $post_status = $tuples['post_status'];
      $post_image = $tuples['post_image'];
      $post_tags = $tuples['post_tags'];
      $post_content = $tuples['post_content'];
      $post_comments = $tuples['post_comment_count'];
      $post_date = $tuples['post_date'];

      if(isset($_POST['update_post'])){
        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_categories = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){
          $query= "Select * From Posts Where post_id = $thepostID";
          $select_Image = mysqli_query($connection, $query);
          while($row = mysqli_fetch_array($select_Image)){
            $post_image = $row['post_image'];
          }
        }

        $query= "UPDATE Posts SET ";
        $query .="post_title = '{$post_title}', ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_date = now(), ";
        $query .="post_category_id = '{$post_categories}', ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_image = '{$post_image}', ";
        $query .="post_tags = '{$post_tags}', ";
        $query .="post_content = '{$post_content}' Where post_id= '{$thepostID}'";

        $update = mysqli_query($connection, $query);
        confirmQuery($update);

      }



 ?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
  </div>


  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" name="post_title" class="form-control">
  </div>

  <div class="form-group">
    <select name="post_category" id="post_category">
      <?php

      $CategoriesQueryID = "Select * From Category";
      $selectCategoriesID = mysqli_query($connection, $CategoriesQueryID);

      confirmQuery($selectCategoriesID);

      while($row = mysqli_fetch_assoc($selectCategoriesID)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='{$cat_id}'>{$cat_title}</option>";

      }

       ?>
    </select>
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" value="<?php echo $post_author; ?>" name="post_author" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" name="post_status" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" value="<?php echo $post_image; ?>" name="post_image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
      <?php echo $post_content; ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
  </div>

</form>
