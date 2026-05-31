<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['id_user'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: dashboard.php");

    } else {
        echo "<script>alert('Email atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Study Plan - Login</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#eef1f5;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .container{
            width:350px;
            background:white;
            padding:35px;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            margin-bottom:10px;
        }

        p{
            text-align:center;
            color:gray;
            margin-bottom:25px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#4f46e5;
            color:white;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#4338ca;
        }

        .register-link{
            text-align:center;
            margin-top:15px;
        }

        .register-link a{
            text-decoration:none;
            color:#4f46e5;
            font-weight:bold;
        }
    </style>

</head>
<body>

<div class="container">
    <h1>Study Plan</h1>
    <p>Masuk ke akunmu</p>

    <form method="POST">
        <input type="email" name="email" placeholder="Alamat Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <div class="register-link">
        Belum punya akun?
        <a href="register.php">Register</a>
    </div>
</div>

</body>
</html>