<?php
session_start();
  if(isset($_POST['signin_submit_button'])){
      include 'includes/db.php'; // opening connection to server to db
      // variables for inputs
      $email = $_POST['signin_email'];
      $password = $_POST['signin_password'];
        // queries to retrieve from db
      $signin_user_query = " SELECT Email, Password
                                  FROM Users
                                    WHERE Email like '$email'
                                      and Password like '$password'
                                        and Role like 'subscriber'
                             ";
      $signin_admin_query = "SELECT Email, Password
                                FROM Users
                                  WHERE Email like '$email'
                                      and Password like '$password'
                                        and Role like 'admin'
                            ";
      $sign_user = mysqli_query($connection,$signin_user_query);
      $sign_admin = mysqli_query($connection,$signin_admin_query);

      if(mysqli_num_rows($sign_user) == 1){
        include 'includes/fullName.php';
        Header('Location:index.php');
      } else if(mysqli_num_rows($sign_admin) == 1){
        include 'includes/fullName.php';
        Header('Location:admin/index.php');
      }
  }// end of isset submit
 ?>
