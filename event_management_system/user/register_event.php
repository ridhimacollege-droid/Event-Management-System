<?php

session_start();
include("../config/db.php");

/* Check if user is logged in */
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$event_id = $_GET['event_id'];

/* Check if already registered */
$check_sql = "SELECT * FROM registrations 
              WHERE user_id='$user_id' 
              AND event_id='$event_id'";

$check_result = mysqli_query($conn, $check_sql);

if(mysqli_num_rows($check_result) > 0)
{
    echo "<script>alert('You have already registered for this event');</script>";
    echo "<script>window.location.href='events.php';</script>";
    exit();
}

/* Check seat limit */
$seat_sql = "SELECT seat_limit FROM events 
             WHERE event_id='$event_id'";

$seat_result = mysqli_query($conn, $seat_sql);
$event = mysqli_fetch_assoc($seat_result);

$seat_limit = $event['seat_limit'];

/* Count current registrations */
$count_sql = "SELECT COUNT(*) as total 
              FROM registrations 
              WHERE event_id='$event_id'";

$count_result = mysqli_query($conn, $count_sql);
$count_data = mysqli_fetch_assoc($count_result);

$current_registrations = $count_data['total'];

if($seat_limit != 0 && $current_registrations >= $seat_limit)
{
    echo "<script>alert('Sorry, seats are full');</script>";
    echo "<script>window.location.href='events.php';</script>";
    exit();
}

/* Insert registration */
$sql = "INSERT INTO registrations 
        (user_id, event_id) 
        VALUES 
        ('$user_id', '$event_id')";

if(mysqli_query($conn, $sql))
{
    echo "<script>alert('Registration Successful');</script>";
}
else
{
    echo "<script>alert('Error in registration');</script>";
}

header("Location: events.php");

?>