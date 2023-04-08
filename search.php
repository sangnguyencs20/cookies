<?php
require_once('./layouts/header.php')
?>

<?php
$searchResult = [];
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $sql = "select * from product where title like '%$keyword%'";
    $searchResult = executeResult($sql);
}

$sql = "select id from category where name like '%$keyword%'";
$categoryId = executeResult($sql, true);
if ($categoryId != null) {
    $sql = "select * from product where category_id = " . $categoryId['id'];
    $searchResult = executeResult($sql);
}


if ($searchResult == null) {
    echo '<h2 class="text-center mt-3 mb-3 ">Không tìm thấy sản phẩm nào cho từ khoá ' . $keyword . '</h2>';
} else {
    echo '<div class="container-fluid">
        <div class="row">';

    echo '<h2 class="text-center mt-3 mb-3 ">Kết quả tìm kiếm cho từ khoá ' . $keyword . '</h2>';

    foreach ($searchResult as $item) {
        echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item ">
                <a href="detail.php?id=' . $item['id'] . '"><img style="width:100%; height:70%" src="' . $item['thumbnail'] . '" alt=""></a>
                <a href="detail.php?id=' . $item['id'] . '"><p style="font-weight;font-family: Calibri;"  class="text-center h5">' . $item['title'] . '</p></a>
                <p style="font-family: Calibri;color:red ;" class="text-center h6">' . number_format($item['discount']) . ' VND</p>
                        </div>';
    }
    echo '</div>
    </div>';
}



?>

<?php
require_once('./layouts/footer.php')
?>