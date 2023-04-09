<?php
session_start();
require_once('utils/utility.php');
require_once('Database/dbhelper.php');
$user = getUserToken();

$sql = "select * from category";
$menuItem = executeResult($sql);

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

<style>
    .search-bar {
        width: 300px;
        border-radius: 20px;
        background-color: #fff;
        padding: 10px;
        border: none;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<body style="background-color: 1b1f24">
    <!-- Menustart -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3e4551">
        <a class="navbar-brand" href="index.php"><img style="height: 50px; width: 50px;"
                src="./asset/logo/logo_trans.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white" href="index.php">Trang chủ <span
                        class="sr-only">(current)</span></a>
                <?php
                foreach ($menuItem as $item) {
                    echo '<a class="nav-item nav-link text-white" href="category.php?id=' . $item['id'] . '">' . $item['name'] . '</a>';
                }
                ?>
                <a href="contact.php" class="nav-item nav-link text-white">Liên hệ</a>
            </div>

        </div>

        <div class="nav-item d-flex align-items-right">

            <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
                <input class="form-control mr-sm-3 mt-1 search-bar btn-sm" style="border-radius: 10px;" type="text" placeholder="Bạn đang tìm gì đấy?"
                    aria-label="Search" name="keyword">
                <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
            <?php
            if ($user == null) {
                echo '<a href="admin/authen/register.php"><button class="btn btn-primary mt-1 ml-3 btn-sm">Đăng ký</button></a>';
                echo '<a href="admin/authen/login.php"><button class="btn btn-primary mt-1 ml-3 btn-sm">Đăng nhập</button></a>';
            } else {
                $id = $user['id'];
                echo '<a href="profile.php?id=' . $id . '"><button class="btn btn-primary mt-1 ml-3 btn-sm">Tài khoản</button></a>';
                echo '<a href="admin/authen/logout.php"><button class="btn btn-danger mt-1 ml-3 btn-sm">Đăng xuất</button></a>';
            }
            ?>

            <!-- <p class="mt-2" style="font-weight:600; color: purple;"><?= ($user['fullname']) ?></p>
            <a href="../../Project_Webbanhang/admin/authen/logout.php"><button class="btn btn-danger mt-1 ml-3">Log
                    out</button></a> -->
        </div>

    </nav>