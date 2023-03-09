<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/styles/homepage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Trang chủ</title>
</head>

<header class="navbar navbar-expand-lg navbar-dark bg-dark position-relative">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/orange_lambda.png" alt="Brand Logo" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">iPhone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">iPad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mac</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Watch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Âm thanh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Phụ kiện</a>
                </li>

            </ul>
        </div>
        <form class="d-flex justify-content-center">
            <input class="form-control me-3" type="search" placeholder="Bạn đang tìm gì vậy...">
            <button class="btn btn-outline-secondary rounded-circle me-3" type="submit">
                <span style="font-size: 20px; color: white;">
                    <i class="fas fa-search"></i>
                </span>
            </button>
            <button class="btn btn-outline-secondary rounded-circle" type="button">
                <span style="font-size: 20px; color: white;">
                    <i class="fas fa-shopping-cart"></i>
                </span>
            </button>
        </form>
        <?php
            if (isset($_SESSION['account'])) {
                extract($_SESSION['account']);
                echo '<a class="nav-link" href="index.php?act=profile">' . $username . '</a>';
                echo '<a class="nav-link" href="index.php?act=logout">Đăng xuất</a>';
            } else {
                echo '<a class="nav-link" href="index.php?act=login">Đăng nhập</a>';
                echo '<a class="nav-link" href="index.php?act=signup">Đăng kí</a>';
            }
        ?>
    </div>
</header>