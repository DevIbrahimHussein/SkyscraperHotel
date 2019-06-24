<?php include "includes/admin_header.php" ?>
<?php include "functions.php" ?>
<?php


if(isset($_POST['edit_user'])){
// $username = $_POST['username'];
        $username = $_SESSION['user_id'];
        $username = (int)$username ;
        $firstName = $_POST['user_firstname'];
        $lastName = $_POST['user_lastname'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $role = $_POST['user_role'];



        $query = " UPDATE Users SET ";
        $query .="FirstName = '{$firstName}', ";
        $query .="LastName = '{$lastName}', ";
        $query .="Email = '{$email}', ";
        // $query .="username = '{$username}', ";
        $query .="Password = '{$password}', ";
        $query .="Role = '{$role}' WHERE UserID= '{$username}'";
        $edit_user = mysqli_query($connection, $query) or die('error on line 22');
        confirmQuery($edit_user);

}


if(isset($_SESSION['username'])){
  $username = $_SESSION['user_id'];
  echo "$username";
  $query = "SELECT * FROM Users WHERE UserID = '{$username}'";
  $selectUserProfile = mysqli_query($connection, $query) or die('error on line 30') ;
  while($tuples = mysqli_fetch_array($selectUserProfile)){
    $user_id = $tuples['UserID'];
    // $username = $tuples['username'];
    $password = $tuples['Password'];
    $fname = $tuples['FirstName'];
    $lname = $tuples['LastName'];
    $email = $tuples['Email'];
    // $image = $tuples['user_image'];
    $role = $tuples['Role'];
  }
}

 ?>


<div id="wrapper">
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                      <h1 class="page-header">
                          Skyscraper
                          <small>Hotels</small>
                      </h1>

                      <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="title">FirstName</label>
                          <input type="text" name="user_firstname" value="<?php echo $fname ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="title">Last Name</label>
                          <input type="text" name="user_lastname" value="<?php echo $lname ?>" class="form-control">
                        </div>

                        <div class="form-group">

                          <select name="user_role" id="user_role">
                            <option value="<?php echo $role; ?>"><?php echo $role; ?></option>

                            <?php
                                if($role == 'admin') {
                                  echo "<option value='subscriber'>subscriber</option>";
                                }
                                else {
                                  echo "<option value='admin'>admin</option>";
                                }

                             ?>


                          </select>
                        </div>

                        <!-- <div class="form-group">
                          <label for="post_status">Username</label>
                          <input type="text" name="username" value="<?php echo $username ?>" class="form-control">
                        </div> -->

                        <div class="form-group">
                          <label for="post_tags">Email</label>
                          <input type="email" name="user_email" value="<?php echo $email ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="post_tags">Password</label>
                          <input type="password" name="user_password" value="<?php echo $password ?>" class="form-control">
                        </div>


                        <div class="form-group">
                          <input type="submit" name="edit_user" value="Update Profile" class="btn btn-primary">
                        </div>

                      </form>


                      </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php"?>
