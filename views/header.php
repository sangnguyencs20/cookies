<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- jQuery and Bootstrap JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../images/Cookie.png" alt="My Brand Logo" width="30" height="24" class="d-inline-block align-text-top">
                Cookie
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">iPhone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tablet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customers</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['account'])) {
                    extract($_SESSION['account']);
                    echo "Hello, ";
                    echo "<span class='text-primary'> $username</span>";
                    echo '<a class="nav-link" href="index.php?act=logout">Logout</a>';
                }
                ?>
            </div>
        </div>
    </nav>