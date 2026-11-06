<?php
include "db.php";

$result = $conn->query("SELECT * FROM registration");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Participants</title>
</head>
<body>

<h2>Registered Participants</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Event</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['event_name']}</td>
              </tr>";
    }
    ?>
</table>

</body>
</html>