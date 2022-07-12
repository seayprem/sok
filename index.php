<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOK Dashboard</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/all.min.css">
  <link rel="stylesheet" href="public/css/fontawesome.min.css">
  

  <style>
    body {
      background-color: #eee;
    }

    #side_nav {
      background: #000;
      min-width: 250px;
      max-width: 250px;
      transition: all 0.3s;
    }

    .content {
      min-height: 100vh;
      width: 100%;
    }

    hr.h-color {
      background-color: #eee;
    }

    .sidebar li.active {
      background-color: #eee;
      border-radius: 8px;
    }

    .sidebar li.active a,
    .sidebar li.active a:hover {
      color: #000;
    }

    .sidebar li a {
      color: #fff;
    }

    @media(max-width: 767px) {
      #side_nav {
        margin-left: -250px;
        position: fixed;
        min-height: 100vh;
        z-index: 1;
      }

      #side_nav.active {
        margin-left: 0;
      }

    }
  </style>

</head>

<body>

  <div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
      <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">CL</span> <span
            class="text-white">Coding League</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
      </div>

      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i>
            Dashboard</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Projects</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
            <span><i class="fal fa-comment"></i> Messages</span>
            <span class="bg-dark rounded-pill text-white py-0 px-2">02</span>
          </a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fal fa-envelope-open-text"></i> Services</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
            Customers</a></li>
      </ul>
      <hr class="h-color mx-2">

      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars"></i> Settings</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i>
            Notifications</a></li>
      </ul>

    </div>
    <div class="content">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">

          <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
            <a class="navbar-brand" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>
          </div>

          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fal fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Profile</a>
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

  <script/>

</body>

</html>