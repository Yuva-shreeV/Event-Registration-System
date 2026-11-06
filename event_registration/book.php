<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    die("Please login first");
}

$user_id = $_SESSION['user_id'];
$event_id = $_POST['event_id'];
$tickets = $_POST['tickets'];

$conn->query("INSERT INTO bookings (user_id, event_id, tickets)
VALUES ('$user_id', '$event_id', '$tickets')");
?>

<!DOCTYPE html>
<html>
<head>
<title>Success</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #00c6ff, #0072ff);">

<div class="container mt-5 text-center">
    <div class="card p-5 shadow-lg" style="border-radius:20px;">
        
        <h1 class="text-success">🎉 Registration Successful!</h1>
        
        <p class="mt-3">Your event ticket has been booked successfully 🎟</p>
        <p><b>Number of Tickets:</b> <?php echo $tickets; ?></p>

        <a href="event_register.php" class="btn btn-primary mt-3">Back to Events</a>
    </div>
</div>

</body>
</html>