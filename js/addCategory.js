$(document).ready(function(e) {

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
          "info": "Showing page _PAGE_ of _PAGES_ ของทั้งหมด _TOTAL_ รายการ",
        }
      });
    });
  }

  // ADD DATA

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
                  window.location.href = "addCategory.php";
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

  // GET INFO DATA ONE SELECT 

  $(document).on('click', 'a[data-role=update]', function() {
    var id = $(this).data('id');
    var name = $('#' + id).children('td[data-target=name]').text();

    $("#editname").val(name)
    $("#editid").val(id)
    $('#editModal').modal('toggle');
  });

  // SAVE & Update

  $(document).on('click', '#saved', function(e) {

    var name = $('#editname').val();
    var id = $('#editid').val();
    e.preventDefault();

    if(!name) {
      Swal.fire({
        title: 'โปรดกรอกข้อมูลให้ครบถ้วน',
        icon: 'error',
        confirmButtonText: 'ตกลง',
      })
    } else {
      $.ajax({
        url: 'addCategoryController.php',
        method: 'post',
        data: {
          name: name,
          id: id,
          update: 'update'
        },
        success: function(response) {
          if(response === "success") {
            Swal.fire({
              icon: 'success',
              title: 'บันทึกสำเร็จ',
              showConfirmButton: false,
              timer: 1500
            })
            $('#editModal').modal('toggle');
            $('#' + id).children('td[data-target=name]').text(name);
          } else {
            Swal.fire({
              icon: 'error',
              title: 'บันทึกล้มเหลว',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }

    
  })

  // Delete

  $(document).on('click', 'a[data-role=delete]', function(e) {
    var id = $(this).data('id');
    var name = $('#' + id).children('td[data-target=name]').text();
    e.preventDefault();
    Swal.fire({
      title: 'คุณต้องการลบข้อมูล: ' + name + ' นี้หรือไม่?',
      text: "จะไม่สามารถย้อนกลับมาได้อีก",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่ลบเลย',
      cancelButtonText: 'ยกเลิก',
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          url: 'addCategoryController.php',
          method: 'POST',
          data: {
            id: id,
            delete: 'delete'
          },
          success: function(response) {
            if(response === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "addCategory.php";
              })
            } else {
              Swal.fire(
                'ล้มหลว โปรดติดต่อเจ้าหน้าที่!',
                'ลบข้อมูลไม่สำเร็จ',
                'error'
              )
            }
          }
        })
      }
    })
  })
  
})