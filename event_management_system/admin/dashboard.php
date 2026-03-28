<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
    exit();
}

?>

<?php

include("../config/db.php");

// DELETE EVENT
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $delete_sql = "DELETE FROM events WHERE event_id = $id";
    mysqli_query($conn, $delete_sql);

    header("Location: dashboard.php");
}

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
<title>Admin Dashboard</title>

<style>

body {
    margin: 0;
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
}

.header {
    padding: 20px;
    text-align: center;
    background: rgba(0,0,0,0.5);
}

.container {
    padding: 30px;
}

.add-btn {
    padding: 10px 18px;
    background: #00ffd5;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(255,255,255,0.1);
}

th, td {
    padding: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    text-align: center;
}

th {
    background: rgba(0,0,0,0.6);
}

.action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
}

.edit {
    background: orange;
}

.delete {
    background: red;
    color: white;
}

</style>

</head>

<body>

<div class="header">
<h1>Admin Dashboard</h1>
</div>

<div class="container">

<a href="add_event.php">
<button class="add-btn">
Add New Event
</button>
</a>

<table>

<tr>
<th>ID</th>
<th>Event Name</th>
<th>Date</th>
<th>Venue</th>
<th>Price</th>
<th>Seat Limit</th>
<th>Actions</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['event_id']; ?>
</td>

<td>
<?php echo $row['event_name']; ?>
</td>

<td>
<?php echo $row['event_date']; ?>
</td>

<td>
<?php echo $row['venue']; ?>
</td>

<td>
₹<?php echo $row['price']; ?>
</td>

<td>
<?php echo $row['seat_limit']; ?>
</td>

<td>

<a href="edit_event.php?id=<?php echo $row['event_id']; ?>">
<button class="action-btn edit">
Edit
</button>
</a>

<a href="dashboard.php?delete=<?php echo $row['event_id']; ?>" onclick="return confirm('Are you sure you want to delete this event?')">
<button class="action-btn delete">
Delete
</button>
</a>

<a href="view_participants.php?event_id=<?php echo $row['event_id']; ?>">
    <button>View Participants</button>
</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>