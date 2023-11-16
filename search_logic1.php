<html>
  <head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">

  
  <!-- datatabels CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

    <style>
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
    </style>
  </head>
  <body class="back">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $upline = $_POST['upline'];
            echo "<span style='color:white;font-size:25px;text-align:center; align-items: center;margin-left:45%;'>" . $upline. "</span>";
            $conn = mysqli_connect("localhost", "root", "", "mlm");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $query = "SELECT * FROM members WHERE upline = '$upline'";
            $result = mysqli_query($conn, $query);

            echo '<div class="container" style="background: aliceblue;width:100%;">';
            

            echo '<div class="container tree-container" style="background: aliceblue;">';

                echo "<div class='col-sm-8'>";	
                //echo " <a href='#' onclick='window.print()' class='btn btn-info'><i class='material-icons'>&#xE24D;</i> <span>Print</span></a>";
                echo " </div>";
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="tree">';
                    echo '<div class="node">'; displayDownlines($upline, $conn, 0); echo '</div>';
                    echo '</div>';
                } else {
                    echo "No downlines found for " . $upline;
                }
            echo '</div>';
            mysqli_close($conn);
        }

        function displayDownlines($upline, $conn, $level) {
            $query = "SELECT * FROM members WHERE upline = '$upline'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<ul>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<li >";
                        echo "<span style='color:black;font-size:10px;margin-left:auto;margin-right:auto;' class='circle'>" . $row["name"] . "</span>";
                        displayDownlines($row["name"], $conn, $level + 1);
                    echo "</li>";
                }

                echo "</ul>";
            }
        }

        ?>
    <style>
        .tree-container {
            width: 100%; /* Set the desired width for the container */
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        .tree {
            display: inline-flex; /* Change to inline-flex */
            flex-direction: column;
            align-items: center;
            white-space: nowrap; /* Prevent line breaks */
        }
        .node {
            text-align: center;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        .circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .circle span {
        transform: rotate(90deg);
        }

    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        /* font-size:20px; */
        color:black;
        
        float: none;
        text-align: center;
        display: inline-block;
        vertical-align: top;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree li:before,
    .tree li:after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 20px;
    }

    .tree li:after {
        right: auto;
        left: 50%;
        border-left: 3px solid #ccc;
    }

    /*We need to remove left-right connectors from elements without any siblings*/
    .tree li:only-child:before,
    .tree li:only-child:after {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child {
        padding-top: 0;
        
    }

    /*Remove left connector from first child and right connector from last child*/
    .tree li:first-child:before,
    .tree li:last-child:after {
        border: 0 none;
    }

    /*Adding back the vertical connector to the last child*/
    .tree li:last-child:before {
        border-right: 3px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    /*Adding back the horizontal connector to the last child*/
    .tree li:last-child:before {
        border-right: 3px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    /*Adding the hover effect on the parent*/
    .tree li.parent:hover:before,
    .tree li.parent:hover:after,
    .tree li.parent:hover>div:before,
    .tree li.parent:hover>div:after {
        border-color: #999;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 3px solid #ccc;
        width: 0;
        height: 20px;
    }

    /*We need to remove the first connector from every child*/
    .tree ul ul li:first-child:before {
        border: 0 none;
    }

    /*We need to remove the last connector from every child*/
    .tree ul ul li:last-child:before {
        border-right: 3px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }
    </style>
 

    <style>


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

          .count:before {
              counter-increment: section;
              content: counter(section);
          }
        
        .back{
        background-image: url('img/bi.jfif');
        background-size: cover; 
        /* background-size: 1000px 667px; */
        /* background-size: 1100px 600px; */
        background-position: center center;
        background-repeat: no-repeat;
        }  

      </style>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->


      <!--script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script--->
      <!--script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script-->
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


  </body>
</html>
