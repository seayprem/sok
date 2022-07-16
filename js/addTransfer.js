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

  $('#selectMode').change(function() {
    // e.preventDefault();
    
    // DEBUG 
    if(this.value == 1) {
      $('#emp').show();
      $('#company').hide();
    } else {
      $('#emp').hide();
      $('#company').show();
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
        console.log(response);
      }
    })
  })

})