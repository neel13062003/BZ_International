<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $amount = $_POST['amount'];

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
       $row = mysqli_fetch_assoc($result);
       $new_amount = $row['amount'] + $amount;
       $update_query = "UPDATE members SET amount = ? WHERE name = ?";
       $stmt = mysqli_prepare($conn, $update_query);
       mysqli_stmt_bind_param($stmt, "ds", $new_amount, $name);
       mysqli_stmt_execute($stmt);
       echo '<script>alert("Amount added successfully.");
             window.location.href = "index";
             </script>';
       exit();
       
       

       
    } else {
        // echo "Name Not Exist.";
        echo '<script>alert("Username Not Exist");
            window.history.back(1);
            </script>';
            exit();
    }

    mysqli_close($conn);
}

?>
