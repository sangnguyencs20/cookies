<!-- Footer start -->
<style>
    .cart_icon {
        position: fixed;
        z-index: 9;
        bottom: 50%;
        right: 14px; 
    }

    .cart_icon img {
        cursor: pointer;
        margin-right: 0px;
        width: 60px;
        opacity: 70%;
    }

    .cart_icon img:hover {
        opacity: 100%;
    }

    .cart_icon .cart_count {
        font-weight: bold;
        position: absolute;
        left: -15px;
        /* bottom: 29px; */
        background-color: red;
        color: white;
        /* padding: 10px; */
        border-radius: 50%;
        width: 24px;
        height: 24px;
        text-align: center;
    }

</style>

<!-- Remove the container if you want to extend the Footer to full width. -->
    <!-- Footer -->
    <footer class="text-lg-start text-white" style="background-color: #3e4551">
        <!-- Grid container -->
        <div class="container p-3 pb-0" style="background-color: #3e4551">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h6>Về chúng tôi</h6>

                        <p class="small">
                        Cookies - Nơi cung cấp các sản phẩm chính hãng như gaming PC, laptop, chuột gaming, bàn phím cơ và
                        các sản phẩm phụ kiện dành cho gamer đến từ các nhãn hàng uy tín tại thị trường Việt Nam như
                        Razer, Logitech, Corsair, Asus, MSI và hơn thế nữa.
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h6>Hệ thống cửa hàng</h6>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white small">Xem danh sách cửa hàng</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Nội quy cửa hàng</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Chất lượng phục vụ</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Chính sách bảo hành & đổi trả</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6>Hỗ trợ khách hàng</h6>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white small">Điều kiện giao dịch chung</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Hướng dẫn mua hàng online</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Chính sách giao hàng</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Hướng dẫn thanh toán</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6>Về thương hiệu</h6>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white small">Tích điểm quà tặng</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Giới thiệu chúng tôi</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Bán hàng doanh nghiệp</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white small">Chính sách bảo mật thông tin</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6>Trung tâm bảo hành</h6>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white small">Trung tâm bảo hành Cookcare</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="mb-2"/>

            <!-- Section: Social media -->
            <section class="text-center">
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-facebook-official"
                                aria-hidden="true"></i></a>
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-twitter"
                                aria-hidden="true"></i></a>
                        <a type="button" class="btn btn-floating  btn-lg"><i class="fa fa-google"
                                aria-hidden="true"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 small" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">cookies@hcmut.edu.vn</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
<!-- End of .container -->
<!-- cart start -->
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$count = 0;
foreach ($_SESSION['cart'] as $item) {
    $count += $item['num'];
}
?>
<script type="text/javascript">
    function addCart(productId, num) {
        $.post('api/ajax_request.php', {
            'action': 'cart',
            'id': productId,
            'num': num
        }, function (data) {
            location.reload()
        })
    }
</script>
<a href="cart.php">
    <span class="cart_icon">
        <img src="asset/photo/cart_icon1.png" alt="">
        <span class="cart_count">
            <?= $count ?>
        </span>
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