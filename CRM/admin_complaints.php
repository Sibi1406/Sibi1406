<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "crm_system"; // Change if your DB name differs

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM complaints ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Complaints Received</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eaeaea;
      margin: 0;
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
      color: #00bfff;
      text-align: center;
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

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      margin-top: 20px;
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

    .no-data {
      text-align: center;
      padding: 20px;
      font-style: italic;
    }
  </style>
</head>
<body>

  <!-- Sidebar Navigation -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin.html">🏠 Dashboard</a>
    <a href="admin_complaints.php">📨 Complaints Received</a>
    <a href="admin_customers.php">👥 Customer Details</a>
    <a href="admin_services.php">📦 Manage Products</a>
    <a href="admin_quota.php">📋 Quote Requests</a>
  </div>

  <!-- Main Content Area -->
  <div class="main">
    <h1>📨 Complaints Received</h1>
    <p>List of all submitted customer complaints:</p>

    <?php if ($result->num_rows > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Submitted At</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
            <td><?= $row['submitted_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <div class="no-data">No complaints have been received yet.</div>
    <?php endif; ?>

  </div>

</body>
</html>

<?php $conn->close(); ?>
