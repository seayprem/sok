$(document).ready(function() {
  $('#logout').click(function(e) {
    e.preventDefault();

    $.ajax({
      url: 'logout.php',
      method: 'POST',
      data: {
        logout: 'logout'
      },
      success: function(data) {
        if(data === 'logout') {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ออกจากระบบสำเร็จ',
            showConfirmButton: false,
            confirmButtonColor: '#FCD535',
            color: '#000',
            timer: 1500
          }).then((result) => {
            window.location = "login.php";
          })
        } else {
          alert("Logout Failed");
        }
      }
    })
  })
})