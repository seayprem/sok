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

})