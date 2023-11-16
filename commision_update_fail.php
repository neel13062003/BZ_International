<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate Commision</title>
</head>

<link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">
      
<!-- datatabels CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
<!-- bootstrap CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>   
    <main class="container mt-5">
        <div class="container" style="width:80%;">
            <div class="table-responsive">
                <div class="form-container">  
                    <h1 class="text-center" style="color:blue;">Calculation Of Commision(Monthly Payout)</h1><br>
        

                  
                    <?php    
                        $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');	
                    ?>
                    <div class="row justify-content-center pt-4">
                        <!label for="" class="mt-2"><!Month><!/label>
                        <div class="col-sm-3">
                            <input type="month" name="month" id="month" value="<?php echo $month ?>" class="form-control">
                        </div>
                    </div>
                    
                    
                    <script>
                        $('#month').change(function(){
                        location.replace('index.php?commision&month='+$(this).val())
                        })      
                    </script>

                    <!---Month wise coding simple logic instead of php onclick event with goto different with every admin--->

                    <!---Form For Month Wise Distribution OF Biling--->
                    <style>
                        .col-sm-3 input {
                        background-color: white;
                        color:black;
                        font-weight:bold;
                        margin:10px;
                        }

                        .col-sm-3 input:hover {
                        background-color: red; 
                        color:black;
                        font-weight:bold;
                        }
                    </style>	    


                        <?php

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $upline = $_POST['upline'];

                            $conn = mysqli_connect("localhost", "root", "", "mlm");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            //This 2 lines Code
                            // Get all members who invested in the specified month
                            $query = "SELECT * FROM members WHERE name = '$upline' AND DATE_FORMAT(`date`, '%Y-%m') = '$month'";

                            // $query = "SELECT * FROM `members` WHERE name = '$upline' AND DATE_FORMAT(`date`, '%Y-%m') = '$month' ORDER BY UNIX_TIMESTAMP(`date`) ASC";
                            
                            //$query = "SELECT * FROM members WHERE name = '$upline'";
                           

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $investment = $row["amount"];
                                }
                            } else {
                                echo "No investment found for " . $upline;
                            }

                        ?>
                        <table  id='NoOrder1' class='table table-striped table-hover text-center'  style='font-size:20px;' >
                                <thead>
                                    <tr style="font-size:25px;">
                                        <th>Member Name</th>
                                        <th>Investment</th>
                                        <th>Level</th>
                                        <th>Commission</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                $total_commission = getDownlinesCommission($upline, $conn, 0, $investment);
                                $final_total = ($investment * 0.03) + $total_commission;
                                $own = ($investment * 0.03) ;

                                echo "<tr style='font-size:15px;color:grey;'><td colspan='2'><strong>Self Investment Commision by " .$upline."</strong></td><td> <span style='color:blue;'>" . $own . "</span></td></tr>";
                                echo "<tr style='font-size:20px;background-color:white;color:red;'><td colspan='2'><strong>Total Commission Earned by " . $upline . "</td><td>" . $final_total . "</strong></td></tr>";
                            
                                mysqli_close($conn);

                        }
                        ?>
                                

                             
       
                        <?php
                        function getDownlinesCommission($upline, $conn, $level, $investment) {
                            $query = "SELECT * FROM members WHERE upline = '$upline'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $commission = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $amount = $row["amount"];
                                    if ($level == 0) {
                                        $level_commission = 0.01 * $amount;
                                    } else if ($level == 1) {
                                        $level_commission = 0.005 * $amount;
                                    } else {
                                        $level_commission = 0.0025 * $amount;
                                    }
                                    echo "<tr style='font-size:15px;color:grey;'><td>" . $row["name"] . "</td><td>" . $row["amount"] . "</td> <td>" . $level+1 . "</td><td>" . $level_commission . "</td></tr>";
                                    $commission += $level_commission + getDownlinesCommission($row["name"], $conn, $level + 1, $investment);
                                }
                                return $commission ;
                            } else {
                                return 0;
                            }
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


                    </div>
                </div> 
            </div> 
        </main>
               
    </body>
</html>
       
    