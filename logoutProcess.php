<?php

  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['role']);
  unset($_SESSION['user_id']);
  Header("Location:index.php");

 ?>
