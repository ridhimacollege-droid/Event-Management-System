<?php

session_start();
include("../config/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin 
            WHERE email='$email' 
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['admin'] = $email;

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Admin Credentials');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<style>

body {
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-box {
    background: rgba(255,255,255,0.1);
    padding: 30px;
    border-radius: 15px;
    width: 320px;
    text-align: center;
}

input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    border: none;
}

button {
    padding: 10px;
    width: 100%;
    background: #00ffd5;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    margin-top :15px;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Admin Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Admin Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">
Login
</button>

</form>

</div>

</body>

</html>