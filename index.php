<?php
session_start();
include "./models/PDO.php";
include "./models/product.php";
include "./models/category.php";
include "./models/account.php";
$productList = getProductHomePage();
$categoryList = getAllCategory();
$top10Product = getTop10Product();
include "views/header.php";
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'about':
            include "about.php";
            break;
        case 'contact':
            include "contact.php";
            break;
        case 'productdetail':
            if (!isset($_GET['id']) || $_GET['id'] > 0) {
                # code...
                $sameCateProduct = getSameCateProduct($_GET['id']);
                $productDetail = getOneProduct($_GET['id']);
                include "views/productdetail.php";
            } else {
                include "views/home.php";
            }
            break;
        case 'signup':
            if (isset($_POST['signup'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $retype_password = $_POST['retype_password'];
                $phone = $_POST['phone'];
                $message = "";
                if ($password == $retype_password) {
                    $account = getAccount($email, $password);
                    if ($account) {
                        $message = "Tài khoản đã tồn tại";
                    } else {
                        $result = insertAccount($name, $email, $password, $phone);
                        $message = "Sign up successfully. Please go to the login page";
                    }
                } else {
                    $message =  "Mật khẩu không khớp";
                }
            }
            include "views/account/signup.php";
            break;
        case 'login':
            # code...
            $message = "";
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $account = getAccount($email, $password);
                if($account){
                    $_SESSION['account'] = $account;
                    
                    header("Location: index.php");
                }else{
                    $message = "Tài khoản hoặc mật khẩu không đúng";
                }
            }
            include "views/account/login.php";
            break;
        case 'logout':
            # code...
            unset($_SESSION['account']);
            header("Location: index.php");
            break;
        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}
include "./views/footer.php";

?>
