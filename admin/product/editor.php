<?php
$title = 'Thêm/sửa sản phẩm';
$baseUrl = '../';
require_once('../layouts/header.php');
$id = $thumbnail = $title = $price = $discount = $category_id = $description =  '';
require_once('form_save.php');
$id = getGet('id');
if ($id != '' && $id > 0) {
    $sql = "Select * from product where id = '$id' and deleted=0";
    $userItem = executeResult($sql, true);
    if ($userItem != null) {
        $thumbnail = $userItem['thumbnail'];
        $title = $userItem['title'];
        $price = $userItem['price'];
        $discount = $userItem['discount'];
        $category_id = $userItem['category_id'];
        $description = $userItem['description'];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}
$sql = "select * from category";
$categoryItem = executeResult($sql);
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="row" style="margin-top: 20px;">
    <div class="col-md-12 table-responsive">
        <h4>Thêm/sửa sản phẩm</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm sản phẩm</h2>
                <h4 style="color:red" class="text-center"></h4>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="form-group">
                            <label for="usr">Tên sản phẩm</label>
                            <input name="title" required="true" type="text" class="form-control" id="usr" value="<?= $title ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Nội dung mô tả:</label>
                            <textarea class="form-control" name="description" id="summernote" cols="30" rows="5"><?= $description ?></textarea>
                        </div>

                    </div>
                    <div class="col-md-3 col-12">
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="usr">Danh mục sản phẩm</label>
                                <select class="form-control" name="category_id" id="category_id" require=>
                                    <option value="">--Chọn--</option>
                                    <?php
                                    foreach ($categoryItem as $item) {
                                        if ($itemp['id'] == $category_id) {
                                            echo '<option value =" ' . $item['id'] . '"> ' . $item['name'] . '</option> ';
                                        } else {
                                            echo '<option selected value =" ' . $item['id'] . '"> ' . $item['name'] . '</option> ';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail:</label>
                                <input onchange="updateThumbnail()" name="thumbnail" type="file" class="form-control" id="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <img id="thumbnail_img" class="mt-2" style="max-height: 190px;" src="<?= fixUrl($thumbnail) ?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price" required="true" type="text" class="form-control" id="price" value="<?= $price ?>">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input name="discount" required="true" type="text" class="form-control" id="discount" value="<?= $discount ?>">
                            </div>


                            <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<script type="text/javascript">
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    function updateThumbnail() {
        $('#thumbnail_img').attr('src', $('#thumbnail').val())
    }
</script>
<?php
require_once('../layouts/footer.php');
?>