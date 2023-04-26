<?php
    require_once('./utils/utility.php');
    require_once('./Database/dbhelper.php');
    require_once('./layouts/header.php');
    $id = getGet('id');
    
    $sql = "SELECT * FROM orders WHERE id = '$id'";
    $order = executeResult($sql, true);

    $sql = "SELECT product_id, SUM(num) AS total_num, price FROM order_details WHERE order_id = '$id' GROUP BY product_id";
    $order_details = executeResult($sql);

    $status = $order['status'];

    $product_ids = array_column($order_details, 'product_id');
    $product_ids = implode(',', $product_ids);
    $sql = "SELECT id, title, price, thumbnail FROM product WHERE id IN ($product_ids)";
    $products = executeResult($sql);

    if ($status == 0) {
        $status_label = '<span class="badge bg-warning">Chưa xử lý</span>';
      } 
    elseif ($status == 1) {
        $status_label = '<span class="badge bg-success">Đã xử lý</span>';
    }
    
    echo "<div class='container' style = 'min-height: 100vh;'>";
    echo "<h3>Thông tin đơn hàng</h3>";
    echo "<div><h5>Trạng thái đơn hàng: $status_label </h5></div>";
    echo "<p>Mã đơn hàng: $id</p>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Sản phẩm</th>";
    echo "<th scope='col'>Đơn giá</th>";
    echo "<th scope='col'>Số lượng</th>";
    echo "<th scope='col'>Thành tiền</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $i = 1;
    $total_amount = 0;
    foreach ($order_details as $order_detail) {
        $product_id = $order_detail['product_id'];
        $num = $order_detail['total_num'];
        $price = $order_detail['price'];
        $product = array_filter($products, function($p) use ($product_id) {
            return $p['id'] == $product_id;
        });
        $product = array_values($product)[0];
        $title = $product['title'];
        $thumbnail = $product['thumbnail'];
        $amount = $price * $num;
        $total_amount += $amount;
        echo "<tr>";
        echo "<th scope='row'>$i</th>";
        echo "<td><img src='$thumbnail' alt='$title' class='img-thumbnail' width='50' height='50'>$title</td>";
        echo "<td>" . number_format($price) . "đ</td>";
        echo "<td>$num</td>";
        echo "<td>" . number_format($amount) . "đ</td>";
        echo "</tr>";
        $i++;
    }
    echo "<tr>";
    echo "<td colspan='4' class='text-right'><b>Tổng cộng:</b></td>";
    echo "<td><b>" . number_format($total_amount) . "đ</b></td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>

<?php
    require_once('./layouts/footer.php');

