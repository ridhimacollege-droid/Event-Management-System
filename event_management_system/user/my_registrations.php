<?php

session_start();
include("../config/db.php");

// Check if user is logged in
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch registered events for this user using JOIN
$sql = "SELECT events.event_name, events.event_date, events.venue, events.price, registrations.registration_date
        FROM registrations
        JOIN events ON registrations.event_id = events.event_id
        WHERE registrations.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>My Registrations</title>

<style>

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

table {
    width: 90%;
    margin: auto;
    border-collapse: collapse;
    background: rgba(255,255,255,0.1);
}

th, td {
    padding: 12px;
    border-bottom: 1px solid white;
}

th {
    background: rgba(0,255,213,0.3);
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

</style>

</head>

<body>

<div class="container">

<div class="header">

<h1>My Registered Events</h1>

<div>
<a href="events.php">
    <button>All Events</button>
</a>

<a href="logout.php">
    <button class="logout-btn">Logout</button>
</a>
</div>

</div>

<table>

<tr>
<th>Event Name</th>
<th>Date</th>
<th>Venue</th>
<th>Price</th>
<th>Registered On</th>
<!-- <th>Action</th> -->
</tr>

<?php

while($row = mysqli_fetch_assoc($result)) {

?>

<tr>
<td><?php echo $row['event_name']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['venue']; ?></td>
<td>₹<?php echo $row['price']; ?></td>
<td><?php echo $row['registration_date']; ?></td>
<!-- //td>
    //<a href="cancel_registration.php?event_id=<?php echo $row['event_id']; ?>">
       // <button>Cancel</button>
    //</a>
//</td>// -->
</tr>

<?php
}

?>

</table>

</div>

</body>

</html>
