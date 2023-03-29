<?php
session_start();
    require_once('../../utils/utility.php');
    require_once('../../Database/dbhelper.php');
    require_once('process_form_register.php');
    $user = getUserToken();
    if($user!=null){
        header('Location: ../');
        die();
    }
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
    <title>Đăng kí</title>

    <link rel="icon" href="../../asset/photo/user_register.png" type="image/x-icon" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../asset/css/authen_register.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Đăng kí tài khoản</h2>
                <h4 style="color:red" class="text-center"><?php echo $msg; ?></h4>
            </div>
            <form method="POST" onsubmit="return validateForm()" action="">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Họ và tên</label>
                        <input name="fullname" required="true" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" required="true" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="password" minlength="6" required="true" type="password" class="form-control"
                            id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="confirmation_pwd">Confirmation Password:</label>
                        <input required="true" type="password" class="form-control" id="confirmation_pwd">
                    </div>
                    <p><a href="login.php">Tôi đã có tài khoản</a></p>
                    <button type="submit" class="btn btn-success">Đăng ký</button>
                </div>

            </form>
        </div>
    </div>
    <script>
    function validateForm() {
        let pwd = document.querySelector("#pwd").value;
        let confirmPwd = document.querySelector("#confirmation_pwd").value;
        if (pwd != confirmPwd) {
            alert("Xác minh mật khẩu không đúng , vui lòng nhập lại")
            return false
        }
        return true;
    }
    </script>
</body>

</html>