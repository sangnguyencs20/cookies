<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

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
    body {
        background-color: #1b1f24;
    }

    a:hover {
        text-decoration: none;
    }

    .product_item img {
        transition: 0.3s;
    }

    .product_item img:hover {
        padding: 4px;
        cursor: pointer;
        background-color: #f0f1f2;
    }

    #commitments {
        display: flex;
        margin: 3%;
        justify-content: space-between;
        align-items: center;
    }

    .commitment {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .commit-text {
        margin-top: 5%;
        color: white;
    }
</style>
<!-- Menuend-->
<!-- Slides show start -->
<!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
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
</div> -->
<!-- Slide show stop -->

<div id="HomepageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        // Get all the images in the asset/promotion directory
        $images = glob("asset/promotion/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

        // Loop through each image and generate an indicator button
        foreach ($images as $key => $image) {
            $active = ($key == 0) ? 'active' : '';
            echo '<button type="button" data-bs-target="#HomepageCarousel" data-bs-slide-to="' . $key . '" class="' . $active . '" aria-label="Slide ' . ($key + 1) . '"></button>';
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        // Loop through each image and generate a carousel item
        foreach ($images as $key => $image) {
            $active = ($key == 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $active . '">';
            echo '<img src="' . $image . '" class="d-block w-100" alt="...">';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div id="commitments">
    <div class="commitment">
        <span style="font-size: 20px; color: rgb(255, 255, 255);">
            <i class="far fa-check-circle fa-2x"></i>
        </span>
        <p class="commit-text">Mẫu mã đa dạng, chính hãng</p>
    </div>

    <div class="commitment">
        <span style="font-size: 20px; color: rgb(255, 255, 255);">
            <i class="fas fa-truck fa-2x"></i>
        </span>
        <p class="commit-text"">Giao hàng toàn quốc</p>
    </div>

    <div class=" commitment">
            <span style="font-size: 20px; color: rgb(255, 255, 255);">
                <i class="fas fa-shield-alt fa-2x"></i>
            </span>
        <p class="commit-text"">Bảo hành lên đến 12 tháng</p>
    </div>
    
    <div class=" commitment">
            <span style="font-size: 20px; color: rgb(255, 255, 255);">
                <i class="fas fa-redo fa-2x"></i>
            </span>
        <p class="commit-text"">Đổi trả tại các cửa hàng thuộc hệ thống</p>
    </div>
  </div>


<!-- New product -->
<div class="mb-2">
<h2 class=" text-center mt-3 mb-3 text-white">Sản phẩm mới nhất</h2>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($newProductItem as $item) {
                    echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item">
            <a href="detail.php?id=' . $item['id'] . '"><img style="width:100%; height:70%; border-radius: 25px;" src="' . $item['thumbnail'] . '" alt=""></a>
            <a href="detail.php?id=' . $item['id'] . '"><p style="padding-top: 10px; font-weight; color: white;"  class="text-center">' . $item['title'] . '</p></a>
            <p style="color:white ;" class="text-center h6">' . number_format($item['discount']) . ' VND</p>
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

            echo '<a style="color: white;" href="./category.php?id=' . $categoryId . '">' . '<h2 class="text-center mt-3 mb-3">' . $categoryName . '</h2>' . '</a>';
            echo '<div class="row container-fluid">';
            foreach ($products as $product) {
                echo '<div class="col-md-4 col-sm-6 col-lg-3 mb-1 product_item">
            <a href="detail.php?id=' . $product['id'] . '">
                <img style="width:100%; height:70%; border-radius: 25px;" src="' . $product['thumbnail'] . '" alt="">
            </a>
            <a href="detail.php?id=' . $product['id'] . '">
                <p style="padding-top: 10px; color: white" class="text-center">' . $product['title'] . '</p>
            </a>
            <p style="color: white;" class="text-center h6">' . number_format($product['discount']) . ' VND</p>
        </div>';
            }
            echo '</div>';
        }
        ?>
</div>

        <?php
        require_once('layouts/footer.php');
        ?>