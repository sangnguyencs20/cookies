<?php
if (is_array($productList)) {
    extract($productList);
}
$imgPath = "../uploads/" . $img;
$imgShow = "<img src='$imgPath' height = '80'>";

?>
<div class="row">
    <div class="row form-title">
        <h1>Update product</h1>
    </div>

    <div class="row form-content">
        <form action="index.php?act=updateProduct" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Product ID <br>
                <input type="text" name="productId" id="" disabled value="<?php
                                                                            if (isset($id) && $id) {
                                                                                echo $id;
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                            ?>">

            </div>
            <div class="row mb10">
                Category <br>
                <select name="cateId">
                    <?php

                    if (count($cateList) === 0) {
                        echo "There's no available product.";
                    } else {
                        // foreach ($cateList as $cate) {
                        //     if ($cateId == $id) {
                        //         echo "<option value='$cate[id]' selected>$cate[name]</option>";
                        //     } else echo "<option value='$cate[id]'>$cate[name]</option>";
                        // }
                        foreach ($cateList as $cate) {
                            if ($cateId == $cate['id']) {
                                echo "<option value='$cate[id]' selected>$cate[name]</option>";
                            } else echo "<option value='$cate[id]'>$cate[name]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row mb10">
                Product name <br>
                <input type="text" name="productName" id="productName" value="<?= $name
                                                                                ?>">
            </div>
            <div class="row mb10">
                Price <br>
                <input type="text" name="price" id="price" value="<?= $price ?>">
            </div>

            <div class="row mb10">
                Image
                <br>
                <?php
                echo $imgShow;
                ?>
                <br>
                <input type="file" name="img" id="img" value="">
            </div>
            <div class="row mb10">
                Description <br>
                <textarea name="description" id="description" cols="30" rows="10"><?php
                                                                                    if (isset($description) && $description) {
                                                                                        echo $description;
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                    ?></textarea>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=
                                                            $id ?>">
                    <input type="submit" name="update" value="Update">
                    <input type="reset" value="Retype">
                    <a href="index.php?act=productList">
                        <input type="button" value="List of Product">
                    </a>
                </div>
                <?php
                if (isset($noti) && ($noti)) {
                    echo $noti;
                }
                ?>
            </div>

        </form>
    </div>
</div>
</div>