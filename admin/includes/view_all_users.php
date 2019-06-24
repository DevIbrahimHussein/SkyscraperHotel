<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Gender</th>
      <th>Age</th>
      <th>Address</th>
      <th>Phone Number</th>
      <th>City</th>
      <th>Role</th>

      <th>Make Admin</th>
      <th>Make Subscriber</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $Query= "Select * From Users";
    $ExecuteUsers = mysqli_query($connection, $Query);
    if(!$ExecuteUsers){
      die("Something went wrong... ".mysqli_error());
    }

    while($tuples = mysqli_fetch_assoc($ExecuteUsers)){
      $user_id = $tuples['UserID'];
      $email = $tuples['Email'];
      $password = $tuples['Password'];
      $fname = $tuples['FirstName'];
      $lname = $tuples['LastName'];
      $phoneNumber = $tuples['PhoneNumber'];
      $address = $tuples['Address'];
      $city = $tuples['CityID'];
      $age = $tuples['Age'];
      $gender = $tuples['Gender'];
      $role = $tuples['Role'];

      echo "<tr>";
      echo "<td>$user_id</td>";
      echo "<td>$email</td>";
      echo "<td>$fname</td>";
      echo "<td>$lname</td>";
      echo "<td>$gender</td>";
      echo "<td>$age</td>";
      echo "<td>$address</td>";
      echo "<td>$phoneNumber</td>";

      $CityQueryID = "Select * From City WHERE CityID={$city}";
      $selectCityID = mysqli_query($connection, $CityQueryID);
      $row = mysqli_fetch_assoc($selectCityID);
      $city_name = $row['CityName'];

      echo "<td>$city_name</td>";
      echo "<td>$role</td>";


      // $subQuery = "Select * From Posts Where post_id= $comment_post_id";
      // $executeSubQuery = mysqli_query($connection, $subQuery);
      //
      // while($info = mysqli_fetch_assoc($executeSubQuery)){
      // $post_id = $info['post_id'];
      // $post_title = $info['post_title'];
      // echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
      // }


      // $CategoriesQueryID = "Select * From Category WHERE cat_id={$post_categories}";
      // $selectCategoriesID = mysqli_query($connection, $CategoriesQueryID);
      // $row = mysqli_fetch_assoc($selectCategoriesID);
      // $cat_title = $row['cat_title'];
      // echo "<td>$cat_title</td>";
      echo "<td><a href='users.php?switch_to_admin={$user_id}'>Admin</a></td>";
      echo "<td><a href='users.php?switch_to_subscriber={$user_id}'>Subscriber</a></td>";
      echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
      echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
      echo "</tr>";
    }

      ?>
  </tbody>
</table>


<!-- <?php

if(isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $deleteUser = "Delete From Users Where UserID={$deleteID}";
  $deleting = mysqli_query($connection, $deleteUser);
  header("Location: users.php");
}

if(isset($_GET['switch_to_admin'])) {
  $theID = $_GET['switch_to_admin'];
  $PowerToThePeople = "UPDATE Users SET Role='admin' Where UserID={$theID}";
  $AdminAUser = mysqli_query($connection, $PowerToThePeople);
  header("Location: users.php");
}

if(isset($_GET['switch_to_subscriber'])) {
  $AdminID = $_GET['switch_to_subscriber'];
  $Revolt = "UPDATE Users SET Role='subscriber' Where UserID={$AdminID}";
  $Downgrade = mysqli_query($connection, $Revolt);
  header("Location: users.php");
}

 ?>
 -->
