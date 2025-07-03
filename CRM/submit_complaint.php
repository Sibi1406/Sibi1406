<?php
// Database connection
$host = "localhost";
$user = "root";
$password = ""; // Default in XAMPP
$database = "crm_system";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $customer_id = $_POST['customer_id'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $resolution = $_POST['resolution'];
    $reference = $_POST['reference'];
    $incident_date = $_POST['incident_date'];
    $follow_up = isset($_POST['follow_up']) ? 'Yes' : 'No';

    $stmt = $conn->prepare("INSERT INTO complaints 
        (fullname, email, phone, customer_id, category, priority, subject, description, resolution, reference, incident_date, follow_up) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", 
        $fullname, $email, $phone, $customer_id, $category, $priority,
        $subject, $description, $resolution, $reference, $incident_date, $follow_up
    );

    if ($stmt->execute()) {
        echo "<h2>Complaint Submitted Successfully</h2>";
        echo "<p>Thank you, <strong>$fullname</strong>. We will contact you at <strong>$email</strong>.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
