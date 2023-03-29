<?php
require_once ("layouts/header.php");
$category_id = getGet('id');
if($category_id == null || $category_id ==''){
$sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at asc limit 0,20 ";}
else{
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id order by updated_at asc limit 0,8 ";
}
$categoryItem  = executeResult($sql);

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
<!-- New product -->
<h2 class="text-center mt-3 mb-3 font-italic">Sản phẩm mới nhất</h2>
<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($categoryItem as $item){
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

<!-- Bàn phím end -->
<?php
require_once('layouts/footer.php');
?>