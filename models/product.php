<?php
function addProduct($name, $price, $img, $desc, $cateId)
{
    $sql = "INSERT INTO product (name, price, img, views, description, cateId) VALUES ('$name', $price, '$img', 0, '$desc', $cateId)";
    pdo_execute($sql);
}
function updateProduct($id, $name, $price, $img, $desc, $cateId)
{
    $sql = "";
    if($img == ""){
        $sql = "UPDATE product SET name = '$name', price = $price, description = '$desc', cateId = $cateId WHERE id = $id";
    }
    if($sql == "") {
        $sql = "UPDATE product SET name = '$name', price = $price, img = '$img', description = '$desc',cateId = $cateId WHERE id = $id";
    }
    pdo_execute($sql);
}

function deleteProduct($id)
{
    $sql = "DELETE FROM product WHERE id = $id";
    pdo_execute($sql);
}
function getAllProduct($keyword, $cate)
{
    $sql = "SELECT * FROM product WHERE 1";
    if ($keyword != '') {
        $sql .= " AND name LIKE '%$keyword%'";
    }
    if ($cate > 0) {
        $sql .= " AND cateId = $cate";
    }
    $sql .= " ORDER BY id DESC";
    return pdo_query($sql);
}

function getOneProduct($id)
{
    $sql = "SELECT * FROM product WHERE id = $id";
    return pdo_query_one($sql);
}
function getProductsByCateId($cateId)
{
    $sql = "SELECT * FROM product WHERE cateId = $cateId";
    return pdo_query($sql);
}

function getProductHomePage(){
    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 0,9";
    return pdo_query($sql);
}

function getTop10Product(){
    $sql = "SELECT * FROM product ORDER BY views DESC LIMIT 0,10";
    return pdo_query($sql);
}



function getSameCateProduct($id){
    $cate = getOneProduct($id)['cateId'];
    $sql = "SELECT * FROM product WHERE id <> $id AND cateId = $cate ORDER BY id DESC LIMIT 0,5";
    return pdo_query($sql);
}