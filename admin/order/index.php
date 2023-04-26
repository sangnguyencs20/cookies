<?php
$title = 'Order';
$baseUrl = '../';
require_once('../layouts/header.php');
// pending, approved,cancel
$sql = "SELECT * from orders order by status asc,order_date desc ";
$data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class="text-warning mt-2">Quản lý đơn hàng</h3>
    </div>

    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo đơn</th>
                <th>Tổng tiền</th>
                <th style="width: 50px;">Trạng thái </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($data == null) {
                echo '<tr><td colspan="8">Không có dữ liệu</td></tr>';
            } else {
                $index = 0;
                foreach ($data as $item) {
                    echo '<tr>
                                <th><a href="detail.php?id=' . $item['id'] . '">' . (++$index) . '</a></th>
                                <td> <a href="detail.php?id=' . $item['id'] . '">' . $item['fullname'] . '</a></td>
                                <td>' . $item['email'] . '</td>
                                <td>' . $item['phone_number'] . '</td>
                                <td>' . $item['address'] . '</td>
                                <td>' . $item['order_date'] . '</td>
                                <td>' . number_format($item['total_money']) . '</td>      
                                <td style="width: 50px"> ';
                    if ($item['status'] == 0) {
                        echo '<button onclick="changeStatus(' . $item['id'] . ',1)" class="btn btn-success mb-1">Approve</button>
                                    <button onclick="changeStatus(' . $item['id'] . ',2)" class="btn btn-danger">Cancel</button>';
                    }
                    if ($item['status'] == 1) {
                        echo '<label class="badge badge-success" for="">Approved</label>';
                    }
                    if ($item['status'] == 2) {
                        echo '<label class="badge badge-danger" for="">Cancel</label>';
                    }
                    echo ' </td>
                                             </tr>';
                }
            }

            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function changeStatus(id, status) {
        $.post('form_api.php', {
            'id': id,
            'status': status,
            'action': 'update_status'
        }, function(data) {
            location.reload()
        })
    }
</script>
<?php
require_once('../layouts/footer.php')
?>