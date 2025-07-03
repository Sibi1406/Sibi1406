<?php
$conn = new mysqli("localhost", "root", "", "crm_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role     = $_POST["role"]; // 'admin' or 'user'

    if ($role !== 'admin' && $role !== 'user') {
        die("Invalid role submitted.");
    }

    $redirect_page = ($role === 'admin') ? "admin.html" : "index.php";

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if ($user['password'] === $password) {
            header("Location: $redirect_page");
            exit();
        } else {
            echo "<script>alert('Invalid password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found or role mismatch.'); window.history.back();</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CRM Login</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif; background: #f0f2f5;">

  <!-- Top Navigation/Header -->
  <div style="background: #2196f3; padding: 15px 30px; display: flex; align-items: center; justify-content: space-between; color: white;">
    <div style="display: flex; align-items: center;">
      <span style="font-size: 24px; margin-right: 10px;">👥</span>
      <h2 style="margin: 0; font-size: 22px;">CRM System</h2>
    </div>
  </div>
  <div style="position: absolute; top: 20px; right: 30px;">
  <a href="register.php" style="padding: 10px 18px; background: #2196f3; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Register</a>
</div>


 <!-- Login Boxes -->
<div style="display: flex; gap: 40px; justify-content: center; align-items: center; height: calc(100vh - 80px);">

  <!-- User Login -->
  <div style="background: white; padding: 40px; width: 350px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #2196f3;">User Login</h2>
    <form method="POST" action="login.php" style="margin-top: 20px;">
      <input type="hidden" name="role" value="user">
      <input type="text" name="username" placeholder="Username or Email" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
      <input type="password" name="password" placeholder="Password" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
      <input type="submit" value="Login as User" style="width:100%; padding:12px; background:#2196f3; color:white; border:none; border-radius:5px;">
      <a href="forgot_password.php" style="display:block; text-align:center; margin-top:12px; color:#2196f3; text-decoration:none;">Forgot Password?</a>
    </form>
  </div>

  <!-- Admin Login -->
  <div style="background: white; padding: 40px; width: 350px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #007bff;">Admin Login</h2>
    <form method="POST" action="login.php" style="margin-top: 20px;">
      <input type="hidden" name="role" value="admin">
      <input type="text" name="username" placeholder="Username or Email" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
      <input type="password" name="password" placeholder="Password" required style="width:100%; padding:12px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
      <input type="submit" value="Login as Admin" style="width:100%; padding:12px; background:#007bff; color:white; border:none; border-radius:5px;">
      <a href="forgot_password.php" style="display:block; text-align:center; margin-top:12px; color:#007bff; text-decoration:none;">Forgot Password?</a>
    </form>
  </div>

</div>


  <?php if (isset($error)) { ?>
    <p style="text-align: center; color: red; margin-top: 15px;"><?php echo $error; ?></p>
  <?php } ?>

</body>
</html>
