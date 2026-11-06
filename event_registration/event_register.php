<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #667eea, #764ba2);">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🎟 Event System</span>
        <div>
            <a href="my_bookings.php" class="btn btn-light btn-sm">My Bookings</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <h2 class="text-center text-white mb-4">🎉 Available Events</h2>

    <div class="row justify-content-center">
    <?php
    $result = $conn->query("SELECT * FROM events");

    while($row = $result->fetch_assoc()){
    ?>
        <div class="col-md-4 mb-4">

            <div class="card shadow-lg" style="border-radius:15px; overflow:hidden;">

                <div class="card-body text-center">

                    <h4 class="text-primary" style="white-space: nowrap;">
                        <?php echo $row['title']; ?>
                    </h4>

                    <p class="mb-1">📅 <b><?php echo $row['date']; ?></b></p>
                    <p class="mb-1">📍 <?php echo $row['venue']; ?></p>
                    <p class="mb-2 text-success">💰 ₹<?php echo $row['price']; ?></p>

                    <form action="book.php" method="POST">
                        <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">

                        <input type="number" name="tickets" 
                        class="form-control mb-2 text-center" 
                        placeholder="Enter tickets" required>

                        <button class="btn btn-success w-100">🎟 Book Now</button>
                    </form>

                </div>

            </div>

        </div>
    <?php } ?>
    </div>

</div>

</body>
</html>