<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #ff7e5f, #feb47b);">

<div class="container mt-5">

    <h1 class="text-center text-white mb-4">🎟 Event Registration System</h1>

    <div class="card p-4 shadow-lg col-md-4 mx-auto" style="border-radius:20px;">
        <h3 class="text-center mb-3">Register</h3>

        <form method="POST">
            <input type="text" name="name" class="form-control mb-3" placeholder="Enter Name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

            <input type="text" name="phone" class="form-control mb-3" placeholder="Enter Phone Number" required>

            <button name="register" class="btn btn-success w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Already user? <a href="index.php">Login</a>
        </p>
    </div>

</div>

</body>
</html>

<?php
if(isset($_POST['register'])){
    $conn->query("INSERT INTO users(name,email,phone)
    VALUES('{$_POST['name']}','{$_POST['email']}','{$_POST['phone']}')");

    echo "<script>
    alert('Registered Successfully');
    window.location='index.php';
    </script>";
}
?>