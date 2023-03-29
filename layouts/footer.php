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
    <footer class="text-white text-center text-lg-start bg-dark">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row mt-4">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">About company</h5>

                    <p>
                        Cookies - Nơi cung cấp các sản phẩm CHÍNH HÃNG Gaming PC, Laptop, Chuột Gaming, Phím cơ, và
                        các sản phẩm phụ kiện dành cho gamer đến từ các nhãn hàng uy tín tại thị trường Việt Nam như
                        Razer, Logitech, Corsair, Asus, MSI và các hãng khác.
                    </p>


                    <div class="mt-4">
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
                    <h5 class="text-uppercase mb-4 pb-1">Search something</h5>

                    <div class="form-outline form-white mb-4">
                        <input type="text" id="formControlLg" class="form-control form-control-lg" />
                        <label class="form-label" for="formControlLg">Search</label>
                    </div>

                    <ul class="fa-ul" style="margin-left: 1.65em;">
                        <li class="mb-3">
                            <span class="fa-li">
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            </span><span class="ms-2">Warsaw, 00-967,
                                Poland</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fa fa-envelope-o" aria-hidden="true"></i></span><span
                                class="ms-2">vuongkhanhlinh99@gmail.com</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fa fa-phone" aria-hidden="true"></i></span><span
                                class="ms-2">0964524611
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Opening hours</h5>

                    <table class="table text-center text-white">
                        <tbody class="fw-normal">
                            <tr>
                                <td>Mon - Thu:</td>
                                <td>8am - 9pm</td>
                            </tr>
                            <tr>
                                <td>Fri - Sat:</td>
                                <td>8am - 1am</td>
                            </tr>
                            <tr>
                                <td>Sunday:</td>
                                <td>9am - 10pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">byHMQ</a>
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