<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Complaint - CRM System</title>
</head>
<<body style="margin:0; font-family:Arial, sans-serif; background-color:#f4f7fa;">

  <!-- Navigation Bar -->
  <div style="background: #2196f3; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; color: white;">
    <div style="display: flex; align-items: center;">
      <span style="font-size: 24px;">👥</span>
      <h2 style="margin: 0 0 0 10px;">CRM System</h2>
    </div>
    <div>
      <a href="index.php" style="color: white; margin-right: 20px; text-decoration: none;">🏠 Home</a>
      <a href="products.php" style="color: white; margin-right: 20px; text-decoration: none;">📦 Products</a>
      <a href="outlets.php" style="color: white; margin-right: 20px; text-decoration: none;">📍 Outlets</a>
      <a href="pricing.php" style="color: white; margin-right: 20px; text-decoration: none;">💲 Pricing</a>
      <a href="complaints.php" style="background: #512da8; padding: 6px 12px; border-radius: 5px; color: white; text-decoration: none;">⚠️ Complaints</a>
    </div>
  </div>

  <!-- Complaint Form -->
  <div style="max-width: 800px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2>Register Complaint</h2>
    <p style="color:#555;">We value your feedback and are committed to resolving your concerns promptly</p>
    <form action="submit_complaint.php" method="post">

      <!-- Customer Information -->
      <h3>Customer Information</h3>
      <div style="display:flex; gap:20px; margin-bottom:15px;">
        <input name="fullname" type="text" placeholder="Full Name *" required style="flex:1; padding:10px;">
        <input name="email" type="email" placeholder="Email Address *" required style="flex:1; padding:10px;">
      </div>
      <div style="display:flex; gap:20px; margin-bottom:20px;">
        <input name="phone" type="text" placeholder="Phone Number" style="flex:1; padding:10px;">
        <input name="customer_id" type="text" placeholder="Customer ID (if available)" style="flex:1; padding:10px;">
      </div>

      <!-- Complaint Details -->
      <h3>Complaint Details</h3>
      <select name="category" required style="width:100%; padding:10px; margin-bottom:15px;">
        <option value="">Select a category</option>
        <option value="Product Issue">Product Issue</option>
        <option value="Service Delay">Service Delay</option>
        <option value="Billing Error">Billing Error</option>
        <option value="Other">Other</option>
      </select>

      <div style="margin-bottom: 15px;">
        <label>Priority Level:</label><br>
        <label><input type="radio" name="priority" value="Low" checked> Low</label>
        <label style="margin-left: 15px;"><input type="radio" name="priority" value="Medium"> Medium</label>
        <label style="margin-left: 15px;"><input type="radio" name="priority" value="High"> High</label>
        <label style="margin-left: 15px;"><input type="radio" name="priority" value="Urgent"> Urgent</label>
      </div>

      <input name="subject" type="text" placeholder="Subject" style="width:100%; padding:10px; margin-bottom:15px;">

      <textarea name="description" placeholder="Detailed Description *" required style="width:100%; padding:10px; height:100px; margin-bottom:15px;"></textarea>

      <textarea name="resolution" placeholder="Preferred Resolution" style="width:100%; padding:10px; height:60px; margin-bottom:20px;"></textarea>

      <!-- Additional Info -->
      <h3>Additional Information</h3>
      <input name="reference" type="text" placeholder="Order/Reference Number" style="width:100%; padding:10px; margin-bottom:15px;">
      <input name="incident_date" type="date" style="width:100%; padding:10px; margin-bottom:15px;">
      
      <label><input name="follow_up" type="checkbox" value="Yes"> I would like to receive follow-up communications about this complaint</label>

      <!-- Submit Buttons -->
      <div style="margin-top:20px; display:flex; gap:20px;">
        <button type="submit" style="padding:10px 20px; background:#2196f3; color:white; border:none; border-radius:5px;">🚀 Submit Complaint</button>
        <button type="reset" style="padding:10px 20px; background:#f0f0f0; border:1px solid #ccc; border-radius:5px;">🔄 Reset Form</button>
      </div>
    </form>
  </div>
<footer style="background-color:#2c2f33; color: #fff; text-align: center; padding: 15px; font-family: Arial, sans-serif; font-size: 14px;">
  © 2025 CRM System. </footer>

</body>
</html>
