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
          "info": "Showing page _PAGE_ of _PAGES_ ของทั้งหมด _TOTAL_ รายการ",
          "emptyTable": "ไม่พบข้อมูลอยู่ในระบบ"
        }
      });
    });
  }

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
        max: max,
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

})