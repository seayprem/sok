<!-- Employee  -->
<?php 
if($_SESSION['emp_level'] == 1) {

?>
 
<div class="sidebar" id="side_nav">
      <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i
              class="fa-solid fa-car-side"></i></span><span class="text-white">SOK Production</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
            class="fa-solid fa-bars-staggered"></i></button>
      </div>

      <ul class="list-unstyled px-2">

        <li class=""><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i
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
        <li class=""><a href="transfer.php" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-arrow-right-arrow-left"></i> รายการเดินสินค้า</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-dolly"></i>
            รายการเบิกจ่ายสินค้า</a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-building"></i>
            บริษัทคู่ค้าการผลิต</a></li>
      </ul>
      <hr class="h-color mx-2">
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>เพิ่มข้อมูลสินค้า</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="addCategory.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-layer-group"></i> เพิ่มประเภทสินค้า</a>
        </li>
        <li class=""><a href="addProduct.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-cart-plus"></i> เพิ่มรายการสินค้า</a>
        </li>
      </ul>
      <hr class="h-color mx-2">
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>บัญชี</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> คุณ
            <?= $_SESSION['emp_fname']; ?> <?= $_SESSION['emp_lname']; ?></a>
        </li>
        <li class=""><a href="#" id="logout" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-right-from-bracket"></i>
            ออกจากระบบ</a></li>
      </ul>

    </div>
<?php } ?>

<?php 
if($_SESSION['emp_level'] == 2) {


?>

<div class="sidebar" id="side_nav">
      <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i
              class="fa-solid fa-car-side"></i></span><span class="text-white">SOK Production</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
            class="fa-solid fa-bars-staggered"></i></button>
      </div>

      <ul class="list-unstyled px-2">

        <li class=""><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i
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
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>รายงานสรุป</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-file"></i> รายงานนำเข้าสินค้า</a>
        </li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-file-lines"></i> รายงานเบิกจ่ายนำเข้าสินค้า</a>
        </li>
      </ul>
      <hr class="h-color mx-2">
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>บัญชี</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> คุณ
        <?= $_SESSION['emp_fname']; ?> <?= $_SESSION['emp_lname']; ?></a>
        </li>
        <li class=""><a href="#" id="logout" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-right-from-bracket"></i>
            ออกจากระบบ</a></li>
      </ul>

    </div>

<?php } ?>


<?php 
if($_SESSION['emp_level'] == 3) {


?>

<div class="sidebar" id="side_nav">
      <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
        <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2"><i
              class="fa-solid fa-car-side"></i></span><span class="text-white">SOK Production</span></h1>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
            class="fa-solid fa-bars-staggered"></i></button>
      </div>

      <ul class="list-unstyled px-2">

        <li class=""><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-house-chimney"></i>
            Dashboard</a></li>
        <hr class="h-color mx-2">

        <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>จัดการระบบ</small></a>

        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-boxes-stacked"></i> พนักงาน</a>
        </li>
        <!-- <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
            <span><i class="fal fa-comment"></i> Messages</span>
            <span class="bg-dark rounded-pill text-white py-0 px-2">02</span>
          </a>
        </li> -->
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-arrow-right-arrow-left"></i> การสำรองข้อมูล</a>
        </li>
      <hr class="h-color mx-2">
      <a class="text-decoration-none px-3 py-2 d-block text-secondary"><small>บัญชี</small></a>
      <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i> คุณ
        <?= $_SESSION['emp_fname']; ?> <?= $_SESSION['emp_lname']; ?></a>
        </li>
        <li class=""><a href="#" id="logout" class="text-decoration-none px-3 py-2 d-block"><i
              class="fa-solid fa-right-from-bracket"></i>
            ออกจากระบบ</a></li>
      </ul>

    </div>

<?php } ?>