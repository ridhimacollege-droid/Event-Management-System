<?php

include("../config/db.php");

if(isset($_POST['submit']))
{
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $price = $_POST['price'];
    $seat_limit = $_POST['seat_limit'];
    $description = $_POST['description'];

    $sql = "INSERT INTO events
            (event_name, event_date, venue, price, seat_limit, description)
            VALUES
            ('$event_name', '$event_date', '$venue', '$price', '$seat_limit', '$description')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Event Added Successfully');</script>";
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
<title>Add Event</title>

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
    background: #00ffd5;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
}

</style>

</head>

<body>

<div class="container">

<h2>Add New Event</h2>

<form method="POST">

Event Name:
<input type="text" name="event_name" required>

Event Date:
<input type="date" name="event_date" required>

Venue:
<input type="text" name="venue" required>

Price:
<input type="number" name="price" required>

Seat Limit:
<input type="number" name="seat_limit" required>

Description:
<textarea name="description" required></textarea>

<button type="submit" name="submit">
Add Event
</button>

</form>

</div>

</body>

</html>