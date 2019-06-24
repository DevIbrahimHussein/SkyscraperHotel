<?php include 'includes/user_header.php' ?>

<?php
                      $thatId = $_SESSION['user_id'];
                      if(isset($_POST['edit_user'])){
                              $email = $_POST['email'];
                              $password = $_POST['password'];
                              $firstName = $_POST['user_firstname'];
                              $lastName = $_POST['user_lastname'];
                              $gender = $_POST['gender'];
                              $phoneNumber = $_POST['phoneNumber'];
                              $address = $_POST['address'];
                              $city = $_POST['usercity'];
                              $age = $_POST['age'];

                              $query= "UPDATE Users SET ";
                              $query .="FirstName = '{$firstName}', ";
                              $query .="LastName = '{$lastName}', ";
                              $query .="Address = '{$address}', ";
                              $query .="PhoneNumber = '{$phoneNumber}', ";
                              $query .="Age = '{$age}', ";
                              $query .="Gender = '{$gender}', ";
                              $query .="CityID = '{$city}', ";
                              $query .="Email = '{$email}', ";
                              $query .="Password = '{$password}' WHERE UserID= {$thatId}";
                              $edit_user = mysqli_query($connection, $query);

                            }
                             ?>

        <div id="wrapper">
        <?php include 'includes/user_navigation.php' ?>
        <div id="page-wrapper">
          <div class="container-fluid">

              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          Welcome User!
                          <small><?php echo $_SESSION['username']; ?></small>
                      </h1>
                    </div>
                  </div>
            <div class="row">
              <div class="panel-body">
                    <form class="form-horizontal">
                      <?php
                        $UserEditQuery= "Select * From Users WHERE UserID= {$thatId}";
                        $ExecuteEdit = mysqli_query($connection, $UserEditQuery);
                        if(!$ExecuteEdit){
                          die("Something went wrong... ".mysqli_error());
                        }

                        while($tuples = mysqli_fetch_assoc($ExecuteEdit)){
                          $user_id = $tuples['UserID'];
                          $email = $tuples['Email'];
                          $password = $tuples['Password'];
                          $fname = $tuples['FirstName'];
                          $lname = $tuples['LastName'];
                          $gender = $tuples['Gender'];
                          $age = $tuples['Age'];
                          $address = $tuples['Address'];
                          $phoneNumber = $tuples['PhoneNumber'];
                          $city = $tuples['CityID'];
                          $role = $tuples['Role'];
                      }

                       ?>

                      <form action="user.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="title">FirstName</label>
                          <input type="text" name="user_firstname" value="<?php echo $fname ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="title">Last Name</label>
                          <input type="text" name="user_lastname" value="<?php echo $lname ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <select name="gender" id="gender">
                            <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>&nbsp;&nbsp;
                        </div>

                        <div class="form-group">
                          <label for="age">Age:</label>&nbsp;
                          <input type="number" name="age" min="18" max="100" value="<?php echo $age ?>">
                        </div>

                        <div class="form-group">
                          <label for="post_status">Email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                        </div>

                        <div class="form-group">
                          <label for="post_tags">Password</label>
                          <input type="password" name="password" value="<?php echo $password ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="post_tags">Phone Number</label>
                          <input type="number" name="phoneNumber" value="<?php echo $phoneNumber ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="title">Address</label>
                          <input type="text" name="address" value="<?php echo $address ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="hotel_city">City: </label>&nbsp;
                          <select name="usercity" id="usercity">
                            <?php
                            $CityQueryID = "Select * From City WHERE CityID={$city}";
                            $selectCityID = mysqli_query($connection, $CityQueryID);
                            $row = mysqli_fetch_assoc($selectCityID);
                            $city_name = $row['CityName'];
                             ?>
                             <option value="<?php echo $city_name ?>"><?php echo $city_name ?></option>
                            <?php
                            $CityQueryID = "Select * From City";
                            $selectCityID = mysqli_query($connection, $CityQueryID);

                            while($row = mysqli_fetch_assoc($selectCityID)){
                              $city_id = $row['CityID'];
                              $city_name = $row['CityName'];

                              echo "<option value='{$city_id}'>{$city_name}</option>";

                            }

                             ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <input type="submit" name="edit_user" value="Edit User" class="btn btn-primary">
                        </div>

                      </form>

        </div>

<?php include 'includes/user_footer.php' ?>
