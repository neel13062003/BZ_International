<?php 
session_start();
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

<!-- Element to have continuous horizontal scroll animation -->

<header style="background-color:black;">
                <nav class="navbar navbar-expand-lg">

                  <a class="navbar-brand" href="index" style="color:white; margin:5px;padding:5px;"><h3>MLM - BZ International</h3></a>
                  
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="#"></a>
                      </li>
                      </ul>
                  </div>
                  <div>
                      <ul class="navbar-nav">
                          <li class="nav-item active">
                              <a class="nav-link" href="#"><h4>Earn Money From Your investment</h4></a>
                          </li>
                          </ul>
                  </div>
                ';

                 
                if($loggedin){
                        echo '
                        <ul class="navbar-nav mr-2">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" style="color:white;"> Welcome ' .$username. '</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="partials/_logout.php">Logout</a>
                            </div>
                          </li>
                        </ul>
                        <div class="text-center image-size-small position-relative">
                            <img src="./img/profile.jpg" class="rounded-circle" style="width:40px; height:40px">
                        </div>';
                }
                else {
                        echo '
                        <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#loginModal">Login</button>
                        <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
                }    
                echo'
                </nav>
        </header>
              
        <!-- header -->

        <style>
        .navbar-brand {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        }

        .nav-link {
        text-align: center;
        }
        .navbar-brand {
        height: 60px; /* adjust as needed */
        }
        </style>
        ';
        
        include 'partials/_loginModal.php';
        include 'partials/_signupModal.php';   

        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You can now login.
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
          }
          if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> ' .$_GET['error']. '
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
          }
          if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
          }
          if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> Invalid Credentials
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
          }
?>