<?php
if(!empty($_POST)){
    $id = getGet('id');
    $title = getPost('title');
    $price = getPost('price');
    $discount = getPost('discount');
    $thumbnail =  moveFile('thumbnail');
    $description = getPost('description');
    $category_id = getPost('category_id');
    $created_at = $updated_at = date('Y-m-d H:s:i');
    if($id>0){
        // update
        if($thumbnail != ''){
            $sql = "update product set title='$title',price='$price',discount='$discount',thumbnail='$thumbnail',description='$description',category_id='$category_id',created_at='$created_at',updated_at='$updated_at' where id =$id";
        }else{
            $sql = "update product set title='$title',price='$price',discount='$discount',description='$description',category_id='$category_id',created_at='$created_at',updated_at='$updated_at' where id =$id";

        }
        execute($sql);
        echo "<script>alert('Cập nhật thành công')</script>";
    }else{
        // insert
        $sql = "INSERT into product (title,price,discount,thumbnail,description,category_id,created_at,updated_at,deleted) values ('$title', '$price','$discount', '$thumbnail','$description','$category_id','$created_at','$updated_at',0)";
        execute($sql);
        die();
        echo "<script>alert('Thêm mới thành công')</script>";
    }
}
?>