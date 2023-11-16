<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $fd = $_POST['fd'];
   

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

        $row = mysqli_fetch_assoc($result);
        $new_amount = $row['fd'] + $fd;
        $update_query = "UPDATE members SET fd = ?, date1 = NOW() WHERE name = ?";
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, "ds", $new_amount, $name);
        mysqli_stmt_execute($stmt);
        echo '<script>alert("FD added successfully.");
             window.location.href = "index";
             </script>';
        exit();
    } else {
           echo '<script>alert("Pls First Become Member Then Take Benefits of FD");
                    window.location.href="http://localhost/mlm/index";  
                    </script>';
                    exit();
    }

    mysqli_close($conn);
}

?>
