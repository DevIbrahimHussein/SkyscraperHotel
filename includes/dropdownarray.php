
<?php

    if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
      $username = "";
      $role = "";
    } else {
      $username = $_SESSION['username'];
      $user_role = $_SESSION['role'];
    }

    $adminDropDownMenu = array(

                  "Admin Page" => "admin/index.php",
                  "Logout" => "logoutProcess.php",

    );

    $userDropDownMenu = array(

                  "{$username}'s Page" => "user.php",
                  "Logout" => "logoutProcess.php",

    );

 ?>
