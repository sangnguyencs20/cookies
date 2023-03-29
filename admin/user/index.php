<?php
$title='User';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "Select user.*,role.name as role_name from user left join role on user.role_id = role.id where user.deleted=0";
    $data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class="text-warning mt-2">Quản lý người dùng</h3>
        <a href="editor.php"><button class="btn btn-success mb-2">Thêm tài khoản</button></a>
    </div>
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Sdt</th>
                <th>Địa chỉ</th>
                <th>Quyền</th>
                <th style="width: 50px;"></th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0 ;
            foreach($data as $item) {
                echo '<tr>
                            <th>'.(++$index).'</th>
                            <td>'.$item['fullname'].'</td>
                            <td>'.$item['email'].'</td>
                            <td>'.$item['phone_number'].'</td>
                            <td>'.$item['address'].'</td>
                            <td>'.$item['role_name'].'</td>
                            <td style="width: 50px">
                                <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                            </td>
                            <td style="width: 50px">';
                if($user['id'] != $item['id'] && $item['role_id'] != 1) {
                    echo '<button onclick="deleteUser('.$item['id'].')" class="btn btn-danger">Xoá</button>';
                }
                echo '
                            </td>
                        </tr>';
            }
            ?>
        </tbody>

    </table>
</div>
<script type="text/javascript">
function deleteUser(id) {
    option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
    if (!option) return;

    $.post('form_api.php', {
        'id': id,
        'action': 'delete'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>