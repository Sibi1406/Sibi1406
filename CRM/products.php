<?php
$conn = new mysqli("localhost", "root", "", "crm_system");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$services = $conn->query("SELECT * FROM services ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Features - CRM System</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: #f8f8f8; display: flex; flex-direction: column; min-height: 100vh;">

<div style="flex: 1;">

  <!-- Navbar -->
  <div style="background: #2196f3; padding: 15px 30px; display: flex; align-items: center; justify-content: space-between; color: white;">
    <div style="display: flex; align-items: center;">
      <span style="font-size: 24px; margin-right: 10px;">👥</span>
      <h2 style="margin: 0; font-size: 22px;">CRM System</h2>
    </div>
    <div>
      <a href="index.php" style="color: white; margin-right: 20px; text-decoration: none;">🏠 Home</a>
      <a href="products.php" style="color: white; margin-right: 20px; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 5px; text-decoration: none;">📦 Products</a>
      <a href="outlets.php" style="color: white; margin-right: 20px; text-decoration: none;">📍 Outlets</a>
      <a href="pricing.php" style="color: white; margin-right: 20px; text-decoration: none;">💲 Pricing</a>
      <a href="complaints.php" style="color: white; text-decoration: none;">⚠️ Complaints</a>
    </div>
  </div>

  <!-- Page Heading -->
  <div style="text-align: center; padding: 40px 20px 20px;">
    <h1>Product Features</h1>
    <p style="color: #666;">Search and explore our comprehensive product catalog</p>
  </div>

  <!-- Search Bar -->
  <div style="max-width: 900px; margin: 0 auto 30px; background: white; padding: 20px; border-radius: 10px; display: flex; gap: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
    <input type="text" placeholder="Enter product name or keyword..." style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    <select style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
      <option>All Categories</option>
      <option>Laptops</option>
      <option>Software</option>
      <option>Support</option>
    </select>
    <button style="padding: 10px 20px; background: #2196f3; color: white; border: none; border-radius: 5px;">Search</button>
  </div>

  <!-- Products Grid -->
  <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 0 20px 40px;">
    <?php if ($services->num_rows > 0): ?>
      <?php while ($row = $services->fetch_assoc()): ?>
        <div style="background: white; padding: 20px; width: 280px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center;">
          <div style="font-size: 30px; color: #2196f3;">🧩</div>
          <h3 style="margin: 10px 0 5px;"><?= htmlspecialchars($row['service_name']) ?></h3>
          <p style="color: #888;">Service</p>
          <p style="text-align: left; font-size: 14px; line-height: 1.6; color: #333;">
            <?= nl2br(htmlspecialchars($row['description'])) ?>
          </p>
          <a href="pricing.php" style="display: block; background: #2196f3; color: white; padding: 10px; border-radius: 5px; margin-top: 10px; text-decoration: none;">View Details</a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="text-align: center; color: #999;">No services available at the moment.</p>
    <?php endif; ?>
  </div>

</div>

<footer style="background-color: #2c2f33; color: #fff; text-align: center; padding: 15px; font-family: Arial, sans-serif; font-size: 14px;">
  © 2025 CRM System.
</footer>

</body>
</html>

<?php $conn->close(); ?>
