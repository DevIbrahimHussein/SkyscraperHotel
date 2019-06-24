<?php


function confirmQuery($result) {

  global $connection;

  if(!$result) {
    die("Query failed! ".mysqli_error($connection));
  }
}


function insertCity() {

  global $connection;

  if(isset($_POST['submit'])){
    $title= $_POST['CityName'];
    if(empty($title)){
      echo "<label for='CityName'>Field cannot be empty!</label>";
    }
    else{
    $query = "INSERT INTO City(CityName) VALUE('{$title}')";
    $executeQuery = mysqli_query($connection, $query);
    if(!$executeQuery){
      die("Query failed!".mysqli_error($connection));
    }
  }
  }

}


function insertService() {

  global $connection;

  if(isset($_POST['submit'])){
    $title= $_POST['ServiceName'];
    $desciption = $_POST['ServiceDescription'];
    $price = $_POST['ServicePrice'];
    if(empty($title)){
      echo "<label for='ServiceName'>Field cannot be empty!</label>";
    }
    else{
    $query = "INSERT INTO Services(ServiceName, Description, Price) VALUE('{$title}', '{$desciption}', {$price})";
    $executeQuery = mysqli_query($connection, $query);
    if(!$executeQuery){
      die("Query failed!".mysqli_error($connection));
    }
  }
  }

}

function deleteCategory() {
  global $connection;
  if(isset($_GET['delete'])){
    $to_be_deleted= $_GET['delete'];
    $DeleteQuery = "DELETE FROM City WHERE CityID = {$to_be_deleted}";
    $ExectueDeletion = mysqli_query($connection, $DeleteQuery);
    if(!$ExectueDeletion){
      die("Category not deleted! ".mysqli_error($connection));
    }
    header("Location: categories.php");
  }

}

function deleteService() {
  global $connection;
  if(isset($_GET['delete'])){
    $to_be_deleted= $_GET['delete'];
    $DeleteQuery = "DELETE FROM Services WHERE ServiceID = {$to_be_deleted}";
    $ExectueDeletion = mysqli_query($connection, $DeleteQuery);
    if(!$ExectueDeletion){
      die("Service not deleted! ".mysqli_error($connection));
    }
    header("Location: services.php");
  }

}







 ?>
