<?php
include "../models/PDO.php";
include "../models/category.php";
include "../models/product.php";
include "header.php";
//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //controller for category
        case 'addCategory':
            if (isset($_POST['addNewCate']) && ($_POST['addNewCate'])) {
                $cateName = $_POST['cateName'];
                $img = $_FILES['img']['name'];
                $target_dir = "../images/categories";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                addCategory($cateName, $img);
                $noti = "Add successfully";
            }
            include "category/add.php";
            break;
        case 'cateList':
            $cateList = getAllCategory();
            include "category/cateList.php";
            break;
        case 'deleteCate':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
                deleteCategory($id);
            }
            $cateList = getAllCategory();
            include "category/cateList.php";
            break;
        case 'editCate':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
                $cateList = getOneCategory($id);
            }
            include "category/updateCate.php";
            break;
        case 'updateCate':
            if (isset($_POST['updateCate']) && ($_POST['updateCate'])) {
                $id = $_POST['id'];
                $cateName = $_POST['cateName'];
                updateCategory($id, $cateName);
            }
            $cateList = getAllCategory();
            include "category/cateList.php";
            break;


            // ========================================= // 
            // controller for product
        case 'addProduct':
            if (isset($_POST['addNewProduct']) && ($_POST['addNewProduct'])) {
                $productName = $_POST['productName'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $img = $_FILES['img']['name'];
                $cateId = $_POST['cateId'];
                $target_dir = "../uploads";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                addProduct($productName, $price, $img, $description, $cateId);
                $noti = "Add successfully";
            }
            $cateList = getAllCategory();
            include "product/add.php";
            break;
        case 'productList':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $keyword = $_POST['keyword'];
                $cate = $_POST['cate'];
            }
            else{
                $keyword = "";
                $cate = 0;
            }
            $cateList = getAllCategory();
            $productList = getAllProduct($keyword, $cate);
            
            include "product/productList.php";
            break;
        case 'deleteProduct':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
                deleteProduct($id);
            }
            $productList = getAllProduct("", 0);
            include "product/productList.php";
            break;
        case 'editProduct':
            if (isset($_GET['id']) && ($_GET['id'])) {
                $id = $_GET['id'];
                $productList = getOneProduct($id);
            }
            $cateList = getAllCategory();
            include "product/updateProduct.php";
            break;
        case 'updateProduct':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $productName = $_POST['productName'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $img = $_FILES['img']['name'];
                $cateId = $_POST['cateId'];
                $target_dir = "../uploads";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                updateProduct($id, $productName, $price, $img, $description, $cateId);
            }
            $productList = getAllProduct("", 0);
            $noti = "Update successfully";
            include "product/productList.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
