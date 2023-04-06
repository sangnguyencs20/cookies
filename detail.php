<?php
require_once ("layouts/header.php");
$productId = getGet('id');

$sql =  "Select product.*,category.name as category_name from product left join category on product.category_id = category.id where product.id = $productId";
$product  = executeResult($sql,true);
$category_id = $product['category_id'];
$sql = "select product.*,category.name as category_name from product left join category on product.category_id = category_id where product.category_id = $category_id limit 0,4";
$relatedProduct = executeResult($sql);

?>

<link rel="stylesheet" href = "asset/css/detail.css">
<link rel="stylesheet" href = "asset/css/detail-reponsive.css">
<script src="https://kit.fontawesome.com/705f176f0b.js" crossorigin="anonymous"></script>


<style>
div.price {
    display: flex;
    flex-direction: row;
}

div.stars {
    width: 570px;
    display: flex;
    /* display: inline-block; */
}

input.star {
    display: none;
}

label.star {
    float: right;
    padding: 10px;
    font-size: 36px;
    color: #444;
    transition: all .2s;
}

input.star:checked~label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
}

input.star-5:checked~label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
}

input.star-1:checked~label.star:before {
    color: #F62;
}

label.star:hover {
    transform: rotate(-15deg) scale(1.3);
}

label.star:before {
    content: '\f006';
    font-family: FontAwesome;
}

.product_item img {
    transition: 0.3s;
}

.product_item img:hover {
    padding: 4px;
    cursor: pointer;
    background-color: #f0f1f2;
}

.amount {
    display: flex;
}
</style>

<!-- Menuend-->
<!-- New product -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?=$product['title']?></li>
                </ol>
            </nav>
<div class="container-fluid pb-5 bd-bottom">
    <div class="row">
        <div class="col-md-7 pr-4">
            <img style="width: 100%; border-radius:32px; position:sticky; top:0; margin-top:24px;" src="<?=$product['thumbnail']?>" alt="">
        </div>
        <div class="productBuyInfo col-md-5 pl-4">
            
            <h3 class="mt-3 mb-3" style = "font-size: 2rem;">
                <?=$product['title']?>
            </h3>
            <div class="price">
                <p style="font-size:30px; font-weight: 500; color: red;"><?=number_format($product['discount'])?> VND</p>
                <p class="mt-3 ml-2" style="font-size:15px;color:grey;text-decoration:line-through">
                    <?=number_format($product['price'])?> VND
                </p>

            </div>
            <div class="service mb-4">
                <p><i class="fa-solid fa-arrow-right-arrow-left"></i> Hư gì đổi nấy <b>12 tháng</b> tại 3483 siêu thị trên toàn quốc.</p>
                <p><i class="fa-solid fa-shield"></i> Bảo hành chính hãng <b>1 năm</b>.</p>
                <p><i class="fa-solid fa-truck"></i> Giao hàng nhanh toàn quốc.</p>
                <p><i class="fa-solid fa-phone"></i> Tổng đài: 1900.xxxx.xx (9h00 - 21h00 mỗi ngày)</p>
            </div>

            <div class="amount">
                <p class="mr-3 h4">Số lượng</p>
                <button onclick="addMoreCart(-1)" type="button"
                    class="minusAmount btn btn-outline-primary mr-3">-</button>
                <input type="number" name="num" id="" value="1"
                    onchange="fixCartNum()"
                    class="amountNumber">
                <button onclick="addMoreCart(1)" type="button"
                    class="btn btn-outline-primary plusAmount ml-3">+</button> 
            </div>
            
            <button onclick="addCart(<?=$product['id']?>,$('[name=num]').val())" style="width: 100%;margin:auto;"
                type="button" class="btn btn-danger mt-3"><h3 style="font-size:20px;margin:8px 0;">Chọn mua</h3>
            </button>
            <a href="cart.php"><button style="width: 100%;margin:auto" type="button" class="btn btn-success mt-3"><i class="fa fa-shopping-cart mr-2"
                    aria-hidden="true"></i>Xem giỏ hàng</button></a>



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
                <?=rand(100,400)?> đã bán
                </p>
            </div>
<h2 class="text-center mt-3 mb-4 font-italic">Sản phẩm liên quan </h2>
<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($relatedProduct as $item){
            echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item mb-5">
            <a href="detail.php?id='.$item['id'].'"><img style="width:100%; height:70%; border-radius:10px;margin-bottom:8px;" src="'.$item['thumbnail'].'" alt=""></a>
            <p style="font-weight; font-family: Calibri;" class="text-center h5 ">'.$item['category_name'].'</p>
            <a href="detail.php?id='.$item['id'].'"><p style="font-weight:500;font-family: Calibri;"  class="text-center h4">'.$item['title'].'</p></a>
            <p style="font-family: Calibri;color:red; font-weight:500;" class="text-center h4">'.number_format($item['discount']).' VND</p>
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
<!-- End New product -->

<!-- Bàn phím end -->
<?php
require_once('layouts/footer.php');
?>