<div class="row">
    <div class="row form-title mb10">
        <h1>List of Products</h1>
    </div>
    <form action="index.php?act=productList" method="post">
        <input type="text" name="keyword">
        <select name="cate">
            <option value ="0" selected>All products</option>
            <?php
            foreach ($cateList as $cate) {
                extract($cate);
                echo "<option value='$id'>$name</option>";
            } 
            ?>
        </select>
        <input type="submit" name = "search" value="Search">
    </form>
    <div class="row form-content">
        <div class="row mb10 formListCategory">
            <table>
                <tr>
                    <th></th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Views</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                <?php
                foreach ($productList as $product) {
                    extract($product);
                    $editProduct = "index.php?act=editProduct&id=" . $id;
                    $deleteProduct = "index.php?act=deleteProduct&id=" . $id;
                    $imgPath = "../uploads/" . $img;

                    if (is_file($imgPath)) {
                        $imgShow = "<img src='$imgPath' height = '80'>";
                    } else {
                        $imgShow = "No image";
                    }
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='check' value='$id'></td>";
                    echo "<td>$cateId</td>";
                    echo "<td>$name</td>";
                    echo "<td>$imgShow</td>";
                    echo "<td>$price</td>";
                    echo "<td>$views</td>";
                    echo "<td>$description</td>";
                    echo "<td><a href ='$editProduct'><input type='button' value='Edit'><a href ='$deleteProduct'><input type='button' value='Delete'></td>";
                    echo "</tr>";
                }


                ?>

            </table>
        </div>

        <div class="row mb10">
            <input type="button" value="Choose all">
            <input type="reset" value="Reject all choices">
            <input type="submit" value="Delete marked choices">
            <a href="index.php?act=addProduct">
                <input type="button" value="Add new product">
            </a>
        </div>

    </div>
</div>