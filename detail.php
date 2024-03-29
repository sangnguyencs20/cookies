<?php
require_once("layouts/header.php");
$productId = getGet('id');

$sql = "SELECT product.*,category.name as category_name from product left join category on product.category_id = category.id where product.id = $productId";
$product = executeResult($sql, true);
$category_id = $product['category_id'];
$sql = "SELECT product.*,category.name as category_name from product left join category on product.category_id = category_id where product.category_id = $category_id limit 0,4";
$relatedProduct = executeResult($sql);

?>

<link rel="stylesheet" href="asset/css/detail.css">
<link rel="stylesheet" href="asset/css/detail-reponsive.css">
<script src="https://kit.fontawesome.com/705f176f0b.js" crossorigin="anonymous"></script>

<style>
    body {
        background-color: #1b1f24;
    }
</style>

<!-- Menuend-->
<!-- New product -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">
            <h2><?= $product['title'] ?></h2>
        </li>
    </ol>
</nav>
<div class="container" style="background-color: #1b1f24;">

    <div class="container-fluid pb-5 bd-bottom">
        <div class="row">
            <div class="col-md-6 pr-4">
                <img style="width: 100%; border-radius:32px; position:sticky; top:0; margin-top:24px;"
                    src="<?= $product['thumbnail'] ?>" alt="">
            </div>
            <div class="productBuyInfo col-md-6 pl-4">

                <h3 class="mt-3 mb-3">
                    <?= $product['title'] ?>
                </h3>
                <div class="price mb-3">
                    <p style="font-size:26px; font-weight: 500;">
                        <?= number_format($product['discount']) ?> VND
                    </p>
                    <p class="mt-3 ml-2" style="font-size:15px;color:grey;text-decoration:line-through">
                        <?= number_format($product['price']) ?> VND
                    </p>

                </div>
                <div class="service mb-4">
                    <p><i class="fa-solid fa-arrow-right-arrow-left"></i> Hư gì đổi nấy <b>12 tháng</b> tại 3483 siêu
                        thị trên toàn quốc.</p>
                    <p><i class="fa-solid fa-shield"></i> Bảo hành chính hãng <b>1 năm</b>.</p>
                    <p><i class="fa-solid fa-truck"></i> Giao hàng nhanh toàn quốc.</p>
                    <p><i class="fa-solid fa-phone"></i> Tổng đài: 1900.xxxx.xx (9h00 - 21h00 mỗi ngày)</p>
                </div>

                <div class="amount">
                    <p class="mr-3 h4">Số lượng</p>
                    <button onclick="addMoreCart(-1)" type="button"
                        class="minusAmount btn btn-outline-light mr-3">-</button>
                    <input type="number" name="num" id="" value="1" style="border-radius: 5px; text-align: center"
                        onchange="fixCartNum()" class="amountNumber">
                    <button onclick="addMoreCart(1)" type="button"
                        class="btn btn-outline-light plusAmount ml-3">+</button>
                </div>

                <button onclick="addCart(<?= $product['id'] ?>,$('[name=num]').val())" style="width: 100%;margin:auto;"
                    type="button" class="btn btn-success mt-3">
                    <h3 style="font-size:20px;margin:8px 0;">Chọn mua</h3>
                </button>
                <a href="cart.php"><button style="width: 100%;margin:auto" type="button" class="btn btn-info mt-3"><i
                            class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>Xem giỏ hàng</button></a>



            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 mt-5 bd-bottom" style="text-align: center;">
        <h4 class="mb-3">Chi tiết sản phẩm </h4>

        <?php
        echo $product['description']
            ?>
    </div>
    <div class="container-fluid stars bd-bottom">
        <h5 class="mt-4 mr-4">Đánh giá sản phẩm</h5>
        <form action="">
            <input class="star star-5" id="star-5" type="radio" name="star" />
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star" />
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star" />
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star" />
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star" />
            <label class="star star-1" for="star-1"></label>
        </form>
        <p class="mt-4 ml-4">
            <?= rand(100, 400) ?> đã bán
        </p>
    </div>
    <h2 class="text-center mt-3 mb-4">Sản phẩm liên quan </h2>
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($relatedProduct as $product) {
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
            ?>
        </div>
    </div>
    
    <script type="text/javascript">
        function addMoreCart(delta) {
            num = parseInt($('[name=num]').val())
            num += delta
            if (num < 1) num = 1;
            $('[name=num]').val(num)
        }

        function fixCartNum() {
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }
// Đẩy function xử lí dữ liệu lên sever bằng ajax
// console.log(productID, amountValue);
// jQuery.post( url [, data ] [, success ] [, dataType ] )

        /* url: đường dẫn đến file cần lấy thông tin
            data: là một đối tượng object gồm các key : value sẽ gửi lên server
            success: là function sẽ xử lý khi thực hiện thành công
            dataType: là dạng dữ liệu trả về. (text, json, script, xml)*/
// ví dụ: 
// 
    </script>
</div>
<!-- End New product -->

<!-- Bàn phím end -->
<?php
require_once('layouts/footer.php');
?>