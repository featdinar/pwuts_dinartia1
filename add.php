<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['add'])) {

    $id_user = $_SESSION['id_user'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    mysqli_query($conn, "INSERT INTO study_plan 
    VALUES('', '$id_user', '$title', '$description', '$deadline', '$status')");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Study Plan</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#eef1f5;
        }

        .container{
            width:400px;
            background:white;
            margin:50px auto;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        input, textarea, select{
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

    </style>

</head>
<body>

<div class="container">

    <h2>Add Study Plan</h2>

    <form method="POST">

        <input type="text" name="title" placeholder="Judul tugas" required>

        <textarea name="description" placeholder="Deskripspi"></textarea>

        <input type="date" name="Tenggat Waktu" required>

        <select name="Status">

            <option value="belum">Belum</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>

        </select>

        <button type="submit" name="add">
            Save Study Plan
        </button>

    </form>

</div>

</body>
</html>