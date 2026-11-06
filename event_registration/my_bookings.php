<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #36d1dc, #5b86e5);">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">📄 My Bookings</span>
        <div>
            <a href="event_register.php" class="btn btn-light btn-sm">Back</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card p-4 shadow-lg mx-auto" style="border-radius:15px; max-width:900px;">
        <h3 class="text-center mb-3">📋 My Bookings</h3>

        <div class="table-responsive">
        <table class="table table-striped table-hover text-center table-sm">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Tickets</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $query = "
            SELECT b.id, u.name, e.title, e.date, e.venue, b.tickets
            FROM bookings b
            JOIN users u ON b.user_id = u.id
            JOIN events e ON b.event_id = e.id
            WHERE b.user_id = '$user_id'
            ";

            $result = $conn->query($query);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['venue']; ?></td>
                    <td><?php echo $row['tickets']; ?></td>

                    <td>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            
                            <a href="cancel_booking.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure to cancel?')">
                            Cancel
                            </a>

                            <a href="ticket.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-primary btn-sm">
                            Download
                            </a>

                           <a href="https://wa.me/?text=🎟 Your Event Ticket:%0AName: <?php echo $row['name']; ?>%0AEvent: <?php echo $row['title']; ?>%0ALink: https://event-registration.infinityfreeapp.com/ticket.php?id=<?php echo $row['id']; ?>" 
target="_blank"
class="btn btn-success btn-sm">
Share
</a>

                        </div>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='6' class='text-danger'>No bookings found 😢</td></tr>";
            }
            ?>
            </tbody>
        </table>
        </div>

    </div>

</div>

</body>
</html>