<?php
    $title = 'Thêm/sửa tài khoản người dùng';
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $id=$msg = $fullname =$email = $phone_number=$address=$thumbnail= $role_id = '';
    require_once('form_save.php');
    $id =getGet('id');
    if($id != '' && $id>0){
        $sql = "Select * from user where id = '$id'";
   $userItem = executeResult($sql,true);
        if($userItem!=null){
            $thumbnail=$userItem['thumbnail'];
            $fullname = $userItem['fullname'];
            $email =$userItem['email'];
            $phone_number = $userItem['phone_number'];
            $address = $userItem['address'];
            $role_id = $userItem['role_id'];
        }
        else{
            $id = 0;
        }
    }else{
        $id = 0;
    }
 
    $sql="select *from role";
    $roleitem= executeResult($sql);
?>
<div class="row" style="margin-top: 20px;">
    <div class="col-md-12 table-responsive">
        <h4>Thêm/sửa tài khoản người dùng</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Đăng kí tài khoản</h2>
                <h4 style="color:red" class="text-center"><?php echo $msg; ?></h4>
            </div>
            <form method="POST" onsubmit="return validateForm()" action="">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Họ và tên</label>
                        <input name="fullname" required="true" type="text" class="form-control" id="usr"
                            value="<?=$fullname?>">
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                    </div>
                    <div class="form-group">
                        <label for="usr">Role</label>
                        <select class="form-control" name="role_id" id="role_id" require=>
                            <option value="">--Chọn--</option>
                            <?php
                            foreach ($roleitem as $role){
                                echo '<option selected value="'.$role['id'].'">'.$role['name'].'</option>'
                                ;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" required="true" type="email" class="form-control" id="email"
                            value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input name="address" required="true" type="text" class="form-control" id="address"
                            value="<?=$address?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input name="phone_number" required="true" type="text" class="form-control" id="phone_number"
                            value="<?=$phone_number?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input <?=($id>0 ? '' : 'required="true"' )?> name="password" minlength="6" type="password"
                            class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="confirmation_pwd">Confirmation Password:</label>
                        <input <?=($id>0 ? '' : 'required="true"' )?> type="password" class="form-control"
                            id="confirmation_pwd">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Avatar</label>
                        <input name="thumbnail" type="file" class="form-control" id="thumbnail"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                    </div>
                    <button type="submit" class="btn btn-success">Đăng ký / Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script>
function validateForm() {
    let pwd = document.querySelector("#pwd").value;
    let confirmPwd = document.querySelector("#confirmation_pwd").value;
    if (pwd != confirmPwd) {
        alert("Xác minh mật khẩu không đúng , vui lòng nhập lại")
        return false
    }
    return true;
}
</script>

<?php
require_once('../layouts/footer.php');
?>