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

        .navbar{
            background:#4f46e5;
            color:white;
            padding:20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .container{
            width:90%;
            margin:30px auto;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .btn{
            display:inline-block;
            padding:10px 18px;
            background:#4f46e5;
            color:white;
            text-decoration:none;
            border-radius:8px;
            margin-top:15px;
        }

        table{
            margin-top:20px;
        }

        th{
            background:#4f46e5;
            color:white;
        }

    </style>

</head>
<body>

    <div class="navbar">

        <h2>Study Plan Dashboard</h2>

        <div>
            Welcome,
            <?php echo $_SESSION['nama']; ?>
        </div>

    </div>

    <div class="container">

        <div class="card">

            <h2>Your Study Plans</h2>

            <p style="margin-top:10px;">
                Start managing your tasks here.
            </p>

            <a href="add.php" class="btn">
                + Add Study Plan
            </a>

            <br><br>

            <table width="100%" border="1" cellpadding="10" style="border-collapse:collapse;">

                <tr>
                    <th>Judul Tugas</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($data)) { ?>

                <tr>

                    <td><?php echo $row['title']; ?></td>

                    <td><?php echo $row['description']; ?></td>

                    <td><?php echo $row['deadline']; ?></td>

                    <td><?php echo $row['status']; ?></td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</body>
</html>