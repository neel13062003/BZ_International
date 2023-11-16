<style>
    .back{
      background-image: url('img/8.jpg');
        background-size: cover;  
      /* background-size: 800px 534px; */
      /* background-size: 1100px 600px; */
      background-position: center center;
      background-repeat: no-repeat;
  }
  
  .imp{
    color:red;
     font-weight: bold;
     font-size:20px;
     text-decoration: none;
     /* background-color: rgba(255, 255, 255, 0.2); */
    border-radius:10px;
  }
  .imp:hover{
    color:blue;
    font-weight: bold;
    text-decoration: none;
  }.imp1{
    color:white;
     font-weight: bold;
     font-size:20px;
     text-decoration: none;
     
  }
  .imp1:hover{
    color:blue;
    font-weight: bold;
    text-decoration: none;
    
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
  <title>Add Member</title>
  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">
  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

    

<body class="back" style="background-color:black;">';
    
      include "partials/_dbconnect.php";
      require "partials/nav1.php";
    
   
  echo '<!-- main content -->';

  

  if($loggedin){
    $page = $_GET["page"] ?? "index";
    echo'

    <!--I removing .php extension using .htaccess file-->
    
    <main class="container mt-5">
      <div class="d-flex justify-content-center mt-5">
      <table class="table" style="font-size:20px;">  
        <tr>
          <td><a class="imp" href="add">1) Add Your Investment Team</a></td>
        </tr>
        <tr>

        <tr>  
          <td><a href="amount" class="imp1">2) Add Amount</a></td>
        </tr> 

          <td><a href="search" class="imp">3) See All Your Member</a></td> 
        </tr>   
        <tr>  
          <td><a href="commision_search" class="imp1">4) Calculate Your Commision</a></td> 
        </tr> 
      
        <tr>  
          <td><a href="show" class="imp">5) See ID Of All Members</a></td> 
        </tr>  
      </table>
    </main>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
      $(function() {
        $("a[href=\'' . $page . '\']").addClass("active");  
      });
    </script>';

  }else{
      //$("a[href=\'' . $page . '.php\']").addClass("active");
      echo '<main class="container1">
      </main>';
  }
 
    echo '
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  </body>

</html>';

?>