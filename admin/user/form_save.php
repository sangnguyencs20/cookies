<?php
if(!empty($_POST)){
    $id =getPost('id');
    $fullname = getPost('fullname');
    $email = getPost('email');
    $phone_number = getPost('phone_number');
    $address = getPost('address');
    $password = getPost('password');
    $role_id = getPost('role_id');
    $created_at = $updated_at = date("Y-m-d H:i:s");
    $thumbnail =  moveFile('thumbnail');
$sql= "Select * from user where email = '$email'";
$userItem = executeResult($sql,true);
if($id>0){
// update
if($password != ''){
    $sql = "Update user set fullname='$fullname',email='$email',phone_number='$phone_number',address='$address',password='$password',created_at ='$created_at',role_id=$role_id,updated_at='$updated_at',thumbnail='$thumbnail' where id ='$id'";
}else{
    $sql = "Update user set fullname='$fullname',email='$email',phone_number='$phone_number',address='$address',role_id=$role_id,created_at ='$created_at',updated_at='$updated_at',thumbnail='$thumbnail' where id ='$id'";
}
execute($sql);
header('Location: index.php');
        die();
}else{
    if($userItem==null){
        $sql = " Insert into user (fullname,email,phone_number,address,password,role_id,created_at,updated_at,deleted,thumbnail) values('$fullname','$email','$phone_number','$address','$password','$role_id','$created_at','$updated_at',0,'$thumbnail')";
        execute($sql);
        header('Location: index.php');
        die();
    }else{
        $msg = 'Email đã tồn tại trên hệ thống';
    }
}

}
?>