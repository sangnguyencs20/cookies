<!-- Footer start -->
<style>
.cart_icon {
    position: fixed;
    z-index: 9;
    top: 40%;
    right: 0px;
}

.cart_icon img {
    cursor: pointer;
    margin-right: 0px;
    width: 60px;
}

.cart_icon .cart_count {
    font-weight: bold;
    position: absolute;
    left: -22px;
    bottom: 29px;
    background-color: red;
    color: white;
    padding: 10px;
    border-radius: 100%;
}
</style>
<div class="container-fluid my-5">
    <footer class="text-white text-lg-start bg-dark">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row mt-4">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 text-center">Về chúng tôi</h5>

                    <p class="text-sm-center">
                        Cookies - Nơi cung cấp các sản phẩm chính hãng như gaming PC, laptop, chuột gaming, bàn phím cơ và
                        các sản phẩm phụ kiện dành cho gamer đến từ các nhãn hàng uy tín tại thị trường Việt Nam như
                        Razer, Logitech, Corsair, Asus, MSI và hơn thế nữa.
                    </p>


                    <div class="mt-4 text-center">
                        <!-- Facebook -->
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-facebook-official"
                                aria-hidden="true"></i></a>
                        <!-- Dribbble -->
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                        <!-- Twitter -->
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-twitter"
                                aria-hidden="true"></i></a>
                        <!-- Google + -->
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-google"
                                aria-hidden="true"></i></a>
                        <!-- Linkedin -->
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 pb-1 text-center ">Bạn muốn tìm gì?</h5>

                    <div class="form-outline form-white mb-4">
                        <input type="text" id="formControlLg" class="form-control form-control-lg" />
                    </div>

                    <ul class="fa-ul" style="margin-left: 1.65em;">
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fa fa-location-arrow" style="margin-right: 4px;" aria-hidden="true"></i>
                            </span><span class="ms-2" style="margin-left: 10px;">HCMUT, Thành phố Thủ Đức</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fa fa-envelope-o" style="margin-right: 4px;" aria-hidden="true"></i></span><span
                                class="ms-2" style="margin-left: 10px;">cookies@hcmut.edu.vn</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fa fa-phone" style="margin-right: 4px;" aria-hidden="true"></i></span><span
                                class="ms-2" style="margin-left: 10px;">012-3456-789
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 text-center">Giờ mở cửa</h5>

                    <table class="table text-center text-white">
                        <tbody class="fw-normal">
                            <tr>
                                <td>Các ngày trong tuần:</td>
                                <td>9:00 - 21:00</td>
                            </tr>
                            <tr>
                                <td>Cuối tuần:</td>
                                <td>8:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Ngày lễ:</td>
                                <td>9:00 - 18:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Bản quyền thuộc về
            <a class="text-white" href="https://mdbootstrap.com/">Cookies Group</a>
        </div>
    </footer>
</div>
<!-- cart start -->
<?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']= [];
}
$count =0 ;
foreach($_SESSION['cart'] as $item){
    $count += $item['num'];
}
?>
<script type="text/javascript">
function addCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'cart',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload()
    })
}
</script>
<a href="cart.php">
    <span class="cart_icon">
        <img src="asset/photo/cart_icon2_rm.png" alt="">
        <span class="cart_count"><?=$count?></span>
    </span>
</a>


<!-- cart end -->
<!-- End of .container -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</main>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>