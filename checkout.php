<?php
require_once('layouts/header.php');


?>
<div class="container mt-4 mb-4">
    <div class="row" style="min-height:max-content">
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th style="width: 10px;" class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $index = 0;
                    $total = 0;
                    $totalnum = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $total += $item['discount'] * $item['num'];
                        $totalnum += $item['num'];
                        echo '<tr>
    <td style="text-align: center; vertical-align: middle;"><img src="' . $item['thumbnail'] . '" class="img-thumbnail" style="max-width: 100px;"/></td>
    <td style="text-align: center; vertical-align: middle;">' . $item['title'] . '</td>
    <td style="text-align: center; vertical-align: middle;">' . number_format($item['discount']) . ' VND</td>
    <td style="text-align: center; vertical-align: middle;">
    <p class="font-weight-light text-center mt-3">' . $item['num'] . '</p>
    </td>
    <td style="text-align: center; vertical-align: middle;">' . number_format($item['discount'] * $item['num']) . ' VND</td>
</tr>';
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">Tổng tiền</td>
                        <td class="text-center"><?= number_format($totalnum) ?></td>
                        <td><?= number_format($total) ?>VND</td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="col-md-4">
            <form method="post" onsubmit="return completeCheckout();">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input required placeholder="Trần Văn A" name="fullname" type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input required name="email" type="Email" class="form-control" id="exampleInputPassword1" placeholder="tranvana@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại</label>
                    <input required name="phone_number" type="text" class="form-control" id="exampleInputPassword1" placeholder="0123456789">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input required name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Quận 1 - TPHCM">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ghi chú</label>
                    <textarea name="note" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Thanh toán</button>
            </form>
        </div>

    </div>
</div>
</div>
<script type="text/javascript">
    function completeCheckout() {
        $.post('api/ajax_request.php', {
                'action': 'checkout',
                'fullname': $('[name=fullname]').val(),
                'email': $('[name=email]').val(),
                'phone_number': $('[name=phone_number]').val(),
                'address': $('[name=address]').val(),
                'note': $('[name=note]').val(),
            },
            function() {
                // window.open('complete.php', '_self');
            })
        return false;
    }
</script>
<?php
require_once('layouts/footer.php');
// var_dump($_SESSION['cart'])
?>