<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "crm_system"; // change if different

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['service_name'];
  $desc = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO services (service_name, description) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $desc);
  $stmt->execute();
  $stmt->close();
}

// Get services
$services = $conn->query("SELECT * FROM services ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Services</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #eaeaea;
    }

    .sidebar {
      width: 240px;
      height: 100vh;
      background: #000;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 30px;
      color: white;
    }

    .sidebar h2 {
      text-align: center;
      color: #00bfff;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 15px 30px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #1a1a1a;
    }

    .main {
      margin-left: 240px;
      padding: 40px;
      background: white;
      min-height: 100vh;
    }

    h1 {
      margin-top: 0;
    }

    form {
      background: #f1f1f1;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 40px;
    }

    input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px 15px;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin.html">🏠 Dashboard</a>
    <a href="admin_complaints.php">📨 Complaints Received</a>
    <a href="admin_customers.php">👥 Customer Details</a>
    <a href="admin_services.php">📦 Manage Products</a>
    <a href="admin_quota.php">📋 Quote Requests</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <h1>🛠️ Manage Services</h1>

    <!-- Add New Service -->
    <form action="" method="POST">
      <h3>Add New Service</h3>
      <label>Service Name:</label>
      <input type="text" name="service_name" required>

      <label>Description:</label>
      <textarea name="description" rows="4" required></textarea>

      <input type="submit" value="Add Service">
    </form>

    <!-- Display Existing Services -->
    <h3>Provided Services</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Service Name</th>
        <th>Description</th>
        <th>Created At</th>
      </tr>
      <?php if ($services->num_rows > 0): ?>
        <?php while ($row = $services->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['service_name']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
            <td><?= $row['created_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4">No services found.</td></tr>
      <?php endif; ?>
    </table>
  </div>

</body>
</html>

<?php $conn->close(); ?>
