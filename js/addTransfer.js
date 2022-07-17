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


  $('#status').change(function(e) {
    // e.preventDefault();
    
    // DEBUG 
    // กว่าจะแก้ได้อีเวร
    if(this.value == 1) {
      $('#emp').hide();
      $('#company').show();
      // $('#company').find('option:eq(0)').prop('selected', true);
      // $('#emp').prop('selectedIndex',0);
    } else {
      $('#emp').show();
      $('#company').hide();
      // $('#emp').find('option:eq(0)').prop('selected', true);
      // $('#company').prop('selectedIndex',0);
    }
  })

  // ทำงานได้ละ อย่าแก้นะ ขอร้อง T_T

  $('#emp').change(function(e) {
    $('#company').find('option:eq(0)').prop('selected', true);
    $('#emp').prop('selectedIndex',0);
  })

  $('#company').change(function(e) {
    $('#emp').find('option:eq(0)').prop('selected', true);
    $('#company').prop('selectedIndex',0);
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
            } else if(response === "unsuccess") {
              Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถเบิกจ่ายได้ เนื่องจากสินค้ามีไม่เพียงพอ'
              })
             } else if(response === "notzero") {
              Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถเบิกจ่ายได้ เนื่องจากคุณใส่จำนวนน้อยกว่า 0 หรือเท่ากับ 0'
              })
             } else if(response === "notzeroadd") {
              Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถเพิ่มรายการเดินสินค้า เนื่องจากคุณใส่จำนวนน้อยกว่า 0 หรือเท่ากับ 0'
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

  // INFO
  $(document).on('click', 'a[data-role=info]', function(e) {
    e.preventDefault();

    // SELECT EMP & COMPANY

   

    // DEBUG TEST 

    var id = $(this).data('id');

    var product = $('#' + id).children('td[data-target=product]').text();
    var category = $('#' + id).children('td[data-target=category]').text();
    var amount = $('#' + id).children('td[data-target=amount]').text();
    var status = $('#' + id).children('td[data-target=statut]').text();
    var empname = $('#' + id).children('td[data-target=empname]').text();
    var timedate = $('#' + id).children('td[data-target=timedate]').text();

    // Swal.fire({
    //   icon: 'success',
    //   title: 'Worked! with: ' + id
    // })

    $('#infoModal').modal('toggle');


    $('#infoId').text(id);
    $('#infoProduct').text(product);
    $('#infoType').text(category);
    $('#infoAmount').text(amount);
    $('#infoStatus').text(status);
    $('#infoEmpname').text(empname);
    $('#infoDatetime').text(timedate);

  })


  // EDIT
  $(document).on('click', 'a[data-role=edit]', function(e) {
    e.preventDefault();

    var id = $(this).data('id');

    var product = $('#' + id).children('td[data-target=product]').text();
    var productId = $('#' + id).children('td[data-target=productId]').text();
    var category = $('#' + id).children('td[data-target=category]').text();
    var amount = $('#' + id).children('td[data-target=amount]').text();
    var status = $('#' + id).children('td[data-target=statut]').text();
    var status2 = $('#' + id).children('td[data-target=status2]').text();
    var empname = $('#' + id).children('td[data-target=empname]').text();
    var empid = $('#' + id).children('td[data-target=empid]').text();
    var supid = $('#' + id).children('td[data-target=supid]').text();
    var timedate = $('#' + id).children('td[data-target=timedate]').text();

     // SELECT EMP & COMPANY

    $('#emp2').hide();
    $('#company2').hide();

    $('#status2').change(function() {
      // e.preventDefault();
      
      // DEBUG 
      if(this.value == 1) {
        $('#emp2').hide();
        $('#company2').show();
        $('#emp2').prop('selectedIndex', 0);
      } else {
        $('#emp2').show();
        $('#company2').hide();
        $('#company2').prop('selectedIndex', 0);
        $('#selempid2').prop('selected', false);
      }
      
    })


    var id = $(this).data('id');

    $('#editModal').modal('toggle');

    $('#productId').val(productId)
    $('#productId').text(product)
    $('#qty2').val(amount)


    // Change Select

    $('#st2').val(status2).change();
    $('#st2').text(status)

    $('#selempid2').val(empid)
    $('#selempid2').text(empname)

    $('#selsupid2').val(supid)
    $('#selsupid2').text(empname)



    // console.log(id);
  })


  $('#update').click(function(e) {
    e.preventDefault();

    Swal.fire({
      icon: "warning",
      title: "กำลังอยู่ในช่วงพักเขียนโค้ด มันเหนื่อยยยยยยยย"
    })

    var inv_id2 = $("#inv_id2").val();
    var qty2 = $("#qty2").val();
    var status2 = $("#status2").val();
    var empId2 = $("#empId2").val();
    var supId2 = $("#supId2").val();

    console.log(inv_id2);
    console.log(qty2);
    console.log(status2);
    console.log(empId2);
    console.log(supId2);

  })

})