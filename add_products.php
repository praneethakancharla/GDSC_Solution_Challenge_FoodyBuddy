<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $productName = $_POST['pname'];
    $manufacturedDate = $_POST['mfg'];
    $expiryDate = $_POST['exp'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    
    $imageData = $_POST['pimg'];
    $imagePath = 'add_products_images/prodid_' . time() . '.png';

    
    file_put_contents($imagePath, base64_decode($imageData));

    
    $servername = "localhost";
    $username = "root";
    $password = "Praneetha@1";
    $dbname = "foodybuddy";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO products (product_name, manufactured_date, expiry_date, price, quantity, image_path) 
            VALUES ('$productName', '$manufacturedDate', '$expiryDate', $price, $quantity, '$imagePath')";

    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product Added Successfully!!'); window.location.href = 'store_dashboard.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
