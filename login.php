<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "Praneetha@1";
    $dbname = "foodybuddy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];


    $org_query = "SELECT * FROM org_reg WHERE OrganisationEmail = '$email' AND password = '$password'";
    $org_result = $conn->query($org_query);

    if ($org_result->num_rows > 0) {
        // User found in org_reg table, redirect to org_dashboard
        header("Location: org_dashboard.html");
        exit();
    }

    // Check in store_reg table
    $store_query = "SELECT * FROM store_reg WHERE semail = '$email' AND spwd = '$password'";
    $store_result = $conn->query($store_query);

    if ($store_result->num_rows > 0) {
        // User found in store_reg table, redirect to store_dashboard
        header("Location: store_dashboard.html");
        exit();
    }

    // If not found in either table, display error message
    echo "<script>alert('Invalid login. User not found in both org_reg and store_reg.'); window.location.href = 'login.html';</script>";

    $conn->close();
}
?>
