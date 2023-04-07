<?php
$title='Product';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted = 0";
	$data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class="mt-2">Quản lý sản phẩm</h3>
        <a href="editor.php"><button class="btn btn-success mb-2" style="float:right;">Thêm sản phẩm</button></a>
    </div>
    <table class="table table-hover category-table">
        <thead>
            <tr>
                <th style="text-align:center;">STT</th>
                <th style="text-align:center;">Thumbnail</th>
                <th style="text-align:center;">Tên sản phẩm</th>
                <th style="text-align:center;">Giá</th>
                <th style="text-align:center;">Danh mục</th>
                <th style="width: 50px;"></th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0 ;
            foreach($data as $item) {
                echo '<tr>
                            <th style="vertical-align: middle; text-align:center;">'.(++$index).'</th>
                            <td style="max-width: 200px;"><img src = "'.fixUrl($item['thumbnail']).'" style="max-width: 100%; border-radius:5%;" /></td>
                            <td style="vertical-align: middle; text-align:center; font-size:18px; font-weight:400;">'.$item['title'].'</td>
                            <td style="vertical-align: middle; text-align:center; font-size:18px; font-weight:400;">'.number_format($item['discount']).' VND'.'</td>
                            <td style="vertical-align: middle; text-align:center; font-size:16px; font-weight:300;">'.$item['category_name'].'</td>

                            <td style="vertical-align: middle; text-align:center; font-size:14px;">
                                <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning" >Sửa</button></a>
                            </td>
                            <td style="vertical-align: middle; text-align:center;">
                            <button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
                            </td>
                    </tr>';
            }
            ?>
        </tbody>

    </table>
</div>
<script type="text/javascript">
function deleteProduct(id) {
    option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
    if (!option) return;

    $.post('form_api.php', {
        'id': id,
        'action': 'delete'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>