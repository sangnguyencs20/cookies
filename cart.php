<?php
require_once('layouts/header.php');
?>
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$index = 0;
$total = 0;
if ($_SESSION['cart'] == []) {
    echo '
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 py-5">
                <p class="text-center">Không có sản phẩm nào trong giỏ hàng</p>
                <div class="text-center">
                 <a href="./" class="btn btn-success">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </div>
    ';
} else {
    echo '
    <div class="container mt-4 mb-4">
    <table class=" table table-bordered">
        <tr>
            <th class="text-center">Sản phẩm</th>
            <th class="text-center">Tên sản phẩm</th>
            <th class="text-center">Đơn giá</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Thành tiền</th>
            <th></th>
        </tr>
    ';
    // Nội dung của bảng
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['discount'] * $item['num'];
        echo '
        <tr>
            <td ><img src="' . $item['thumbnail'] . '" style="height: 80px; display: block; margin: auto;"/></td>
            <td style="text-align: center; vertical-align: middle;">' . $item['title'] . '</td>
            <td style="text-align: center; vertical-align: middle;">' . number_format($item['discount']) . ' VND</td>
            <td style="display: flex; justify-content: center; padding-top: 32px; border-bottom: none; border-left: none; border-right: none;">
                <button class="btn btn-light" onclick="addMoreCart(' . $item['id'] . ', -1)">-</button>
                <input size="5" type="number" id="num_' . $item['id'] . '" value="' . $item['num'] . '" class="form-control" style="border:none; width: 90px; border-radius: 0px" onchange="fixCartNum(' . $item['id'] . ')"/>
                <button class="btn btn-light" onclick="addMoreCart(' . $item['id'] . ', 1)">+</button>
            </td>
            <td style="text-align: center; vertical-align: middle;">' . number_format($item['discount'] * $item['num']) . ' VND</td>
            <td style="text-align: center; vertical-align: middle;"><button class="btn btn-danger" onclick="updateCart(' . $item['id'] . ', 0)">Xoá</button></td>
        </tr>';
    }
    echo '
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Tổng tiền</b></td>
            <td><b>'.number_format($total).' VND</b></td>
        </tr>
    </table>
    <a href="checkout.php"><button class="btn btn-success mt-3">Tiếp tục thanh toán</button></a>
    </div>';
}
?>
<script type="text/javascript">
    function addMoreCart(id, delta) {
        num = parseInt($('#num_' + id).val())
        num += delta;
        if (num < 1) num = 1;
        $('#num_' + id).val(num);
        updateCart(id, num)
    }

    function fixCartNum(id) {
        $('#num_' + id).val(Math.abs($('#num_' + id).val()))
        updateCart(id, $('#num_' + id).val())
    }

    function updateCart(productId, num) {
        $.post('api/ajax_request.php', {
            'action': 'update',
            'id': productId,
            'num': num
        }, function(data) {
            location.reload();
        })

    }
</script>
<?php
require_once('layouts/footer.php');
// var_dump($_SESSION['cart'])
?>