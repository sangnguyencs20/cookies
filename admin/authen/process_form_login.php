<?php
$fullname = $email = $pwd = $msg = '';
if (!empty($_POST)) {
    $email = getPost('email');
    $pwd = getPost('password');
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pwd' AND deleted = 0 ";
    $userExit = executeResult($sql, true);
    $sql2 = "SELECT * FROM user WHERE email = '$email' AND password = '$pwd' AND deleted = 0 AND role_id=2 ";
    $userExit2 = executeResult($sql2, true);
    if ($userExit == null) {
        $msg = 'Tên đăng nhập hoặc mật khẩu không đúng';
    } elseif ($userExit2 != null) {
        $_SESSION['user'] = $userExit;
        $token = $userExit['email'] . time();
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $userID = $userExit['id'];
        $created_at = date("Y-m-d H:i:s");
        $sql = "INSERT INTO tokens (user_id,token,created_at) VALUES ('$userID','$token','$created_at') ";
        execute($sql);
        header('Location: ../../');
        die();
    } else {
        $_SESSION['user'] = $userExit;
        $token = $userExit['email'] . time();
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $userID = $userExit['id'];
        $created_at = date("Y-m-d H:i:s");
        $sql = "INSERT INTO tokens (user_id,token,created_at) VALUES ('$userID','$token','$created_at') ";
        execute($sql);
        header('Location: ../');
        die();
    }
}
