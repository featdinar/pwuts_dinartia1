<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn, "SELECT * FROM study_plan WHERE id_user='$id_user'");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="dashboard-navbar">

        <h2>Study Plan Dashboard</h2>

        <div>
            Welcome,
            <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?>
        </div>

    </div>

    <div class="dashboard-container">

        <div class="dashboard-card">

            <div class="dashboard-header">

                <div class="dashboard-title">
                    <h2>Your Study Plans</h2>
                    <p>Start managing your tasks here.</p>
                </div>

                <a href="add.php" class="dashboard-btn">
                    + Add Study Plan
                </a>

            </div>

            <div class="task-box">

                <table class="dashboard-table">

                    <tr>
                        <th>Judul Tugas</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                    <?php while($row = mysqli_fetch_assoc($data)) { ?>

                    <tr>

                        <td><?php echo $row['title']; ?></td>

                        <td><?php echo $row['description']; ?></td>

                        <td><?php echo $row['deadline']; ?></td>

                        <td><?php echo $row['status']; ?></td>

                        <td>

                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-btn">
                                Edit
                            </a>

                            <a href="delete.php?id=<?php echo $row['id']; ?>" 
                            class="delete-btn"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                </table>

            </div>

        </div>

    </div>

</body>
</html>