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
          "emptyTable": "ไม่พบข้อมูลอยู่ในระบบ"
        }
      });
    });
  }


  // Button Click to add data in database supplier
  $('#add').click(function(e) {
    e.preventDefault();

    $('#addModal').modal('toggle');

  })

  $('#addtosave').click(function(e) {
    e.preventDefault();

    var name = $('#name').val();
    var address = $('#address').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var sale_name = $('#sale_name').val();
    var sale_position = $('#sale_position').val();
    var sale_phone = $('#sale_phone').val();

    // DEBUG

    // console.log("Name: " + name);
    // console.log("address: " + address);
    // console.log("email: " + email);
    // console.log("phone: " + phone);

    $.ajax({
      url: 'supplierController.php',
      method: 'POST',
      data: {
        name: name,
        address: address,
        email: email,
        phone: phone,
        sale_name: sale_name,
        sale_position: sale_position,
        sale_phone: sale_phone,
        add: 'add' 
      },
      success: function(response) {
        if(response === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'เพิ่มข้อมูลบริษัท สำเร็จ!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location.href = 'addSupplier.php';
          })
        } else if(response === 'checkyourdata') {
          Swal.fire({
            icon: 'warning',
            title: 'กรุณากรอกข้อมูลให้ครบถ้วน!',
          })
        } else if(response === 'phone') {
          Swal.fire({
            icon: 'warning',
            title: 'กรุณากรอกเบอร์โทรติดต่อให้ครบถ้วน!',
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'เพิ่มข้อมูลบริษัท ล้มเหลว!',
          })
        }
      }
    })

  })

  // UPDATE 
  $(document).on('click', 'a[data-role=edit]', function(e) {
    var id = $(this).data('id');
    e.preventDefault();

    $('#editModal').modal('toggle')

    var name = $('#' + id).children('td[data-target=name]').text();
    var address = $('#' + id).children('td[data-target=address]').text();
    var email = $('#' + id).children('td[data-target=email]').text();
    var phone = $('#' + id).children('td[data-target=phone]').text();
    var sale_name = $('#' + id).children('td[data-target=sale_name]').text();
    var sale_position = $('#' + id).children('td[data-target=sale_position]').text();
    var sale_phone = $('#' + id).children('td[data-target=sale_phone]').text();

    $('#id2').val(id);

    $('#name2').val(name);
    $('#address2').val(address);
    $('#email2').val(email);
    $('#phone2').val(phone);
    $('#sale_name2').val(sale_name);
    $('#sale_position2').val(sale_position);
    $('#sale_phone2').val(sale_phone);

    // DEBUG 
    // console.log(id);


  })

  $(document).on('click', '#update', function(e) {
    e.preventDefault();

    var id = $('#id2').val()
    var name = $('#name2').val()
    var address = $('#address2').val()
    var email = $('#email2').val()
    var phone = $('#phone2').val()
    var sale_name = $('#sale_name2').val()
    var sale_position = $('#sale_position2').val()
    var sale_phone = $('#sale_phone2').val()

    // DEBUG 
    // console.log("name: " + name);
    // console.log("address: " + address);
    // console.log("email: " + email);
    // console.log("phone: " + phone);


    $.ajax({
      url: 'supplierController.php',
      method: 'POST',
      data: {
        id: id,
        name: name,
        address: address,
        email: email,
        phone: phone,
        sale_name: sale_name,
        sale_position: sale_position,
        sale_phone: sale_phone,
        update: 'update' 
      },
      success: function(response) {
        if(response === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'อัปเดทข้อมูลบริษัท สำเร็จ!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location.href = 'addSupplier.php';
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'อัปเดทข้อมูลบริษัท ล้มเหลว!',
          })
        }
      }
    })


  })

  // DELETE DATA
  $(document).on('click', 'a[data-role=delete]', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var name = $('#' + id).children('td[data-target=name]').text();

    // DEBUG TESTING 
    // console.log(id);

    Swal.fire({
      title: 'คุณแน่ใจใช่หรือไม่จะลบข้อมูล: ' + name + ' รายการนี้?',
      text: "เมื่อลบแล้วไม่เอาข้อมูลกลับคืนได้!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          url: 'supplierController.php',
          method: 'POST',
          data: {
            id: id,
            delete: 'delete' 
          },
          success: function(response) {
            if(response === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลนี้สำเร็จ',
                text: 'ข้อมูลถูกลบออกจากระบบแล้ว.',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = 'addSupplier.php';
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'ลบข้อมูลล้มเหลว ล้มเหลว!',
              })
            }
          }
        })
      }
    })
    

  })

})