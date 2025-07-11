<?php
$conn = new mysqli("localhost", "root", "", "crm_system");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM quote_requests ORDER BY submitted_at DESC");
if (!$result) {
    die("Query Error: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quote Requests</title>
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

    .email-button {
      background-color: #007bff;
      color: white;
      padding: 6px 12px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
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
    <h1>📋 Quote Requests</h1>
    <p>List of members who applied for quotes:</p>

    <?php if ($result->num_rows > 0): ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Product</th>
          <th>Message</th>
          <th>Submitted At</th>
          <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['product']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            <td><?= $row['submitted_at'] ?></td>
            <td>
  <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= urlencode($row['email']) ?>&su=Quote%20Response&body=Dear%20<?= urlencode($row['name']) ?>,%0D%0A%0D%0AThank%20you%20for%20your%20interest%20in%20<?= urlencode($row['product']) ?>.%0D%0AWe%20will%20get%20back%20to%20you%20shortly.%0D%0A%0D%0ABest%20regards,%0D%0A[Your%20Company%20Name]" target="_blank" class="email-button">Reply</a>
</td>

          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No quote requests found.</p>
    <?php endif; ?>
  </div>

</body>
</html>

<?php $conn->close(); ?>
