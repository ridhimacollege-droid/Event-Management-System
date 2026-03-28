<?php

include("../config/db.php");

$id = $_GET['id'];

// FETCH EXISTING EVENT DATA
$sql = "SELECT * FROM events WHERE event_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// UPDATE EVENT
if(isset($_POST['update']))
{
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $price = $_POST['price'];
    $seat_limit = $_POST['seat_limit'];
    $description = $_POST['description'];

    $update_sql = "UPDATE events SET 
                    event_name = '$event_name',
                    event_date = '$event_date',
                    venue = '$venue',
                    price = '$price',
                    seat_limit = '$seat_limit',
                    description = '$description'
                    WHERE event_id = $id";

    if(mysqli_query($conn, $update_sql))
    {
        header("Location: dashboard.php");
    }
    else
    {
        echo "Error updating record";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>Edit Event</title>

<style>

body {
    font-family: Segoe UI;
    background: linear-gradient(120deg,#0f2027,#203a43,#2c5364);
    color: white;
}

.container {
    width: 400px;
    margin: 50px auto;
    background: rgba(255,255,255,0.1);
    padding: 25px;
    border-radius: 15px;
}

input, textarea {
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
    background: orange;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Event</h2>

<form method="POST">

Event Name:
<input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" required>

Event Date:
<input type="date" name="event_date" value="<?php echo $row['event_date']; ?>" required>

Venue:
<input type="text" name="venue" value="<?php echo $row['venue']; ?>" required>

Price:
<input type="number" name="price" value="<?php echo $row['price']; ?>" required>

Seat Limit:
<input type="number" name="seat_limit" value="<?php echo $row['seat_limit']; ?>" required>

Description:
<textarea name="description" required><?php echo $row['description']; ?></textarea>

<button type="submit" name="update">
Update Event
</button>

</form>

</div>

</body>

</html>