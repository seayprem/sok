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
  
    // ADD DATA
  
    $(document).on('click', '#add', function(e) {
      e.preventDefault();
      $('#addEmpModal').modal('toggle');
  
    })
  
    $('#add_emp').click(function(e) {
      var code = $('#code').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var address = $('#address').val();
      var phone = $('#phone').val();
      var level = $('#level').val();
  
      // DEBUG 
      // console.log("code " + code);
      // console.log("name " + name);
      // console.log("type " + type);
      // console.log("size " + size);
      // console.log("color " + color);
      // console.log("qty " + qty);
      // console.log("min " + min);
      // console.log("max " + max);
  
      if(code == "" || username == "" || password == "" || fname == "" || lname == "" || address == "" || phone.length < 10 || level == "" ){
        Swal.fire({
          icon: 'error',
          title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
          showConfirmButton: false,
          timer: 1500
        })
        
      }else{

        $.ajax({
          url: 'employeeController.php',
          method: 'POST',
          data: {
              code: code,
              username: username, 
              password: password, 
              fname: fname, 
              lname: lname, 
              address: address, 
              phone: phone, 
              level: level, 
              add_emp: 'add_emp'
          },
          success: function(response) {
            if(response === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'บันทึกสำเร็จ',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "employee.php";
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
      }
    })
  
    // EDIT & UPDATE DATA
    $(document).on('click', 'a[data-role=edit]', function(e) {
      var id = $(this).data('id');
      var user = $('#' + id).children('td[data-target=user]').text();
      var pass = $('#' + id).children('td[data-target=pass]').text();
      var fname = $('#' + id).children('td[data-target=fname]').text();
      var lname = $('#' + id).children('td[data-target=lname]').text();
      var address = $('#' + id).children('td[data-target=address]').text();
      var phone = $('#' + id).children('td[data-target=phone]').text();
      var level = $('#' + id).children('td[data-target=level]').text();
      e.preventDefault();
  
      $('#editEmpModal').modal('toggle');
  
      $('#code2').val(id);
      $('#user2').val(user);
      $('#pass2').val(pass);
      $('#fname2').val(fname);
      $('#lname2').val(lname);
      $('#address2').val(address);
      $('#phone2').val(phone);
      $('#level2').val(level);

  
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
  
    $(document).on('click', '#edit_emp', function(e) {
      var code = $('#code2').val();
  
      var user = $('#user2').val();
      var pass = $('#pass2').val();
      var fname = $('#fname2').val();
      var lname = $('#lname2').val();
      var address = $('#address2').val();
      var phone = $('#phone2').val();
      var level = $('#level2').val();
  
      // DEBUG TEST 
      // console.log("code " + code);
      // console.log("name " + name);
      // console.log("type " + type);
      // console.log("size " + size);
      // console.log("color " + color);
      // console.log("qty " + qty);
      // console.log("min " + min);
      // console.log("max " + max);
  
        // console.log(code);
        // console.log(user);
        // console.log(pass);
        // console.log(fname);
        // console.log(lname);
        // console.log(address);
        // console.log(phone);
        // console.log(level);

      e.preventDefault();
      // console.log("worked!" + id);
  
      $.ajax({
        url: 'employeeController.php',
        method: 'POST',
        data: {
          code: code,
          user: user,
          pass: pass,
          fname: fname,
          lname: lname,
          address: address,
          phone: phone,
          level: level,
          update: 'update'
        },
        success: function(response) {
          if(response === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'อัปเดทข้อมูลพนักงานสำเร็จ',
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              window.location.href = "employee.php";
              // Not working not use it
              // $('#' + id).children('td[data-target=name]').text(name);
              // $('#editModal').modal('toggle');
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'อัปเดทพนักงานล้มเหลว โปรดลองอีกครั้งค่ะ!'
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
        title: 'คุณแน่ใจใช่หรือไม่? จะลบพนักงานคนนี้',
        text: "ข้อมูลถูกลบออกจากระบบแล้ว",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: 'employeeController.php',
            method: 'POST',
            data: {
              code: code,
              delete: 'delete'
            },
            success: function(response) { 
              if(response === 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'ลบข้อมูลพนักงานสำเร็จ',
                  showConfirmButton: false,
                  timer: 1500
                }).then((result) => {
                  window.location.href = "employee.php";
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'ลบรายการล้มเหลว กรุณาลองใหม่อีกครั้ง',
                })
              }
            }
          })
        }
      })
  
      
  
    })
  
  })