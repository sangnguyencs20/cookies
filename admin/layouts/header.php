<?php
session_start();
require_once($baseUrl.'../utils/utility.php');
require_once($baseUrl.'../Database/dbhelper.php');
$user = getUserToken();
if($user==null){
    header('Location: '.$baseUrl.'authen/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div style="background-color: black;display:flex;justify-content:space-around;"
                class="w-100 p-1 col-md-2 col-sm-4">
                <p style="color: white; text-align: center; margin-top: 10px" class="name">
                    <?=$user['fullname']?>
                </p>
                <img class="mt-2 ml-3" style="width: 40px; height:40px;border-radius:50%"
                    src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" alt="">
            </div>
            
            <div class="col-md-1 col-sm-1">
                <a href="<?=$baseUrl?>authen/logout.php"><button
                        class="w-100 h-100 p-1 btn btn-danger ">Exit</button></a>
            </div>
        </div>
        <div class="row">
            <div style="height: 120vh" class="col-md-2 bg-secondary">
                <ul style="list-style: none" class="d-flex flex-column">
                    <li>
                        <a style="color: white; font-size: 14px" href="../" class="nav-link">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>category/" class="nav-link">
                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                            Danh mục sản phẩm
                        </a>
                    </li>
                    <li>
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>product/" class="nav-link">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li>
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>order/" class="nav-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Quản lý đơn hàng
                        </a>
                    </li>
                    <li>
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>feedback/" class="nav-link">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            Quản lý phản hồi
                        </a>
                    </li>
                    <li>
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>user/" class="nav-link">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            Quản lý người dùng
                        </a>
                    </li>
                </ul>
            </div>
            <main role="main" class="col-md-10 px-4">