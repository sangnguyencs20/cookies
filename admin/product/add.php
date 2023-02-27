<div class="row">
    <div class="row form-title">
        <h1>Add new product</h1>
    </div>

    <div>
        <form action="index.php?act=addProduct" method="post" enctype="multipart/form-data">
            <!-- enctype for img upload -->
            <div>
                Category <br>
                <select name="cateId">
                    <?php
                    foreach ($cateList as $cate) {
                        echo "<option value='$cate[id]'>$cate[name]</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                Product name <br>
                <input type="text" name="productName" id="">

            </div>

            <div>
                Price <br>
                <input type="text" name="price" id="">
            </div>

            <div>
                Image <br>
                <input type="file" name="img" id="">
            </div>

            <div>
                Description <br>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>


            <div>
                <input type="submit" name="addNewProduct" value="Add new">
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
        </form>
    </div>
</div>
</div>