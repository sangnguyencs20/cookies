<?php
require_once('./utils/utility.php');
require_once('./Database/dbhelper.php');
require_once('./layouts/header.php');
$id = getGet('id');

$sql = "SELECT * FROM orders WHERE user_id = '$id'";
$result = executeResult($sql);
if ($result == null) {
    echo '<h1 class="text-center">Không có đơn hàng nào</h1>';
    die();
}
if ($order['status'] == 0) {
    $status_label = '<span class="badge bg-warning">Chưa xử lý</span>';
  } 
elseif ($order['status'] == 1) {
    $status_label = '<span class="badge bg-success">Đã xử lý</span>';
}
else{
    $status_label = '<span class="badge bg-danger">Đã hủy</span>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách đơn hàng</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content {
            min-height: 100vh;
            margin-top: 50px;
        }
        .table {
            background-color: #fff;
        }
        .table th {
            font-weight: bold;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .status-badge.pending {
            background-color: #ffc107;
            color: #000;
        }
        .status-badge.confirmed {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="content">
    <h1 class="text-center mb-4">Danh sách đơn hàng</h1>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người đặt hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Chi tiết</th> <!-- Cột mới -->
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($result as $order) {
            echo '<tr>';
            echo '<td>' . $order['id'] . '</td>';
            echo '<td>' . $order['fullname'] . '</td>';
            echo '<td>' . $order['email'] . '</td>';
            echo '<td>' . $order['phone_number'] . '</td>';
            echo '<td>' . $order['address'] . '</td>';
            echo '<td>' . $order['order_date'] . '</td>';
            echo '<td>'.$status_label.'</td>';
            echo '<td>' . $order['total_money'] . '</td>';
            echo '<td><a href="purchasedetail.php?id=' . $order['id'] . '">Chi tiết</a></td>'; // Nút "Chi tiết"
            echo '</tr>';
        }
    ?>
    </tbody>
    </table>
</div>

<!-- Link JavaScript của Bootstrap -->
</body>
</html>

<?php
require_once('./layouts/footer.php');
?>
