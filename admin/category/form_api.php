<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../Database/dbhelper.php');
$user = getUserToken();
if($user==null){
    die();
}
if(!empty($_POST)){
    $action = getPost('action');
    switch ($action){
        case 'delete':
            deleteCategory();
            break;
    }
    
}
function deleteCategory(){

    $id = getPost('id');
    $sql = "Select count(*) as total form product where category_id=$id and deleted=0";
    $data= executeResult($sql,true);
    $total = $data['total'];
    if($total>0){
        echo "Danh mục đang chứa sản phẩm nên không được xóa";
    }
    $sql = "delete from category where id = $id";
    execute($sql);
    // echo $sql;
}
?>