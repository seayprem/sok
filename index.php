<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOK Dashboard</title>

  <link rel="stylesheet" href="public/css/all.min.css">
  <link rel="stylesheet" href="public/css/fontawesome.min.css">

  <link rel="stylesheet" href="public/css/bootstrap.min.css">

  <link rel="stylesheet" href="public/css/styles.css">
  

</head>

<body>

  <div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
      <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i class="fa-solid fa-car-side"></i></span><span
            class="text-white">SOK Production</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
      </div>

      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-chimney"></i>
            Dashboard</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-boxes-stacked"></i> สินค้าคงเหลือ</a>
        </li>
        <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
            <span><i class="fal fa-comment"></i> Messages</span>
            <span class="bg-dark rounded-pill text-white py-0 px-2">02</span>
          </a>
        </li> -->
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-arrow-right-arrow-left"></i> รายการเดินสินค้า</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-dolly"></i> รายการเบิกจ่ายสินค้า</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-building"></i>
            บริษัทคู่ค้าการผลิต</a></li>
      </ul>
      <hr class="h-color mx-2">

      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> คุณ SOK</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-right-from-bracket"></i>
            ออกจากระบบ</a></li>
      </ul>

    </div>
    <div class="content">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">

          <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i></button>
            <a class="navbar-brand" href="#"><span class="bg-dark rounded px-2 py-0 text-white">SOK</span></a>
          </div>

          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars-staggered"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">โปรไฟล์</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> Dashboard</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nihil vero molestias praesentium vel
          aperiam doloremque dolorem, eos corporis reprehenderit iusto sit, sequi, ea perferendis? Eligendi voluptas
          ipsam iste animi.</p>
      </div>

    </div>
  </div>



  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> -->


  <script src="public/js/jquery-3.6.0.min.js"></script>
  <script src="public/js/popper.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/sweetalert2@11.js"></script>


  <script>
    $(".sidebar ul li").on('click', function () {
      $(".sidebar ul li.active").removeClass('active');
      $(this).addClass('active');
    });

    $('.open-btn').on('click', function () {
      $('.sidebar').addClass('active');
    });

    $('.close-btn').on('click', function () {
      $('.sidebar').removeClass('active');
    });

  </script>

</body>

</html>