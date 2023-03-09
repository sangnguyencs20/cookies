<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Đăng kí</h5>
                        <form action="index.php?act=signup" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                <label for="name">Họ và tên</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                                <label for="password">Mật khẩu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Nhập lại mật khẩu" required>
                                <label for="retype_password">Nhập lại mật khẩu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                <label for="phone">Số điện thoại</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="signup" class="btn btn-primary btn-lg">Đăng kí</button>
                                <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
                            </div>
                        </form>
                        <h2 style="color: red;">
                            <?php
                            if (isset($message)) {
                                echo $message;
                                echo "<a href = 'index.php?act=login'>Login</a>";
                            }
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
</body>

</html>