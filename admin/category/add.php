<div>
    <div>
        <h1>Add new category</h1>
    </div>

    <div>
        <form action="index.php?act=addCategory" method="post">
            <div>
                Category ID <br>
                <input type="text" name="cateId" id="" disabled>
            </div>

            <div>
                Category name <br>
                <input type="text" name="cateName" id="">
                
            </div>

            <div>
                <input type="submit" name="addNewCate" value="Add new">
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