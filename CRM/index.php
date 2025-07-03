<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRM System</title>
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
      <a href="index.php" style="color: white; margin-right: 20px; text-decoration: none; background: rgba(255,255,255,0.2); padding: 5px 10px; border-radius: 5px;">🏠 Home</a>
      <a href="products.php" style="color: white; margin-right: 20px; text-decoration: none;">📦 Products</a>
      <a href="outlets.php" style="color: white; margin-right: 20px; text-decoration: none;">📍 Outlets</a>
      <a href="pricing.php" style="color: white; margin-right: 20px; text-decoration: none;">💲 Pricing</a>
      <a href="complaints.php" style="color: white; text-decoration: none;">⚠️ Complaints</a>
    </div>
  </div>



<div style="position: relative; text-align: center; padding: 80px 20px; background-image: url('CRMimage.png'); background-size: cover; background-position: center;">
  <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); z-index: 1;"></div>
  <div style="position: relative; z-index: 2; color: white;">
    <h1 >Welcome to CRM System</h1>
    <p >
      Manage your customer relationships efficiently with our comprehensive CRM solution. Access product information, outlet details, pricing, and handle customer complaints all in one place.
      <br><br>
      Our system is designed to help you streamline your customer engagement, track service history, and make informed decisions with real-time data insights. Whether you're a growing startup or an established enterprise, our CRM tools adapt to your business needs, improve team collaboration, and enhance customer satisfaction.
      <br><br>
      With a user-friendly interface and powerful features, you can easily manage contacts, monitor sales pipelines, respond to feedback, and ensure every interaction counts.
    </p>
     <a href="products.php" style="display: inline-block; margin-top: 10px; background: #2196f3; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Explore Products</a>
  </div>
</div>

  
    


  






  
 
<!-- Cards Section including Complaint Card -->
<div style="display: flex; justify-content: center; gap: 20px; padding: 0 20px; flex-wrap: wrap;margin-top: 60px;">
  <!-- Product Features -->
  <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; width: 280px;">
    <div style="font-size: 32px; color: #2196f3;">📦</div>
    <h3>Product Features</h3>
    <p style="color: #666;">Search and explore our product catalog with detailed features and specifications.</p>
    <a href="products.php" style="display: inline-block; margin-top: 10px; background: #2196f3; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Explore Products</a>
  </div>

  <!-- Company Outlets -->
  <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; width: 280px;">
    <div style="font-size: 32px; color: #4caf50;">📍</div>
    <h3>Company Outlets</h3>
    <p style="color: #666;">Find our outlets and locations with contact information and operating hours.</p>
    <a href="outlets.php" style="display: inline-block; margin-top: 10px; background: #4caf50; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Find Outlets</a>
  </div>

  <!-- Pricing Details -->
  <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; width: 280px;">
    <div style="font-size: 32px; color: #f44336;">💲</div>
    <h3>Pricing Details</h3>
    <p style="color: #666;">View comprehensive pricing information for all our products and services.</p>
    <a href="pricing.php" style="display: inline-block; margin-top: 10px; background: #f44336; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">View Pricing</a>
  </div>

  <!-- Register Complaint -->
  <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; width: 280px;">
    <div style="font-size: 32px; color: #777;">⚠️</div>
    <h3>Register Complaint</h3>
    <p style="color: #666;">Submit your complaints and feedback. We're committed to resolving your concerns promptly.</p>
    <a href="complaints.php" style="display: inline-block; margin-top: 10px; background: #777; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Register Complaint</a>
  </div>
</div>
</div> <!-- End of flex: 1 content -->



<footer style="background-color: #2c2f33; color: #fff; text-align: center; padding: 15px; font-family: Arial, sans-serif; font-size: 14px;">
  © 2025 CRM System. </footer>

</body>
</html>
