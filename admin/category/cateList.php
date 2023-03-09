<div class="row">
    <div class="row form-title">
        <h1>List of Category</h1>
    </div>
    <div >
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                foreach ($cateList as $cate) {
                    extract($cate);
                    $editCate = "index.php?act=editCate&id=$cate[id]";
                    $deleteCate = "index.php?act=deleteCate&id=$cate[id]";
                    $imgPath = "./images/categories/" . $img; 
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='' id=''></td>";
                    echo "<td>$cate[id]</td>";
                    echo "<td>$cate[name]</td>";
                    echo "<td><img src='$imgPath' alt=''></td>";
                    echo "<td>$imgPath</td>";
                    echo "<td><a href ='$editCate'><input type='button' value='Edit'><a href ='$deleteCate'><input type='button' value='Delete'></td>";
                    echo "</tr>";
                }
                ?>

            </table>

        <div>
            <input class="col" type="button" value="Choose all">
            <input class="col" type="reset" value="Reject all choices">
            <input class="col" type="submit" value="Delete marked choices">
            <a href="index.php?act=addCategory">
                <input type="button" value="Add new Category">
            </a>
        </div>

    </div>
</div>