<?php
$fullname = $email = $pwd = $msg = '';
if (!empty($_POST)) {
    $email = getPost('email');
    $pwd = getPost('password');
    $sql = "Select * from user where email = '$email' and password = '$pwd' and deleted = 0 ";
    $userExit = executeResult($sql, true);
    $sql2 = "Select * from user where email = '$email' and password = '$pwd' and deleted = 0 and role_id=2 ";
    $userExit2 = executeResult($sql2, true);
    if ($userExit == null) {
        $msg = 'Tên đăng nhập hoặc mật khẩu không đúng , vui lòng kiểm tra lại';
    } elseif ($userExit2 != null) {
        $_SESSION['user'] = $userExit;
        $token = $userExit['email'] . time();
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $userID = $userExit['id'];
        $created_at = date("Y-m-d H:i:s");
        $sql = "insert into tokens (user_id,token,created_at) values ('$userID','$token','$created_at') ";
        execute($sql);
        header('Location: ../../');
        die();
    } else {
        $_SESSION['user'] = $userExit;
        $token = $userExit['email'] . time();
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $userID = $userExit['id'];
        $created_at = date("Y-m-d H:i:s");
        $sql = "insert into tokens (user_id,token,created_at) values ('$userID','$token','$created_at') ";
        execute($sql);
        header('Location: ../');
        die();
    }
}
