<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "Praneetha@1";
    $dbname = "foodybuddy";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $orgName = $_POST['OrganisationName'];
    $orgOwnerName = $_POST['OrganisationOwnerName'];
    $orgAddress = $_POST['OrganisationAddress'];
    $orgEmail = $_POST['OrganisationEmail'];
    $orgPhone = $_POST['OrganisationPhone'];
    $password = $_POST['password']; // Assuming 'password' is the name attribute of the password field
    $confirmPassword = $_POST['confirmPassword'];

    // Validate password and confirm password match
    if ($password != $confirmPassword) {
        echo "<script>alert('Password and Confirm Password Does Not match'); window.location.href = 'org_signup.html';</script>";

        exit;
    }

    // Hash the password for security

    // Insert data into org_reg table
    $sql = "INSERT INTO org_reg (OrganisationName, OrganisationOwnerName, OrganisationAddress, OrganisationEmail, OrganisationPhone, password) 
            VALUES ('$orgName', '$orgOwnerName', '$orgAddress', '$orgEmail', '$orgPhone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
