<style>
  .button-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  max-width: 700px;
}

a {
  margin: 10px;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  font-size: 1.2em;
  font-weight: bold;
  color: #fff;
  border-radius: 5px;
  /* transition: background-color 0.3s ease-in-out; */
}
 .button-container{
  color:white;
 }

.imp {
  background-color: black;
}

.imp:hover {
  background-color: red;
  text-decoration: none;
}

.imp1 {
  background-color: black;
}

.imp1:hover {
  background-color: red;
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

<style>
    /* CSS Jump Animation */
    // @keyframes jump {
    //   0%, 20%, 50%, 80%, 100% {
    //     transform: translateY(0); /* Start and end with no vertical movement */
    //   }
    //   40% {
    //     transform: translateY(-30px); /* Jump up at 40% */
    //   }
    //   60% {
    //     transform: translateY(-15px); /* Come back down at 60% */
    //   }
    // }

    // /* Apply animation to an element with the class -jumping-element */
    // .jumping-element {
    //   animation: jump 1s ease-in-out infinite; /* Adjust duration and timing function as needed */
    // }
  </style>    

<body class="back">';
  
      include "partials/_dbconnect.php";
      require "partials/nav.php";
 
   
  echo '<!-- main content -->';

  

  if($loggedin){
    $page = $_GET["page"] ?? "index";
    echo'

    <!--I removing .php extension using .htaccess file-->
    <div class="jumping-element">

    <main class="container mt-5">
      <div class="d-flex justify-content-center mt-5">
      <table class="table" style="font-size:20px;">  
        
      <div class="button-container" style=" position: absolute;
                                    top: 15%;
                                    left: -22%;
                                    right:0%;
                                    transform: translate(20%, 20%);" >
          <a href="add" class="imp">Add Your Investment Team</a>
          <a href="amount" class="imp1">Add Amount</a>
          <a href="fd" class="imp">FD</a>
          <a href="search" class="imp1">See All Your Member</a>
          <a href="search1" class="imp">See All Your Member (Tree View)</a>
          <a href="commision_search" class="imp1">Calculate Your Commission</a>
          <a href="show" class="imp">See ID Of All Members</a>
          <a href="allcom" class="imp1">All People Commission</a>
          <a href="graph" class="imp">Chart MonthWise</a>
    </div>
     


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
      </main>
      </div>';
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