<?php
session_start();
require_once('utils/utility.php');
require_once('Database/dbhelper.php');
$user = getUserToken();

$sql = "SELECT * from category";
$menuItem = executeResult($sql);

?>



<!DOCTYPE html>
<html lang="en">
<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

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

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
        <div class="container-fluid">
            <a class="navbar-brand" href="./"><img style="height: 50px; width: 50px;" src="./asset/logo/logo_trans.png"
                    alt=""></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav">
                    <a class="nav-item nav-link text-white" href="./">Trang chủ <span
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
                <form class="form-inline my-1 my-lg-0" action="search.php" method="POST">
                    <input class="form-control mr-sm-2 mt-1 search-bar btn-sm" style="border-radius: 10px;" type="text"
                        placeholder="Bạn đang tìm gì đấy?" aria-label="Search" name="keyword">
                    <!-- <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Tìm kiếm</button> -->
                </form>
                <div class="dropdown my-1 mx-2 btn-sm">
                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="userDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tài khoản
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php
                        if ($user == null) {
                            echo '<a class="dropdown-item" href="admin/authen/register.php">Đăng ký</a>';
                            echo '<a class="dropdown-item" href="admin/authen/login.php">Đăng nhập</a>';
                        } else {
                            $id = $user['id'];
                            echo '<a class="dropdown-item" href="profile.php?id=' . $id . '">Thông tin của tôi</a>';
                            echo '<a class="dropdown-item" href="purchase.php?id=' . $id . '">Đơn hàng</a>';
                            echo '<a class="dropdown-item" href="admin/authen/logout.php">Đăng xuất</a>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Include the required JavaScript and jQuery libraries -->



                <!-- <p class="mt-2" style="font-weight:600; color: purple;"><?= ($user['fullname']) ?></p>
<a href="../../Project_Webbanhang/admin/authen/logout.php"><button class="btn btn-danger mt-1 ml-3">Log
    out</button></a> -->
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>