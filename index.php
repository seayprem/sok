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
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i
              class="fa-solid fa-car-side"></i></span><span class="text-white">SOK Production</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
            class="fa-solid fa-bars-staggered"></i></button>
      </div>

      <ul class="list-unstyled px-2">

        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-house-chimney"></i>
            Dashboard</a></li>
        <hr class="h-color mx-2">

        <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>คลังสินค้า</small></a>

        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-boxes-stacked"></i> สินค้าคงเหลือ</a>
        </li>
        <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
            <span><i class="fal fa-comment"></i> Messages</span>
            <span class="bg-dark rounded-pill text-white py-0 px-2">02</span>
          </a>
        </li> -->
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-arrow-right-arrow-left"></i> รายการเดินสินค้า</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-dolly"></i>
            รายการเบิกจ่ายสินค้า</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-building"></i>
            บริษัทคู่ค้าการผลิต</a></li>
      </ul>
      <hr class="h-color mx-2">
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>บัญชี</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> คุณ
            SOK</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-right-from-bracket"></i>
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
        <hr>
        <div class="col-md-12">
          <div class="row">

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-primary text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-arrow-right-arrow-left" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3">10</h3>
                      <h6>รายการเดินสินค้าวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-success text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-truck" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3">10</h3>
                      <h6>สินค้าที่นำเข้าวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-warning text-dark">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-dolly" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3">10</h3>
                      <h6>สินค้าที่เบิกจ่ายวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-secondary text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-dolly" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3">50</h3>
                      <h6>สินค้าคงเหลือทั้งหมด</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->


          </div>
        </div>

        <!-- Chart Data  -->

        <hr>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <canvas id="myChartSize" height="500"></canvas>
            </div>
            <div class="col-md-6">
              <canvas id="myChartColor" height="500"></canvas>
            </div>
            <div class="col-md-12">
              <canvas id="myChartTransfer" height="500"></canvas>
            </div>
          </div>
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
    <script src="public/js/chart.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->


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

      const chartSize = document.getElementById('myChartSize');
      const myChartSize = new Chart(chartSize, {
        type: 'bar',
        data: {
          labels: ['XXL', 'XL', 'L'],
          datasets: [{
            label: 'ยอดสินค้าคงเหลือ (ขนาดของพรมรถยนต์)',
            data: [12, 19, 3],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
          }]
        },
        options: {
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });


      const chartColors = document.getElementById('myChartColor');
      const myChartColors = new Chart(chartColors, {
        type: 'doughnut',
        data: {
          labels: ['แดง', 'น้ำเงิน', 'เหลือง'],
          datasets: [{
            label: 'ยอดสินค้าคงเหลือ (ขนาดของพรมรถยนต์)',
            data: [32, 19, 3],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
          }]
        },
        options: {
          maintainAspectRatio: false,
        }
      });

      

      

    </script>





</body>

</html>