<?php
$fullname = $email = $msg = '';
if (!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');
    if (empty($fullname) || empty($email) || strlen($pwd) < 6) {
    } else {
        // validate thanh cong 
        $userExits = executeResult("select * from user where email = '$email'", true);
        if ($userExits != null) {
            $msg = 'Email đã được đăng kí trên hệ thống';
        } else {
            $created_at = $updated_at = date("Y-m-d H:i:s");
            $sql = " insert into user (fullname,email,password,role_id,created_at,updated_at,deleted) values ('$fullname','$email','$pwd',2,'$created_at','$updated_at',0) ";
            execute($sql);
            header('Location: login.php');
            die();
        }
    }
}
