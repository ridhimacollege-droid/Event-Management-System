<?php

include("../config/db.php");

if(isset($_POST['register']))
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users
        (full_name, email, password, phone)
        VALUES
        ('$full_name', '$email', '$password', '$phone')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Registration Successful');</script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>User Registration</title>

<style>

body {
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
}

.container {
    width: 400px;
    margin: 60px auto;
    background: rgba(255,255,255,0.1);
    padding: 25px;
    border-radius: 15px;
}

input {

    width: 100%;
    padding: 10px;
    margin-top: 10px;
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

<h2>User Registration</h2>

<form method="POST">

Full Name:
<input type="text" name="full_name" required>

Email:
<input type="email" name="email" required>

Password:
<input type="password" name="password" required>

Phone:
<input type="text" name="phone">

<button type="submit" name="register">

Register

</button>

</form>

</div>

</body>

</html>