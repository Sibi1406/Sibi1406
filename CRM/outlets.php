<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Company Outlets - CRM System</title>
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
      <a href="products.php" style="color: white; margin-right: 20px; text-decoration: none;">📦 Products</a>
      <a href="outlets.php" style="color: white; margin-right: 20px; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 5px; text-decoration: none;">📍 Outlets</a>
      <a href="pricing.php" style="color: white; margin-right: 20px; text-decoration: none;">💲 Pricing</a>
      <a href="complaints.php" style="color: white; text-decoration: none;">⚠️ Complaints</a>
    </div>
  </div>

  <!-- Page Heading -->
  <div style="text-align: center; padding: 40px 20px 20px;">
    <h1>Company Outlets</h1>
    <p style="color: #666;">Find our locations and contact information</p>
  </div>

  <!-- Search Box -->
  <div style="max-width: 900px; margin: 0 auto 30px; background: white; padding: 20px; border-radius: 10px; display: flex; gap: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
    <input type="text" placeholder="Enter city, area, or ZIP code..." style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    <button style="padding: 10px 20px; background: #2196f3; color: white; border: none; border-radius: 5px;">🔍 Search</button>
  </div>

  <!-- Outlet 1 -->
  <div style="max-width: 900px; margin: 0 auto 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div>
      <h3 style="margin: 0; color: #2196f3;">🏢 Bengaluru Branch</h3>
      <p style="margin: 5px 0 10px; color: #666;">Main Office & Service Center</p>
      <p style="margin: 5px 0;"><strong>📍</strong>  42/7, Indira Nagar 2nd Stage, HAL Road, Bengaluru, Karnataka - 560038</p>
      <p style="margin: 5px 0;"><strong>📞</strong> +91 98765 43210</p>
      <p style="margin: 5px 0;"><strong>✉️</strong> bengularcrm@company.com</p>
      <p style="margin: 5px 0;"><strong>🕒</strong> Mon-Fri: 9:00 AM - 6:00 PM</p>
    </div>
    <div style="text-align: center;">
      <div style="margin-bottom: 10px; background: #f1f1f1; padding: 10px; border-radius: 8px;">
        <p style="margin: 0; font-weight: bold;">Services Available</p>
        <span style="background: green; color: white; padding: 3px 10px; border-radius: 12px; margin: 2px; font-size: 12px;">Sales</span>
        <span style="background: green; color: white; padding: 3px 10px; border-radius: 12px; margin: 2px; font-size: 12px;">Support</span>
        <span style="background: green; color: white; padding: 3px 10px; border-radius: 12px; margin: 2px; font-size: 12px;">Service</span>
      </div>
      <a href="#" style="text-decoration: none; background: #2196f3; color: white; padding: 10px 15px; border-radius: 5px; display: inline-block;">Get Directions</a>
    </div>
  </div>

  <!-- Outlet 2 -->
  <div style="max-width: 900px; margin: 0 auto 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div>
      <h3 style="margin: 0; color: #4caf50;">🏪 Mall Branch</h3>
      <p style="margin: 5px 0 10px; color: #666;">Retail Store & Demo Center</p>
      <p style="margin: 5px 0;"><strong>📍</strong> 456 Shopping Mall, Level 2, Bengular, Karnataka- 560037</p>
      <p style="margin: 5px 0;"><strong>📞</strong> +91 94562 36785</p>
      <p style="margin: 5px 0;"><strong>✉️</strong> mall@company.com</p>
      <p style="margin: 5px 0;"><strong>🕒</strong> Mon-Sun: 10:00 AM - 9:00 PM</p>
    </div>
    <div style="text-align: center;">
      <div style="margin-bottom: 10px; background: #f1f1f1; padding: 10px; border-radius: 8px;">
        <p style="margin: 0; font-weight: bold;">Services Available</p>
        <span style="background: green; color: white; padding: 3px 10px; border-radius: 12px; margin: 2px; font-size: 12px;">Sales</span>
        <span style="background: green; color: white; padding: 3px 10px; border-radius: 12px; margin: 2px; font-size: 12px;">Demo</span>
      </div>
      <a href="#" style="text-decoration: none; background: #4caf50; color: white; padding: 10px 15px; border-radius: 5px; display: inline-block;">Get Directions</a>
    </div>
  </div>
</div>
<footer style="background-color: #2c2f33; color: #fff; text-align: center; padding: 15px; font-family: Arial, sans-serif; font-size: 14px;">
  © 2025 CRM System. </footer>

</body>
</html>
