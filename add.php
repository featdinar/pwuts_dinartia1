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
    (id_user, title, description, deadline, status)
    VALUES 
    ('$id_user', '$title', '$description', '$deadline', '$status')");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Study Plan</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="add-container">
    <h2>Add Study Plan</h2>

    <form method="POST">
        <input type="text" name="title" placeholder="Judul Tugas" required>
        <textarea name="description" placeholder="Deskripsi"></textarea>
        <input type="date" name="deadline" required>

        <select name="status" required>
            <option value="belum">Belum</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
        </select>

        <button type="submit" name="add">
            Simpan Study Plan
        </button>
    </form>

</div>

</body>
</html>