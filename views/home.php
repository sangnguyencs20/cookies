<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="assets/styles/homepage.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <title>Trang chủ</title>
</head>

<body>
  

  <div id="HomepageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#HomepageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#HomepageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#HomepageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/promotion/Airpods-Pro-2880-800-1920x533-2.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/promotion/Mac-2880-800-1920x533-1.webp" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/promotion/wo-top-2880-800-1920x533.webp" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#HomepageCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#HomepageCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div id="categories" class="row">
    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/iphone.webp" alt="iPhone" style="height: 100px;">
        <p>iPhone</p>
      </button>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/ipad.webp" alt="iPad" style="height: 100px;">
        <p>iPad</p>
      </button>
    </div>

    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/mac.webp" alt="Mac" style="height: 100px;">
        <p>Mac</p>
      </button>
    </div>

    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/watch.webp" alt="Watch" style="height: 100px;">
        <p>Watch</p>
      </button>
    </div>

    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/airpods.webp" alt="Sounding" style="height: 100px;">
        <p>Sounding</p>
      </button>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-dark btn-block" style="border-radius: 15px; width: 100%;">
        <img src="images/categories/accessories.webp" alt="Accessories" style="height: 100px;">
        <p>Accessories</p>
      </button>
    </div>
  </div>



  <script>
    // Toggle the visibility of the navigation options upon clicking the navigation button
    var navbarToggler = document.querySelector('.navbar-toggler');
    var navbarCollapse = document.querySelector('.navbar-collapse');
    navbarToggler.addEventListener('click', function() {
      navbarCollapse.classList.toggle('show');
    });
  </script>
  <!-- Required JavaScript files for Bootstrap carousel -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>