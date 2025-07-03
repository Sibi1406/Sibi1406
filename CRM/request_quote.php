<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "crm_system");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$product = $_POST['product'];
$message = $_POST['message'];

// Insert into DB
$sql = "INSERT INTO quote_requests (name, email, phone, product, message)
VALUES ('$name', '$email', '$phone', '$product', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<h2 style='text-align:center; color:green;'>Quote Request Submitted Successfully!</h2>";
} else {
  echo "<h2 style='text-align:center; color:red;'>Error: " . $conn->error . "</h2>";
}

$conn->close();
?>
