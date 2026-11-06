<?php
include "db.php";

$id = $_GET['id'];

$query = "
SELECT u.name, e.title, e.date, e.venue, b.tickets
FROM bookings b
JOIN users u ON b.user_id = u.id
JOIN events e ON b.event_id = e.id
WHERE b.id = '$id'
";

$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Ticket</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">
    <div class="card p-5 text-center shadow-lg" style="border:2px dashed black;">

        <h2>🎟 Event Ticket</h2>
        <hr>

        <h4><?php echo $row['title']; ?></h4>

        <p><b>Name:</b> <?php echo $row['name']; ?></p>
        <p><b>Date:</b> <?php echo $row['date']; ?></p>
        <p><b>Venue:</b> <?php echo $row['venue']; ?></p>
        <p><b>Tickets:</b> <?php echo $row['tickets']; ?></p>

        <hr>
        <p>✅ Show this ticket at entry</p>
        <hr>
        <div class="text-center">
    <h5>Scan QR Code</h5>
    <img src="..." width="150">
</div>
  
</div>

</body>
</html>