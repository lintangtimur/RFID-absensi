$(document).ready(function() {

  // Input field langsung fokus
  $('#inputs').focus();

  // jika ada perubahan di input field [ENTER], akan mentrigger
  $("input").change(function() {
    var id = $('#inputs').val();

    $.ajax({
        url: 'input.php',
        type: 'post',
        data: {
          id: id
        }
      })
      .done(function(data) {
        console.log(data);

        // hapus alert danger dan sukses agar bisa bergantian class
        $('.alert').removeClass('alert-danger alert-success');

        if (data == "err") {
          $('.alert').addClass('alert-danger').html("RFID belum terdaftar di dalam system kami: " + "<b>" + id + "</b>");
        } else {
          $('.alert').addClass('alert-success').html(data);
        }

        $('#inputs').val(""); //Mengkosongkan input field
        $('#inputs').focus(); //mengembalikan cursor ke input field

      })
      .fail(function(data) {
        console.log(data);
      });
  });
});
