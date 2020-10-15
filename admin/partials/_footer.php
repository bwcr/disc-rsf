<footer>

</footer>
<!-- body wrapper -->
<!-- plugins:js -->
<script src="node_modules/material-components-web/dist/material-components-web.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/progressbar.js/dist/progressbar.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/misc.js"></script>
<script src="js/material.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/fc-3.2.5/sc-2.0.0/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
    $('.table').DataTable({
      scrollX: true,
      "bAutoWidth": false,
      responsive: true
    });
    // $('.table').css("white-space","nowrap");
    $('#toggleModalMitra').click(function(){
      $("#addMitra").modal({
        fadeDuration: 100
      });
    });
    $(".deleteResponden").each(function(){
      $(this).click(function(){
        if(!confirm('Anda akan menghapus jawaban responden, lanjutkan?')){
          return false;
        }
      });
    });
    // function deleteResponden(){
    //   if(!confirm('Apakah anda ingin menghapus responden ini?')){
    //     return false;
    //   }
    // };
    // $('#toggleSubModalMitrangelesin').click(function(){
    //   $('#editngelesin').modal({
    //     closeExisting: false,
    //     fadeDuration: 100
    //   });
    // });
    $('#alertModal').modal();

      //Toggle Password
      $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        // var input = $($(this).attr("toggle"));
        var input = $(this).prev();
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

      jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
      }, "Username must not having a space character");

      $("form").each(function(){
        $(this).validate({
          rules: {
            username: {
              noSpace: true
            },
            email: {
              required: true
            },
            password: {
              required: true
            },
            newPassword: {
              required: true
            },
            confirmPassword: {
              required: true,
              equalTo: "#newPassword"
            }
          }
        });
      })
      $.extend( $.validator.messages, {
        required: "Kolom ini diperlukan.",
        remote: "Harap benarkan kolom ini.",
        email: "Silakan masukkan format email yang benar.",
        url: "Silakan masukkan format URL yang benar.",
        date: "Silakan masukkan format tanggal yang benar.",
        dateISO: "Silakan masukkan format tanggal(ISO) yang benar.",
        number: "Silakan masukkan angka yang benar.",
        digits: "Harap masukan angka saja.",
        creditcard: "Harap masukkan format kartu kredit yang benar.",
        equalTo: "Harap masukkan nilai yg sama dengan sebelumnya.",
        maxlength: $.validator.format( "Input dibatasi hanya {0} karakter." ),
        minlength: $.validator.format( "Input tidak kurang dari {0} karakter." ),
        rangelength: $.validator.format( "Panjang karakter yg diizinkan antara {0} dan {1} karakter." ),
        range: $.validator.format( "Harap masukkan nilai antara {0} dan {1}." ),
        max: $.validator.format( "Harap masukkan nilai lebih kecil atau sama dengan {0}." ),
        min: $.validator.format( "Harap masukkan nilai lebih besar atau sama dengan {0}." )
      });
      $("input[name='username'],input[name='password'],input[type='email'],input[type='password']").on({
        keydown: function(e) {
          if (e.which === 32)
            return false;
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
        }
      });
    });
  </script>