<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn, "SELECT * FROM study_plan WHERE id='$id' AND id_user='$id_user'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['edit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE study_plan SET
    title='$title',
    description='$description',
    deadline='$deadline',
    status='$status'
    WHERE id='$id' AND id_user='$id_user'");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Study Plan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="add-container">

    <h2>Edit Study Plan</h2>

    <p class="form-subtitle">
        Perbarui data rencana belajarmu
    </p>

    <form method="POST">

        <input
            type="text"
            name="title"
            value="<?php echo $row['title']; ?>"
            required
        >

        <textarea name="description"><?php echo $row['description']; ?></textarea>

        <input
            type="date"
            name="deadline"
            value="<?php echo $row['deadline']; ?>"
            required
        >

        <select name="status" required>

            <option value="belum"
            <?php if($row['status']=='belum') echo 'selected'; ?>>
                Belum
            </option>

            <option value="proses"
            <?php if($row['status']=='proses') echo 'selected'; ?>>
                Proses
            </option>

            <option value="selesai"
            <?php if($row['status']=='selesai') echo 'selected'; ?>>
                Selesai
            </option>

        </select>

        <button type="submit" name="edit">
            Update Study Plan
        </button>

    </form>

    <a href="dashboard.php" class="back-link">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>