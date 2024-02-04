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

    $firstName = $_POST['fn'];
    $lastName = $_POST['ln'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $dob = $_POST['date'];
    

    $sql = "INSERT INTO practice_regii (first_name, last_name, email, password, dob) 
            VALUES ('$firstName', '$lastName', '$email', '$password', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
