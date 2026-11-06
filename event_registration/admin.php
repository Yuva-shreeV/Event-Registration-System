<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f4f4f4;">

<div class="container mt-5">

    <h2 class="text-center mb-4">🧑‍💼 Admin Panel</h2>

    <!-- 🔹 ADD EVENT -->
    <div class="card p-4 mb-5 shadow">
        <h4 class="mb-3">➕ Add Event</h4>

        <form method="POST">
            <input type="text" name="title" class="form-control mb-2" placeholder="Event Title" required>
            <input type="date" name="date" class="form-control mb-2" required>
            <input type="text" name="venue" class="form-control mb-2" placeholder="Venue" required>
            <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
            <input type="text" name="image" class="form-control mb-2" placeholder="Image URL">

            <button name="add_event" class="btn btn-success">Add Event</button>
        </form>

        <?php
        if(isset($_POST['add_event'])){
            $title = $_POST['title'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $price = $_POST['price'];
            $image = $_POST['image'];

            $conn->query("INSERT INTO events(title, date, venue, price, image) 
            VALUES('$title','$date','$venue','$price','$image')");

            echo "<p class='text-success mt-2'>✅ Event Added!</p>";
        }
        ?>
    </div>

    <!-- 🔹 VIEW ALL BOOKINGS -->
    <div class="card p-4 shadow">
        <h4 class="mb-3">📊 All Registered Bookings</h4>

        <div class="table-responsive">
        <table class="table table-bordered text-center table-sm">

            <tr class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Event</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Tickets</th>
                <th>Ticket</th>
            </tr>

            <?php
            $query = "
            SELECT b.id, u.name, u.email, u.phone, e.title, e.date, e.venue, b.tickets
            FROM bookings b
            JOIN users u ON b.user_id = u.id
            JOIN events e ON b.event_id = e.id
            ";

            $result = $conn->query($query);

            while($row = $result->fetch_assoc()){
            ?>

            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['venue']; ?></td>
                <td><?php echo $row['tickets']; ?></td>

                <td>
                    <a href="ticket.php?id=<?php echo $row['id']; ?>" 
                    class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>

            <?php } ?>

        </table>
        </div>

    </div>

</div>

</body>
</html>