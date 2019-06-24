<?php

    $get_full_name = "SELECT UserID, FirstName, LastName, Role
                          FROM Users
                              WHERE Email like '$email'
                    ";
    $fullNameResult = mysqli_fetch_assoc(mysqli_query($connection,$get_full_name));

    $user_full_name = $fullNameResult['FirstName'] . " " . $fullNameResult['LastName'];
    $user_role = $fullNameResult['Role'];
    $user_ID = $fullNameResult['UserID'];
    $_SESSION['username'] = "$user_full_name";
    $_SESSION['role'] = "$user_role";
    $_SESSION['user_id'] = $user_ID;

 ?>
