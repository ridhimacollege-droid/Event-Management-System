<?php

session_start();
include("../config/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['full_name'];

        header("Location: events.php");
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>User Login</title>

<style>

body {
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
}

.container {
    width: 400px;
    margin: 80px auto;
    background: rgba(255,255,255,0.1);
    padding: 25px;
    border-radius: 15px;
}

input {
    width: 95%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom : 15px;
    border-radius: 8px;
    border: none;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border: none;
    background: #00ffd5;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
}

/* ===== NAVBAR ===== */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(8px);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: #00ffd5;
}

.nav-links a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-weight: 500;
    position: relative;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #00ffd5;
}

.nav-links a::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #00ffd5;
    position: absolute;
    left: 0;
    bottom: -5px;
    transition: 0.3s;
}

.nav-links a:hover::after {
    width: 100%;
}

.h2{
    align : centre;
}

/* ===== FOOTER ===== */
.footer {
    background: black;
    padding: 20px;
    text-align: center;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">EventPro</div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="events.php">Events</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="#contact">Contact</a>
        <a href="/event_management_system/admin/admin_login.php">
            Admin
        </a>

    </div>
</div>

<div class="container">

<h2>User Login</h2>

<form method="POST">

Email:
<input type="email" name="email" required>

Password:
<input type="password" name="password" required>

<button type="submit" name="login">
Login
</button>

</form>

</div>

<!-- FOOTER -->
<!-- CONTACT SECTION -->

<div id="contact" class="footer">

<h2>Contact Us</h2>

<p>
📧 Email: eventpro@gmail.com
</p>

<p>
📞 Phone: +91 9876543210
</p>

<p>
📍 Address: ABC Event Management Pvt. Ltd., Delhi, India
</p>

<br>

<p>
© 2026 Event Management System | Developed for Academic Project
</p>

</div>

</body>

</html>