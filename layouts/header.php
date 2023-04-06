<?php
session_start();
require_once('utils/utility.php');
require_once('Database/dbhelper.php');
$user = getUserToken();
$sql = "select * from category";
$menuItem = executeResult($sql);
// print_r($user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cookie</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="icon" href="https://img.freepik.com/premium-vector/headphone-icon-illustration_17146-29.jpg?w=740"
        type="image/gif" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- Menustart -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img style="height: 50px; width: 50px;"
                src="./asset/logo/logo_trans.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Trang chủ <span
                        class="sr-only">(current)</span></a>
                <?php
                foreach ($menuItem as $item) {
                    echo '<a class="nav-item nav-link" href="category.php?id=' . $item['id'] . '">' . $item['name'] . '</a>';
                }
                ?>
                <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
            </div>

        </div>
        <div class="nav-item d-flex align-items-right">
            <img class="mr-2" style="width: 40px;height:40px;border-radius:80%"
                src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" alt="">
            <?php
            if ($user == null)
                echo '<a href="admin/authen/login.php"><button class="btn btn-outline-primary mt-1 ml-3">Đăng nhập</button></a>';
            else {
                echo '<a href="profile.php"><button class="btn btn-outline-primary mt-1 ml-3">Tài khoản</button></a>';
                echo '<a href="admin/authen/logout.php"><button class="btn btn-outline-danger mt-1 ml-3">Đăng xuất</button></a>';
            }
            ?>

            <!-- <p class="mt-2" style="font-weight:600; color: purple;"><?= ($user['fullname']) ?></p>
            <a href="../../Project_Webbanhang/admin/authen/logout.php"><button class="btn btn-danger mt-1 ml-3">Log
                    out</button></a> -->
        </div>

    </nav>