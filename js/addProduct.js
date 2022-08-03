$(document).ready(function() {

  // datatable 

  getDataTable();

  function getDataTable() {
    $(document).ready( function () {
      $('#myTable').DataTable({
        "order": [[0, 'desc']],
        "language": {
          "zeroRecords": "ไม่พบรายการที่ค้นหา",
          "lengthMenu": "แสดงผล _MENU_ รายการ",
          "search": "ค้นหา",
          "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "ต่อไป",
            "previous":   "ก่อนหน้า"
          },
          "info": "หน้าแสดงผล _PAGE_ of _PAGES_ ของทั้งหมด _TOTAL_ รายการ",
          "emptyTable": "ไม่พบข้อมูลอยู่ในระบบ",
        }
      });
    });
  }

  // ADD DATA

  $(document).on('click', '#add', function(e) {
    e.preventDefault();
    $('#addModal').modal('toggle');

  })

  $('#save').click(function(e) {
    var code = $('#code').val();
    var name = $('#name').val();
    var type = $('#type').val();
    var size = $('#size').val();
    var color = $('#color').val();
    var qty = $('#qty').val();
    var min = $('#min').val();
    var max = $('#max').val();

    // DEBUG 
    // console.log("code " + code);
    // console.log("name " + name);
    // console.log("type " + type);
    // console.log("size " + size);
    // console.log("color " + color);
    // console.log("qty " + qty);
    // console.log("min " + min);
    // console.log("max " + max);


    $.ajax({
      url: 'addProductController.php',
      method: 'POST',
      data: {
        code: code,
        name: name,
        type: type,
        size: size,
        color: color,
        qty: qty,
        min: min,
        // max: max,
        addproduct: 'addproduct'
      },
      success: function(response) {
        if(response === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'บันทึกสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location.href = "addProduct.php";
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'บันทึกล้มเหลว',
            timer: 1500
          })
        }
      }
    })

  })

  // EDIT & UPDATE DATA
  $(document).on('click', 'a[data-role=edit]', function(e) {
    var id = $(this).data('id');
    var name = $('#' + id).children('td[data-target=name]').text();
    var type = $('#' + id).children('td[data-target=type]').text();
    var size = $('#' + id).children('td[data-target=size]').text();
    var color = $('#' + id).children('td[data-target=color]').text();
    var qty = $('#' + id).children('td[data-target=qty]').text();
    var min = $('#' + id).children('td[data-target=min]').text();
    var max = $('#' + id).children('td[data-target=max]').text();
    e.preventDefault();

    $('#editModal').modal('toggle');

    $('#code2').val(id);
    $('#name2').val(name);
    $('#type2').val(type);
    $('#size2').val(size);
    $('#color2').val(color);
    $('#qty2').val(qty);
    $('#min2').val(min);
    $('#max2').val(max);

    // DEBUG TEST 
    // console.log("code " + id);
    // console.log("name " + name);
    // console.log("type " + type);
    // console.log("size " + size);
    // console.log("color " + color);
    // console.log("qty " + qty);
    // console.log("min " + min);
    // console.log("max " + max);

  })

  $(document).on('click', '#save2', function(e) {
    var code = $('#code2').val();

    var name = $('#name2').val();
    var type = $('#type2').val();
    var size = $('#size2').val();
    var color = $('#color2').val();
    var qty = $('#qty2').val();
    var min = $('#min2').val();
    var max = $('#max2').val();

    // DEBUG TEST 
    // console.log("code " + code);
    // console.log("name " + name);
    // console.log("type " + type);
    // console.log("size " + size);
    // console.log("color " + color);
    // console.log("qty " + qty);
    // console.log("min " + min);
    // console.log("max " + max);

    e.preventDefault();
    // console.log("worked!" + id);

    $.ajax({
      url: 'addProductController.php',
      method: 'POST',
      data: {
        code: code,
        name: name,
        type: type,
        size: size,
        color: color,
        qty: qty,
        min: min,
        max: max,
        update: 'update'
      },
      success: function(response) {
        if(response === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'อัปเดทรายการสินค้าสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location.href = "addProduct.php";
            // Not working not use it
            // $('#' + id).children('td[data-target=name]').text(name);
            // $('#editModal').modal('toggle');
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'ลบรายการสินค้าล้มเหลว โปรดติดต่อเจ้าหน้าที่'
          })
        }
      }
    })


  })

  $(document).on('click', 'a[data-role=delete]', function(e) {
    var code = $(this).data('id');
    e.preventDefault();
    // alert("worked! " + code);

    Swal.fire({
      title: 'คุณแน่ใจใช่หรือไม่? จะลบรายการสินค้านี้',
      text: "ถ้าลบรายการนี้ไปแล้วจะไม่สามารถทำรายการได้อีก!!!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ยืนยัน',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'addProductController.php',
          method: 'POST',
          data: {
            code: code,
            delete: 'delete'
          },
          success: function(response) { 
            if(response === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'ลบรายการสินค้าสำเร็จ',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "addProduct.php";
              })
            } else {
              Swal.fire({
                icon: 'success',
                title: 'ลบรายการสินค้าล้มเหลว กรุณาลองใหม่อีกครั้งค่ะ',
              })
            }
          }
        })
      }
    })

    

  })

})