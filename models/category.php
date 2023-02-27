<?php
    function addCategory($cateName)
    {
        $sql = "INSERT INTO category (name) VALUES ('$cateName')";
        pdo_execute($sql);
        $noti = "Add successfully";
    }
    function updateCategory($id, $cateName)
    {
        $sql = "UPDATE category SET name = '$cateName' WHERE id = $id";
        pdo_execute($sql);
        $noti = "Update successfully";
    }
    function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id = $id";
        pdo_execute($sql);
    }
    function getAllCategory()
    {
        $sql = "SELECT * FROM category ORDER BY id DESC";
        return pdo_query($sql);
    }
    function getOneCategory($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        return pdo_query_one($sql);
    }
