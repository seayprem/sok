$(document).ready(function(e) {
  const add = $('#add');
  const cancel = $('#cancel');
  const cate_name_input = $('#cate_name_input');
  const add_cate = $('#add_cate');
  const frm = $('#frm');

  add.hide();
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
    check = cate_name_input.val();
    
    Swal.fire({
      title: 'คุณแน่ใจใช่แล้วหรือไม่ ที่ต้องการเพิ่มข้อมูลชุดนี้',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'ตกลง',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if(result.isConfirmed) {
        if(!check) {
          Swal.fire({
            title: 'โปรดกรอกข้อมูลให้ครบถ้วน',
            icon: 'error',
            confirmButtonText: 'ตกลง',
          })
          add.hide();
          cancel.hide();
          add_cate.show();
          cate_name_input.prop('disabled', true)
        } else {
          $.ajax({
            url: 'addCategoryController.php',
            method: 'POST',
            data: {
              name: cate_name_input.val(),
              add: 'add'
            },
            success: function(data) {
              if(data === 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'บันทึกข้อมูลสำเร็จ',
                  showConfirmButton: false,
                  timer: 1500
                }).then((result) => {
                  load_data();
                })
                frm[0].reset();
                add.hide();
                cancel.hide();
                add_cate.show();
                cate_name_input.prop('disabled', true)
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'บันทึกข้อมูลล้มเหลว',
                  showConfirmButton: false,
                  timer: 1500
                })
                frm[0].reset();
                add.hide();
                cancel.hide();
                add_cate.show();
                cate_name_input.prop('disabled', true)
              }
            }
          })
        }
        
      }
    })
  })


  // GET DATA

  load_data();

  function load_data(query) {
    $.ajax({
      url: 'addCategoryFetch.php',
      method: 'POST',
      data: {
        query: query
      },
      success: function(data) {
        $('#showcate').html(data);
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
    e.preventDefault();
    Swal.fire({
      icon: 'success',
      title: 'DELETE',
    })
  })


})