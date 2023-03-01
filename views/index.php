<?php
include "../models/PDO.php";
include "../models/product.php";
include "../models/category.php";
include "../models/account.php";
$productList = getProductHomePage();
$categoryList = getAllCategory();
$top10Product = getTop10Product();
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
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['retype_password']) && isset($_POST['phone'])){
                if($_POST['password'] == $_POST['retype_password']){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    insertAccount($name, $email, $password, $phone);
                }else{
                    echo "Mật khẩu không khớp";
                }
            }
            include "home.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
