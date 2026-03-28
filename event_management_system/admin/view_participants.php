<?php

include("../config/db.php");

// Get event ID from URL
$event_id = $_GET['event_id'];

// Get event details
$event_sql = "SELECT event_name FROM events WHERE event_id = '$event_id'";
$event_result = mysqli_query($conn, $event_sql);
$event = mysqli_fetch_assoc($event_result);

// Get participants using JOIN
$sql = "SELECT users.full_name, users.email, users.phone
        FROM registrations
        JOIN users ON registrations.user_id = users.user_id
        WHERE registrations.event_id = '$event_id'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>View Participants</title>

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

table {
    width: 80%;
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
    margin-top: 20px;
}

</style>

</head>

<body>

<div class="container">

<h1>Participants for Event:</h1>

<h2>
<?php echo $event['event_name']; ?>
</h2>

<table>

<tr>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)) {

?>

<tr>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php
}

?>

</table>

<a href="dashboard.php">
<button>Back to Dashboard</button>
</a>

</div>

</body>

</html>
