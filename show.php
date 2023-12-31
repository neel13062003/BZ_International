<style>
    .back{
      background-image: url('img/bi2.jfif');
       background-size: cover; 
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
  <title>Add Member</title>

  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">
  
  <!-- datatabels CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body class="back">';

    include "partials/_dbconnect.php";
    require "partials/nav.php";
 
    if($loggedin){
        echo '<div class="container" style="background: aliceblue;width:60%;">
                    <div class="table-wrapper" style="margin:30px;" >
                        <div class="table-title" style="border-radius: 14px;background:black;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h2>All Member<b>Details</b></h2>
                                </div>
                                <div class="col-sm-8">	
                                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                                    <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>        
                                </div>
                            </div>
                          </div>
                        <div>
                   </div>';


        ?>
        <table class='table table-striped table-hover text-center' id='NoOrder1' style='font-size:20px;color:black; font-family: Bahnschrift, sans-serif;' >
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
        <?php


        // Establish connection to the database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "mlm";

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
            $sql = "SELECT id, name FROM members";  //change
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) { 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td></tr>";
                }
            } else {
                echo "No results found.";
            }


    }else{
        echo'
        <script>alert("you are not logged in");</script>';
    }?>
    </tbody>
    </table>    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="assetsForSideBar/js/main.js"></script>
	
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#NoOrder1").DataTable();
    });
    </script>   

    <script>
    $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

    
    <style>
    .form-container {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        }
        th, td {
        border: 1px solid black;
        padding: 8px;
        }
        th {
        background-color: #f2f2f2;
        }
        .level {
        padding-left: 20px;
        }
        .tooltip.show {
        top: -62px !important;
    }
    
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;      <!---#333--->
        background: #fff; <!---#f2f2f2--->
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;      <!------>
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;   <!----#03a3e7----->
    }
    .table-title .btn {		
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #4b5366;		
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        /* background-color: #fcfcfc; */
    }
    table.table-striped.table-hover tbody tr:hover {
        background: ; 
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td a {
        font-weight: bold;
        color: #566787;     
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;    
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }

    </style>


  </body>
</html>
