<?php
// Start the session at the beginning of the file
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['name'])) {
    $upline = $_GET['name'];
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

        // Rest of your code...

        // Return the total_investment value to allcom.php using URL parameters
        header("Location: allcom?name=" . urlencode($upline) . "&total_investment=" . urlencode($total_investment));
        exit();

    } catch (Exception $e) {
        echo "<div class='error'>" . $e->getMessage() . "</div>";
    }

    // Your existing code...
}
?>