<style>
    .back{
      background-image: url('img/bi.jfif');
       background-size: cover; 
      /* background-size: 1000px 667px; */
      /* background-size: 1100px 600px; */
      background-position: center center;
      background-repeat: no-repeat;
  }
</style>  


<?php 
//session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search DownLines</title>

  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">


  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .form-container {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
    }
  </style>

</head>

<body class="back">';

    include "partials/_dbconnect.php";
    require "partials/nav.php";
 
    if($loggedin){
      echo' 
        
      <!-- main content -->
      <main class="container mt-5">
        <div class="container" style="width:80%;">
         
          <div class="form-container">  
          <h1 class="text-center" style="color:#50ff08; font-family: Algerian, sans-serif;font-size:45px;">See Your Team</h1><br>
            <form action="search_logic" method="post">
              <div class="form-group">
                <label for="upline" style="color:white; font-family: Bahnschrift, sans-serif;">Enter Username Of Member:</label>
                <input type="text" id="upline" name="upline" style=" width:370px;border-radius:10px; color:black; font-size:20px; padding:5px;"><br><br>
              </div> 
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        </main>
        <div class="d-flex justify-content-center mt-5">';
    }else{
    }


    echo '
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  </body>
</html>
';
