<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Primary Image</th>
      <th>Secondary Image</th>
      <th>Ternary Image</th>
      <th>Display Image</th>
      <th>Lounge Image</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php


    $Query= "Select * From Images";
    $ExecuteImages = mysqli_query($connection, $Query);
    if(!$ExecuteImages){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteImages)){
      $imageID = $tuples['ImageID'];
      $image1 = $tuples['Image1'];
      $image2 = $tuples['Image2'];
      $image3 = $tuples['Image3'];
      $image4 =$tuples['Image4'];
      $image5 = $tuples['Image5'];

      echo "<tr>";
      echo "<td>$imageID</td>";
      echo "<td><img width='100' src='../img/$image1'></td>";
      echo "<td><img width='100' src='../img/$image2'></td>";
      echo "<td><img width='100' src='../img/$image3'></td>";
      echo "<td><img width='100' src='../img/$image4'></td>";
      echo "<td><img width='100' src='../img/$image5'></td>";



      // echo "<td>$post_status</td>";
      // echo "<td><img width='100' src='../images/$post_image'></td>";
      // echo "<td>$post_tags</td>";
      // echo "<td>$post_comments</td>";
      // echo "<td>$post_date</td>";
      echo "<td><a href='images.php?source=edit_hotel&p_id={$imageID}'>Edit</a></td>";
      echo "<td><a href='images.php?delete={$imageID}'>Delete</a></td>";
      echo "</tr>";
    }


      ?>
  </tbody>
</table>


<?php

if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteImageQuery = "Delete From Images Where ImageID={$deleteID}";
  $deleteImage = mysqli_query($connection, $deleteImageQuery);
  header("Location: images.php");
}


 ?>
