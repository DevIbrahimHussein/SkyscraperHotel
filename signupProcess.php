<?php
  session_start();
  if(isset($_POST['signup_submit_button'])){
    require 'includes/db.php'; // opening connection to server and db
      // initailize variables
    $firstName = $_POST['signup_fName'];
    $lastName = $_POST['signup_lName'];
    $age = $_POST['signup_age'];
    $gender = $_POST['signup_gender'];
    $address = $_POST['signup_address'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
    $phoneNumber = $_POST['signup_phoneNumber'];
    // $city = $_POST['signup_city'];
    $user = "subscriber";

        // queries to retrieve data from db
        $insertQuery = "INSERT INTO users(Email,Password,FirstName,LastName,PhoneNumber,Address,CityID,Gender,Age,Role)
                          VALUES('$email','$password','$firstName','$lastName','$phoneNumber','$address',
                                      '4','$gender','$age','$user')";

          mysqli_query($connection,$insertQuery) or die("Error!");
          include 'includes/fullName.php';
          Header('Location:index.php');
        } else {
          echo "Email is taken!";
        }

 ?>
