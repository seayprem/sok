<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ | SOK Production</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  


  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex">
          <!-- <img src="deknoii.png" alt=""> -->
        </div>
        <div class="card-body">
          <h4 class="title text-center mt-4">
            SOK Production <br>
            <hr>
            เข้าสู่ระบบ
          </h4>
          <form class="form-box px-3" action="#" method="POST">
            <div class="form-input">
              <span><i class="fa-solid fa-user"></i></span>
              <input type="text" name="username" id="username" placeholder="กรุณาป้อนชื่อผู้ใช้">
            </div>
            <div class="form-input">
              <span><i class="fa-solid fa-key"></i></span>
              <input type="password" name="password" id="password" placeholder="กรุณาป้อนรหัสผ่าน">
            </div>

            <div class="mb-3 d-grid gap-2">
              <button type="submit" class="btn text-uppercase" id="login" name="login">
                <i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ
              </button>
              <button class="btn btn-warning" type="button" id="loadingLogin" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
              </button>
            </div>
            <hr class="my-5">

            <div class="text-center mb-2">
              SOK Production &copy; 2022
              <br>
              บริษัทผลิตพรมรถยนต์ตรงรุ่น ทุกรูปแบบ
              <br>
              โทร. 092 919 8890
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>




  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
  <script src="js/login.js"></script>

</body>
</html>