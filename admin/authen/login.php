<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../Database/dbhelper.php');
require_once('process_form_login.php');
$user = getUserToken();
if ($user != null) {
    header('Location: ../');
    die();
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
    <title>Đăng nhập</title>

    <link rel="icon" href="../../asset/photo/user_register.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../../asset/css/authen_register.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(219, 226, 226);
        }

        .row {
            background-color: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }

        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btnlogin {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-size: bold;
        }

        .btnlogin:hover {
            background-color: white;
            color: black;
            border: 1px solid;
        }
        
        /*fit section at the middle of the screen*/
        .Form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <section class="Form">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="../../asset/photo/setup.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h2 class="font-weight-bold py-3">Đăng nhập</h2>
                    <h10 style="color:red; font-style: italic"><?php echo $msg; ?></h10>
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <!-- <label for="email">Email:</label> -->
                                <input name="email" required="true" type="email" class="form-control my-3 py-4" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <!-- <label for="pwd">Password:</label> -->
                                <input name="password" minlength="6" required="true" type="password" class="form-control my-3 py-4" id="pwd" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btnlogin mt-3 mb-3">Đăng nhập</button>
                            </div>
                        </div>
                        <p>Không có tài khoản? <a href="register.php">Đăng kí tài khoản</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>