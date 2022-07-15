$(document).ready(function(e) {
    const add = $('#add');
    const cancel = $('#cancel');
    const cate_name_input = $('#cate_name_input');
    const add_cate = $('#add_cate');
    const frm = $('#frm');
  
    // const { value: add_emp_form } = await Swal.fire({
    //   title: 'เพิ่มพนักงาน',
    //   html:
    //     '<input id="swal-input1" class="swal2-input">' +
    //     '<input id="swal-input2" class="swal2-input">',
    //   focusConfirm: false,
    //   preConfirm: () => {
    //     return [
    //       document.getElementById('swal-input1').value,
    //       document.getElementById('swal-input2').value
    //     ]
    //   }
    // })

    // if (add_emp_form) {
    //   Swal.fire(JSON.stringify(add_emp_form))
    // }

    // add.hide();
    cancel.hide();
  
    cate_name_input.prop('disabled', true)
  
  
    add_cate.click(function(e) {
      e.preventDefault();
      cate_name_input.prop('disabled', false)
  
      add.show();
      cancel.show();
      add_cate.hide();
    })
  
    cancel.click(function(e) {
      e.preventDefault();
      add.hide();
      cancel.hide();
      add_cate.show();
      cate_name_input.prop('disabled', true)
      frm[0].reset();
    })
  
    add.click(function(e) {
      e.preventDefault();
      // check = cate_name_input.val();
      $('#addEmpModal').modal('show');
      
    })
  
    $("#add_emp").click(function(e) {

      const username = $('#username').val();
      // alert(cateid)
      const password = $('#password').val();
      const fname = $('#fname').val();
      const lname = $('#lname').val();
      const address = $('#address').val();
      const phone = $('#phone').val();
      const level = $('#level').val();
      // console.log(catename)
  
  
      e.preventDefault();
  
      $.ajax({
        url: 'employeeController.php',
        method: 'POST',
        data: {
          username: username, 
          password: password, 
          fname: fname, 
          lname: lname, 
          address: address, 
          phone: phone, 
          level: level, 
          add_emp: 'add_emp'
        },
        success: function(data) {
          if(data === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'ทำการอัพเดทเสร็จสิ้น',
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              load_data();
              $('#cateModal').modal('hide');
            })
          } else {
            alert("failed")
          }
        }
      })
  
    })
  
    // GET DATA
  
    load_data();
  
    function load_data(query) {
      $.ajax({
        url: 'employeeFetch.php',
        method: 'POST',
        data: {
          query: query
        },
        success: function(data) {
          $('#showemp').html(data);
        }
      })
    }
  
    $('#search').keyup(function() {
      var search = $(this).val();
      if(search != '') {
        load_data(search);
      } else {
        load_data();
      }
    })
  
    // IT WORKING DONT TOUCH IT
    // มันไม่บัคก็อย่าไปยุ่งกับมัน
  
    // EDIT
    $(document).on('click', '#edit', function(e) {
      e.preventDefault();
      const cateid = $(this).data('id');
      // Swal.fire({
      //   icon: 'success',
      //   title: btnShow,
      // })
  
      // GET params
  
      $.ajax({
        url: 'addCategoryUpdate.php',
        method: 'POST',
        data: {
          cateid: cateid
        },
        success: function(response) {
          const cate_data = $('#cate_data');
          cate_data.html(response);
        }
      })
    })
  
    $("#saved").click(function(e) {
  
      const cateid = $('#cateid').val();
      // alert(cateid)
      const catename = $('#catename').val();
      // console.log(catename)
  
  
      e.preventDefault();
  
      $.ajax({
        url: 'addCategoryUpdate.php',
        method: 'POST',
        data: {
          update: cateid,
          name: catename
        },
        success: function(data) {
          if(data === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'ทำการอัพเดทเสร็จสิ้น',
              showConfirmButton: false,
              timer: 1500
            }).then((result) => {
              load_data();
              $('#cateModal').modal('hide');
            })
          } else {
            alert("failed")
          }
        }
      })
  
    })
  
    // DELETE
    $(document).on('click', '#delete', function(e) {
      const cateid = $(this).data('id');
      // console.log(cateid)
      const catenames = $(this).data('names');
      e.preventDefault();
  
      
  
      Swal.fire({
        title: 'แน่ใจใช่หรือไม่? ที่จะลบข้อมูล ' + catenames,
        text: "เมื่อลบไม่แล้วไม่สามารถย้อนข้อมูลกลับมาได้",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
      }).then((result) => {
        if (result.isConfirmed) {
         
          $.ajax({
            url: 'addCategoryUpdate.php',
            method: 'POST',
            data: {
              del: cateid
            },
            success: function(data) {
              if(data === "success") {
                Swal.fire({
                  icon: 'success',
                  title: 'ทำการลบข้อมูลเสร็จสิ้น',
                  showConfirmButton: false,
                  timer: 1500
                }).then((result) => {
                  load_data();
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'ทำการลบข้อมูลล้มเหลว กรุณาลองอีกครั้ง',
                  showConfirmButton: false,
                  timer: 1500
                }).then((result) => {
                  load_data();
                })
              }
              
            }
          })
          
        }
      })
    })
  
  
    // Pagination
    $('#notyet').click(function(e) {
      e.preventDefault()
      Swal.fire({
        icon: 'error',
        title: 'ยังทำไม่เป็น',
        text: 'ช่วยด้วยยย',
        showConfirmButton: false,
        timer: 1500
      })
    })
  
    $('#notyet1').click(function(e) {
      e.preventDefault()
      Swal.fire({
        icon: 'error',
        title: 'ยังทำไม่เป็น',
        text: 'ช่วยด้วยยย',
        showConfirmButton: false,
        timer: 1500
      })
    })
  
    $('#notyet2').click(function(e) {
      e.preventDefault()
      Swal.fire({
        icon: 'error',
        title: 'ยังทำไม่เป็น',
        text: 'ช่วยด้วยยย',
        showConfirmButton: false,
        timer: 1500
      })
    })
  
    $('#notyet3').click(function(e) {
      e.preventDefault()
      Swal.fire({
        icon: 'error',
        title: 'ยังทำไม่เป็น',
        text: 'ช่วยด้วยยย',
        showConfirmButton: false,
        timer: 1500
      })
    })
  
    $('#notyet4').click(function(e) {
      e.preventDefault()
      Swal.fire({
        icon: 'error',
        title: 'ยังทำไม่เป็น',
        text: 'ช่วยด้วยยย',
        showConfirmButton: false,
        timer: 1500
      })
    })
  
  })