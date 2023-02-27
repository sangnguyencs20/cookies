<?php
if (is_array($cateList)) {
    extract($cateList);
}
?>
<div class="row">
    <div class="row form-title">
        <h1>Update category</h1>
    </div>

    <div class="row form-content">
        <form action="index.php?act=updateCate" method="post">
            <div class="row mb10">
                Category ID <br>
                <input type="text" name="cateId" id="" disabled>
            </div>

            <div class="row mb10">
                Category name <br>
                <input type="text" name="cateName" id="cateName" value="<?php
                                                                        if (isset($name) && $name) {
                                                                            echo $name;
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                        ?>">
            </div>

            <div class="row mb10">
                <input type="hidden" name="id" value="<?php
                                                        if (isset($id) && $id) {
                                                            echo $id;
                                                        }
                                                        ?>">
                <input type="submit" name="updateCate" value="Update">
                <input type="reset" value="Retype">
                <a href="index.php?act=cateList">
                    <input type="button" value="List of Category">
                </a>
            </div>
            <?php
            if (isset($noti) && ($noti)) {
                echo $noti;
            }
            ?>
        </form>
    </div>
</div>
</div>