<?php
include './Database/dbhelper.php';
// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];

    // Validate input data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo 'Invalid email address';
        exit;
    }

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        http_response_code(400);
        echo 'Vui lòng điền đầy đủ thông tin';
        exit;
    }

    // Update user profile in database
    // ...
    $sql = "UPDATE user SET fullname = '$name', email = '$email', phone_number = '$phone', address = '$address' WHERE id = '$id'";
    execute($sql);
    // Send success response
    echo 'Cập nhật thông tin thành công. Quay lại trang chủ <a href="./"> tại đây </a>';
    exit;
}