<?php
require_once("layouts/header.php");
$sql = "select * from category";
$menuItem = executeResult($sql);
$sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by updated_at asc limit 0,8 ";
// Bắt đầu từ vị trị thứ 0 và lấy ra 8 phần tử 
$newProductItem = executeResult($sql);

$sql = "SELECT COUNT(*) FROM category";
$countResult = executeResult($sql);
$numberOfCategory = (int) $countResult[0]['COUNT(*)'];

$sql = "select name from category";
$categoryList = executeResult($sql);
?>
<style>
    .product_item img {
        transition: 0.3s;
    }

    .product_item img:hover {
        padding: 4px;
        cursor: pointer;
        background-color: #f0f1f2;
    }
</style>
<!-- Menuend-->
<!-- Slides show start -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="./asset/photo/tech2.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="./asset/photo/tech3.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="./asset/photo/tech4.jpg" alt="Third slide">
        </div>
    </div>
</div>
<!-- Slide show stop -->

<!-- New product -->
<h2 class="text-center mt-3 mb-3">Sản phẩm mới nhất</h2>
<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($newProductItem as $item) {
            echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item ">
            <a href="detail.php?id=' . $item['id'] . '"><img style="width:100%; height:70%" src="' . $item['thumbnail'] . '" alt=""></a>
            <a href="detail.php?id=' . $item['id'] . '"><p style="padding-top: 10px; font-weight;"  class="text-center h6">' . $item['title'] . '</p></a>
            <p style="color:red ;" class="text-center h6">' . number_format($item['discount']) . ' VND</p>
                    </div>';
        }
        ?>
    </div>
</div>

<!-- End New product -->

<?php

for ($i = 0; $i < $numberOfCategory; $i++) {
    $categoryId = $i + 1;
    $categoryName = $categoryList[$i]['name'];
    $products = executeResult("
        SELECT 
            product.*, 
            category.id AS category_id, 
            category.name AS name 
        FROM
            product 
            LEFT JOIN category ON category.id = $categoryId 
        WHERE 
            product.category_id = $categoryId 
        ORDER BY 
            updated_at DESC 
        LIMIT 
            0,4");

    echo '<a style="color: black;" href="/cookies/category.php?id='.$categoryId . '">'. '<h2 class="text-center mt-3 mb-3">' . $categoryName . '</h2>' . '</a>';
    echo '<div class="row container-fluid">';
    foreach ($products as $product) {
        echo '<div class="col-md-4 col-sm-6 col-lg-3 mb-1 product_item">
            <a href="detail.php?id=' . $product['id'] . '">
                <img style="width:100%; height:70%" src="' . $product['thumbnail'] . '" alt="">
            </a>
            <a href="detail.php?id=' . $product['id'] . '">
                <p style="padding-top: 10px;" class="text-center h6">' . $product['title'] . '</p>
            </a>
            <p style="color: red;" class="text-center h6">' . number_format($product['discount']) . ' VND</p>
        </div>';
    }
    echo '</div>';
}
?>

<?php
require_once('layouts/footer.php');
?>