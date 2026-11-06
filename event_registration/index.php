<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: event_register.php");
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #ff7e5f, #feb47b);">

<div class="container mt-5">

    <h1 class="text-center text-white mb-4">🎟 Event Registration System</h1>

    <div class="card p-4 shadow-lg col-md-4 mx-auto" style="border-radius:20px;">
        <h3 class="text-center mb-3">Login</h3>

        <form method="POST">
            <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

            <button name="login" class="btn btn-dark w-100">Login</button>
        </form>

        <p class="text-center mt-3">
            New user? <a href="register.php">Register</a>
        </p>
    </div>

</div>

</body>
</html>