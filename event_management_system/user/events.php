<?php

session_start();
include("../config/db.php");

// Check if user is logged in
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>All Events</title>

<style>

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

body {
    margin: 0;
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
}

.container {
    padding: 40px;
    text-align: center;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
}

.card {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    width: 260px;
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-8px);
}

button {
    padding: 10px 18px;
    border: none;
    border-radius: 20px;
    background: #00ffd5;
    font-weight: bold;
    cursor: pointer;
}

.logout-btn {
    background: #ff4d4d;
    color: white;
}

.rg-btn{
    
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

<div class="header">

<h1>Available Events</h1>

<div class = "actions">
    <a href="my_registrations.php">
    <button class="rg-btn">My Registrations</button>
</a>

    <a href="logout.php">
    <button class="logout-btn">Logout</button>
</a>

</div>
</div>

<div class="cards">

<?php

while($row = mysqli_fetch_assoc($result)) {

?>

<div class="card">

<h2>
<?php echo $row['event_name']; ?>
</h2>

<p>
Date:
<?php echo $row['event_date']; ?>
</p>

<p>
Venue:
<?php echo $row['venue']; ?>
</p>

<p>
Seat Limit:
<?php echo $row['seat_limit']; ?>
</p>

<p>
Price:
₹<?php echo $row['price']; ?>
</p>

<p>
<?php echo $row['description']; ?>
</p>

<a href="register_event.php?event_id=<?php echo $row['event_id']; ?>">
    <button>Register</button>
</a>

</div>

<?php
}

?>

</div>

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
