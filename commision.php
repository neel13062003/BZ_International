<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate Commision</title>
</head>

<style>
    .back{
      /*background-image: url('img/bi.jfif');*/
       background-size: cover; 
      /* background-size: 1000px 667px; */
      /* background-size: 1100px 600px; */
      background-position: center center;
      background-repeat: no-repeat;
      background-color:#171716;
  }
</style>  


<link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">
      
<!-- datatabels CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
<!-- bootstrap CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body class="back" style="background-color:#171716;">   
    <main class="container mt-5">
        <div class="container" style="width:80%;">
            <div class="table-responsive" style="overflow-x: hidden;">
                <div class="form-container">  
                    <h1 class="text-center" style="color:#50ff08; font-family: Algerian, sans-serif;font-size:30px;">Calculation Of Commision(Monthly Payout)</h1><br>
        
                    
                    


                    <?php
                        $upline = ''; // Initialize $upline variable

                        // Check if form is submitted via POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['upline'])) {
                                // If 'upline' parameter is present in the form submission, use it
                                $upline = $_POST['upline'];
                            }
                        } elseif (isset($_GET['name'])) {
                            // If 'name' parameter is present in the URL, use it
                            $upline = $_GET['name'];
                        }
                        // echo $upline;
                            $conn = mysqli_connect("localhost", "root", "", "mlm");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            try {
                                $query = "SELECT * FROM members WHERE name = '$upline'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $investment = $row["amount"];
                                    }
                                } else {
                                    throw new Exception("No investment found for " . $upline);
                                }
                            }
                            catch (Exception $e) {
                            }
                    ?>

                        <!-- <div class="col-lg-12 text-center border rounded bg-light my-3" style="position:static;margin-top:10px;" id="abc"> -->

                                <a href="#" onclick="window.print()" class="btn btn-info" style="margin-right:1000px;margin-top:-25px;width:100px;height:35px;
                                color:white;background-color:black;"><i class="material-icons"><!&#xE24D;></i> <span>
                                Take Print</span></a>   	
                        </div>         


                                <table  id='NoOrder' class='table table-striped text-center'  style='font-size:20px;' >
                                    <thead>
                                        <tr style="font-size:25px;color:white;background-color:#171716;">
                                            <th>Member Name</th>
                                            <th>Level</th>
                                            <th>Investment</th>
                                            <th>Commission</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                
                                <?php
                                if (isset($_GET['name'])) {
                                    // If 'name' parameter is present in the URL, use it
                                    $upline = $_GET['name'];
                                }
                                else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $upline = $_POST['upline'];
                                }    
                                    $conn = mysqli_connect("localhost", "root", "", "mlm");

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    try {
                                        $query = "SELECT *, COALESCE(fd, '') AS fd FROM members WHERE name = '$upline'";
                                        $result = mysqli_query($conn, $query);

                                        
                                    
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $investment = $row["amount"];
                                                $neel = $row["fd"];
                                                $kalp = $row["date1"];
                                            }
                                        } else {
                                            throw new Exception("No investment found for " . $upline);
                                        }
                                        
                                        

                                        $total_commission = getDownlinesCommission($upline, $conn, 0, $investment);
                                        $final_total = ($investment * 0.03) + $total_commission;
                                        $own = ($investment * 0.03);
                                    
                                        $total_investment = getTotalInvestment($upline, $conn, 0, $investment);
                                        $totalInvestment = $investment + $total_investment;
                                    
                                        
                                    
                                        echo "<tr style='font-size:18px;color:yellow;background-color:#171716;'>";
                                        echo "<td colspan='2'><strong>Self Investment Commission by $upline</strong></td>";
                                        echo "<td colspan='1'><strong><span style='color:white;'>$investment</span></strong></td>";
                                        echo "<td colspan='1'><strong><span style='color:white;'>+ $own ₹</span></strong></td>";
                                        echo "</tr>";
                                    
                                        echo "<tr style='font-size:20px;background-color:black;color:red;'>";
                                        echo "<td colspan='2'><strong>Total Commission Earned by $upline</td>";
                                        echo "<td colspan='1' style='font-size:20px;font-weight:bold;'><strong>$totalInvestment</strong></td>";
                                        echo "<td colspan='1' style='font-size:20px;font-weight:bold;'><strong>$final_total ₹</strong></td>";
                                        echo "</tr>";
                                    
                                        
                                    
                                        if ($neel > 0) {
                                            $fdInvestment = $neel;
                                            $fdtotal = ($fdInvestment * 0.04)*12+$fdInvestment;
                                            $fd_date = $kalp;
                                            $fd_date = date('m-Y', strtotime('+1 year', strtotime($fd_date))); // add 1 year to date
                                            
                                            echo "<tr style='font-size:18px;color:white;background-color:#171716;'>";
                                            echo "<td colspan='2'><strong>FD payout Earned by $upline on $fd_date</strong></td>";
                                            echo "<td colspan='1' style='font-size:18px;font-weight:bold;'><strong>$fdInvestment</strong></td>";
                                            echo "<td colspan='1' style='font-size:18px;font-weight:bold;'><strong>$fdtotal ₹</strong></td>"; 
                                            echo "</tr>";
                                        }
                                    
                                        mysqli_close($conn);
                                    ?> 
                                    </tbody>  
                                </table>
                            <?php
                            } catch (Exception $e) {  
                                echo "<div class='error'>" . $e->getMessage() . "</div>";
                            }
                            ?>

                            <style>
                                .error {
                                    background-color: #f8d7da;
                                    color: #721c24;
                                    border: 1px solid #f5c6cb;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    }
                            </style> 


                        <?php
                            function  getTotalInvestment($upline, $conn, $level, $investment) {
                                $query = "SELECT * FROM members WHERE upline = '$upline'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    $sum = 0;
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $amount = $row["amount"]; 
                                        $sum += $amount + getTotalInvestment($row["name"], $conn, $level + 1, $investment);
                                    }
                                    return $sum ;
                                } else {
                                    return 0;
                                }
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
                                    $fd = $row["fd"];
                                    if ($level == 0) {
                                        $level_commission = 0.01 * $amount;
                                        $level_commission1 = 0.01 * $fd;
                                    } else if ($level == 1) {
                                        $level_commission = 0.005 * $amount;
                                        $level_commission1 = 0.005 * $fd;
                                    } else {
                                        $level_commission = 0.0025 * $amount;
                                        $level_commission1 = 0.0025 * $fd;
                                    }
                                    if($level_commission1>0){
                                        echo "<tr style='font-size:15px;color:black;font-weight:bold;background-color:white;'><td>" . $row["name"] . "</td><td>" . $level+1 . "</td> <td>" . $row["amount"] . "</td><td>" . $level_commission . "</td></tr>";
                                        echo "<tr style='font-size:15px;color:black;font-weight:bold;background-color:white;'><td>" . $row["name"] . "{FD}</td><td>" . $level+1 . "</td> <td>" . $row["fd"] . "</td><td>" . $level_commission1 . "</td></tr>";
                                    }else{
                                        echo "<tr style='font-size:15px;color:black;font-weight:bold;background-color:white;'><td>" . $row["name"] . "</td><td>" . $level+1 . "</td> <td>" . $row["amount"] . "</td><td>" . $level_commission . "</td></tr>";
                                    
                                    }
                                    
                                    $commission +=  $level_commission1 + $level_commission + getDownlinesCommission($row["name"], $conn, $level + 1, $investment);
                                }
                                return $commission ;
                            } else {
                                return 0;
                            }
                        }     
                        ?>

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