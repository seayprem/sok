$(document).ready(function() {
  $('#loadingLogin').hide();

  $('#login').click(function(e) {
    e.preventDefault();

    const username = $("#username").val();
    const password = $("#password").val();

    if(!username || !password) {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'โปรดใส่ชื่อผู้ใช้และรหัสผ่าน',
        showConfirmButton: true,
        confirmButtonColor: '#FCD535',
        color: '#000'
      })
    } else {
      $.ajax({
        url: 'checkLogin.php',
        method: 'post',
        data: {
          username: $("#username").val(),
          password: $("#password").val(),
          login: 'login'
        },
        beforeSend: function() {
          $('#loadingLogin').show();
          $('#login').hide();
        },
        success: function(data) {
          
          if(data === 'success') {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'เข้าสู่ระบบสำเร็จ',
              showConfirmButton: false,
              confirmButtonColor: '#FCD535',
              color: '#000',
              timer: 1500
            }).then((result) => {
              $('#loadingLogin').hide();
              $('#login').show();
              window.location = "index.php";
            })
          } else {
            $('#loadingLogin').hide();
            $('#login').show();
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'เข้าสู่ระบบล้มเหลว โปรดตรวจสอบชื่อผู้ใช้และรหัสผ่าน',
              showConfirmButton: true,
              confirmButtonColor: '#FCD535',
              color: '#000'
            }).then((result) => {
              $('#loadingLogin').hide();
              $('#login').show();
            })
            
          }
        }
      })
    }

    
  })

})