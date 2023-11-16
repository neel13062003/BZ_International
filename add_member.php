<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $upline = $_POST['upline'];

    $conn = mysqli_connect("localhost", "root", "", "mlm");

    if (!$conn) {
       // die("Connection failed: " . mysqli_connect_error());
       echo '<script>alert("Connection Failed");
            window.history.back(1);
            </script>';
            exit();
    }

    $query = "SELECT * FROM members WHERE name = '$name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
       // echo "Name already exists. Please try with a different name.";
       echo '<script>alert("Name already exists. Please try with a different name.");
            window.history.back(1);
            </script>';
            exit();
    } else {
        $query = "INSERT INTO members (name, amount, upline,date) VALUES ('$name', '$amount', '$upline', CURRENT_TIMESTAMP)";
        if (mysqli_query($conn, $query)) {
           // echo "New member added successfully.";
           echo '<script>alert("New member added successfully.");
                    window.location.href="http://localhost/BitCoin/index";  
                    </script>';
                    exit();
            
        } else {
           // echo "Error: " . $query . "<br>" . mysqli_error($conn);
           echo '<script>alert("Incorrect Password! Mysqli Error: " . mysqli_error($conn));
           window.history.back(1);
           </script>';
           exit();
        }
    }

    mysqli_close($conn);
}

?>
