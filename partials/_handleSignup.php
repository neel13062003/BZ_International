<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    
	$id=$_POST["id"];
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
        header("Location: ../index?signupsuccess=false&error=$showError");
    }
    else{
      if(($password == $cpassword)){
          //$hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` ( `username`, `firstName`, `lastName`, `phone`, `password`, `joinDate`) VALUES ('$username', '$firstName', '$lastName', '$phone', '$password', current_timestamp())";   // $password->$hash for security  
          $result = mysqli_query($conn, $sql);
          if ($result){
              $showAlert = true;
              header("Location: ../index?signupsuccess=true");
          }
      }
      else{
          $showError = "Passwords do not match";
          header("Location: ../index?signupsuccess=false&error=$showError");
      }
    }
}
    
?>