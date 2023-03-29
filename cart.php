<?php
require_once ('layouts/header.php');
?>
<div class="container mt-4 mb-4">
    <table class="table-bordered ">
        <tr>
            <th class="text-center">Stt</th>
            <th class="text-center">Thumbnail</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Đơn giá</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Thành tiền</th>
            <th></th>
        </tr>
        <?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}
$index = 0;
$total = 0;
foreach($_SESSION['cart'] as $item){   
    $total+= $item['discount'] * $item['num'];
    echo '<tr>
    <td>'.(++$index).'</td>
    <td><img src="'.$item['thumbnail'].'" style="height: 80px"/></td>
    <td>'.$item['title'].'</td>
    <td>'.number_format($item['discount']).' VND</td>
    <td class="mt-3" style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
        <input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
        <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
    </td>
    <td>'.number_format($item['discount'] * $item['num']).' VND</td>
    <td><button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Xoá</button></td>
</tr>';
    }
?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Tổng tiền</b></td>
            <td><b><?=number_format($total)?> VND</b></td>
            <td></td>
        </tr>
    </table>
    <a href="checkout.php"><button class="btn btn-success mt-3">Tiếp tục thanh toán</button></a>
</div>
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
require_once ('layouts/footer.php');
// var_dump($_SESSION['cart'])
?>