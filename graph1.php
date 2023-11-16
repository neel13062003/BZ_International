<html>
  <head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel = "icon" href ="img/Ram.jpg" type = "image/x-icon">

        <div class="center"  style="text-align: center;">
            <?php
                // Get the user input from your web application
                $userInput = $_POST['user_input'];

                // Build the Python command with the user input as an argument
                $pythonCommand = "python Main1.py " . escapeshellarg($userInput);

                // Execute the Python script and capture the output
                $output = exec($pythonCommand);

                // Use the output to display the generated chart or perform any other desired actions in your PHP code
                // echo $output;

                echo "<img src='$output' alt='Income Chart'>";

            ?>
        </div>


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


  </body>
</html>
