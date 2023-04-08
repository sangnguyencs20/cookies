<?php
require_once('./layouts/header.php')
    ?>

<style>
    body {
        background-color: #1b1f24;
    }
</style>

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


echo '<div><div style=" min-height: 100vh;">';
if ($searchResult == null) {
    echo '<h2 class="p-3 mb-3 text-white">Không tìm thấy sản phẩm nào cho từ khoá ' . $keyword . '</h2>';
} else {
    echo '<div class="container-fluid">
        <div class="row">';

    echo '<h2 class="p-3 mb-3 text-white">Kết quả tìm kiếm cho từ khoá ' . $keyword . '</h2>';
echo "</div>";

echo '<div class="container-fluid">
            <div class="row">';
                foreach ($searchResult as $item) {
                    echo '<div class="col-md-4 col-sm-6 col-lg-3 product_item">
            <a href="detail.php?id=' . $item['id'] . '"><img style="width:100%; height:70%; border-radius: 25px;" src="' . $item['thumbnail'] . '" alt=""></a>
            <a href="detail.php?id=' . $item['id'] . '"><p style="padding-top: 10px; font-weight; color: white;"  class="text-center">' . $item['title'] . '</p></a>
            <p style="color:white ;" class="text-center h6">' . number_format($item['discount']) . ' VND</p>
                    </div>';
                }
            echo '</div>
        </div>';
}

echo "</div>";
?>


<?php
require_once('./layouts/footer.php')
    ?>