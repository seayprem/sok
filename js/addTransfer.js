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


  // SELECT EMP & COMPANY

  $('#emp').hide();
  $('#company').hide();

  $('#status').change(function() {
    // e.preventDefault();
    
    // DEBUG 
    if(this.value == 1) {
      $('#emp').hide();
      $('#company').show();
      $('#emp').prop('selectedIndex', 0);
    } else {
      $('#emp').show();
      $('#company').hide();
      $('#company').prop('selectedIndex', 0);
    }
    
  })

  // ADD

  $('#add').click(function(e) {
    e.preventDefault();

    $('#addModal').modal('toggle')

  })

  $('#save').click(function(e) {
    e.preventDefault();
    
    var productId = $("#inv_id").val();
    var productQty = $("#qty").val();
    var status = $("#status").val();
    var empId = $("#empId").val();
    var supId = $("#supId").val();

    // DEBUG 
    // console.log(productId);
    // console.log(productQty);
    // console.log(status);
    // console.log(empId);
    // console.log(supId);

    Swal.fire({
      title: 'คุณแน่ใจใช่แล้วหรือไม่? ที่ต้องการบันทึกข้อมูล',
      text: "โปรดตรวจสอบข้อมูลให้ครบถ้วน",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง',
      cancelButtonText: 'ยกเลิก',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'addTransferController.php',
          method: 'POST',
          data: {
            productid: productId,
            qty: productQty,
            status: status,
            employee: empId,
            company: supId,
            add: 'add'
          },
          success: function(response) {
            if(response === "success") {
              // เดี๋ยวกลับมาทำต่อ
              Swal.fire({
                icon: 'success',
                title: 'เพิ่มรายการเดินสินค้าสำเร็จ!',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "addTransfer.php";
              })
            } else {
              // Swal.fire({
              //   icon: 'error',
              //   title: 'เพิ่มรายการเดินสินค้าล้มเหลว!'
              // })
              console.log(response)
            }
          } 
        })
      }
    })

    
  })

  $(document).on('click', 'a[data-role=delete]', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var product = $('#' + id).children('td[data-target=product]').text();
    console.log(id);

    Swal.fire({
      title: 'คุณแน่ใจใช่หรือไม่? ที่ต้องการลบข้อมูล : (' + product + ") รายการนี้",
      text: "ถ้าลบไม่ไปแล้วไม่สามารถย้อนคืนได้อีก!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง',
      cancelButtonText: 'ยกเลิก',
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          url: 'addTransferController.php',
          method: 'POST',
          data: {
            id: id,
            delete: 'delete'
          },
          success: function(response) {
            if(response === "success") {
              Swal.fire({
                icon: 'success',
                title: 'ลบข้อมูลสำเร็จ!',
                text: 'ข้อมูลถูกลบออกจากระบบแล้ว',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "addTransfer.php";
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'ลบข้อมูลล้มเหลว!',
                text: 'ไม่สามารถทำรายการนี้ได้โปรดลองอีกครั้งค่ะ!'
              })
            }
          }
        })

        
      }
    })

  })

})