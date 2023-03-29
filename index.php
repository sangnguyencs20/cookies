<?php
require_once ("layouts/header.php");
$sql =  "select * from category";
$menuItem = executeResult($sql);
$sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by updated_at asc limit 0,8 ";
// Bắt đầu từ vị trị thứ 0 và lấy ra 8 phần tử 
$newProductItem = executeResult($sql);
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
<h2 class="text-center mt-3 mb-3 font-italic">Sản phẩm mới nhất</h2>
<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($newProductItem as $item){
            echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item ">
            <a href="detail.php?id='.$item['id'].'"><img style="width:100%; height:70%" src="'.$item['thumbnail'].'" alt=""></a>
            <p style="font-weight; font-family: Calibri;" class="text-center h5 ">'.$item['category_name'].'</p>
            <a href="detail.php?id='.$item['id'].'"><p style="font-weight;font-family: Calibri;"  class="text-center h5">'.$item['title'].'</p></a>
            <p style="font-family: Calibri;color:red ;" class="text-center h6">'.number_format($item['discount']).' VND</p>
                    </div>';
        }
        ?>
    </div>
</div>

<!-- End New product -->

<!-- Danh muc san pham start  -->
<!-- Man hinh start -->
<h2 class="text-center mt-3 mb-3 font-italic">Màn hình</h2>
<div class="row container-fluid">
    <?php
    $sql = " select product.*,category.id as category_id, category.name as name from product left join category on category.id =1  where product.category_id = 1 order by updated_at desc limit 0,4   ";
    $item1 = executeResult($sql);
    foreach($item1 as $screenItem){
        echo '<div class="col-md-4 col-sm-6 col-lg-3 mb-1 product_item ">
        <a href="detail.php?id='.$screenItem['id'].'"><img style="width:100%; height:70%" src="'.$screenItem['thumbnail'].'" alt=""></a>
        <p style="font-weight; font-family: Calibri;" class="text-center h5 ">'.$screenItem['name'].'</p>
        <a href="detail.php?id='.$screenItem['id'].'"><p style="font-weight;font-family: Calibri;"  class="text-center h5">'.$screenItem['title'].'</p></a>
        <p style="font-family: Calibri;color:red ;" class="text-center h6">'.number_format($screenItem['discount']).' VND</p>
                </div>';
    }
    ?>
</div>

<!-- Man hinh end -->
<!-- Chuot start  -->
<h2 class="text-center mt-3 mb-3 font-italic">Chuột không dây</h2>
<div class="row container-fluid">
    <?php
    $sql = "select product.*,category.id as category_id, category.name as name from product left join category on category.id =3  where product.category_id = 3 order by updated_at desc limit 0,4  ";
    $item2 = executeResult($sql);
    foreach($item2 as $mouseItem){
        echo '<div class="col-md-4 col-sm-6 col-lg-3 mb-1 product_item ">
        <a href="detail.php?id='.$mouseItem['id'].'"><img style="width:100%; height:70%" src="'.$mouseItem['thumbnail'].'" alt=""></a>
        <p style="font-weight; font-family: Calibri;" class="text-center h5 ">'.$mouseItem['name'].'</p>
        <a href="detail.php?id='.$mouseItem['id'].'"><p style="font-weight;font-family: Calibri;"  class="text-center h5">'.$mouseItem['title'].'</p></a>
        <p style="font-family: Calibri;color:red ;" class="text-center h6">'.number_format($mouseItem['discount']).' VND</p>
                </div>';
    }
    ?>
</div>
<!-- Chuot end -->
<!-- Bàn phím start -->
<h2 class="text-center mt-3 mb-3 font-italic">Bàn phím cơ</h2>
<div class="row container-fluid">
    <?php
    $sql = " select product.*,category.id as category_id, category.name as name from product left join category on category.id =2  where product.category_id = 2 order by updated_at desc limit 0,4  ";
    $item3 = executeResult($sql);
    foreach($item3 as $keyboardItem){
        echo '<div class="col-md-4 col-sm-6 col-lg-3 mb-1 product_item ">
        <a href="detail.php?id='.$keyboardItem['id'].'"><img style="width:100%; height:70%" src="'.$keyboardItem['thumbnail'].'" alt=""></a>
        <p style="font-weight; font-family: Calibri;" class="text-center h5 ">'.$keyboardItem['name'].'</p>
        <a href="detail.php?id='.$keyboardItem['id'].'"><p style="font-weight;font-family: Calibri;"  class="text-center h5">'.$keyboardItem['title'].'</p></a>
        <p style="font-family: Calibri;color:red ;" class="text-center h6">'.number_format($keyboardItem['discount']).' VND</p>
                </div>';
    }
    ?>
</div>
<!-- Bàn phím end -->
<?php
require_once('layouts/footer.php');
?>