<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // For demo purposes only
    $message = "Password reset link has been sent to <strong>$email</strong>.";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: #f0f2f5;">

  <!-- Header Bar -->
  <div style="background: #2196f3; padding: 15px 30px; display: flex; align-items: center; justify-content: space-between; color: white;">
    <div style="display: flex; align-items: center;">
      <span style="font-size: 24px; margin-right: 10px;">👥</span>
      <h2 style="margin: 0; font-size: 22px;">CRM System</h2>
    </div>
  </div>

  <!-- Forgot Password Box -->
  <div style="display: flex; justify-content: center; align-items: center; height: calc(100vh - 80px);">
    <div style="background: white; padding: 40px; width: 400px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
      <h2 style="text-align: center; color: #2196f3;">Forgot Password</h2>
      <form method="POST" style="margin-top: 20px;">
        <input type="email" name="email" placeholder="Enter your email" required
               style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
        <input type="submit" value="Send Reset Link"
               style="width:100%; padding:12px; background:#2196f3; color:white; border:none; border-radius:5px; cursor: pointer;">
        <a href="login.php" style="display:block; text-align:center; margin-top:12px; color:#2196f3; text-decoration:none;">← Back to Login</a>
      </form>

      <?php if (isset($message)) {
        echo "<p style='color: green; text-align: center; margin-top: 15px;'>$message</p>";
      } ?>
    </div>
  </div>

</body>
</html>
