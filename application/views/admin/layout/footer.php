        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>
                            <strong>PELAPORAN SB SEXING BBIB SINGOSARI</strong>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script>
    var apiUrl = "<?= site_url('admin/') ?>"
  </script>  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>

  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    $(document).ready(function(){
      $('.select2').select2();
      $(".select2-tags").select2({
        tags: true
      });

      $('select:not(.normal)').each(function () {
          $(this).select2({
              dropdownParent: $(this).parent()
          });
      });

      $('#table').DataTable();

      $('#filter-peternak').change(function(){
        var id = $(this).val()
        location.href = URL_add_parameter(location.href, 'pt', id);
      })

      $('#filter-petugas').change(function(){
        var id = $(this).val()
        location.href = URL_add_parameter(location.href, 'pg', id);
      })

      $('#filter-month').change(function(){
        var month = $(this).val()
        location.href = URL_add_parameter(location.href, 'm', month);
      })

      $('#filter-year').change(function(){
        var year = $(this).val()
        location.href = URL_add_parameter(location.href, 'y', year);
      })
    })

    function URL_add_parameter(url, param, value){
        var hash       = {};
        var parser     = document.createElement('a');

        parser.href    = url;

        var parameters = parser.search.split(/\?|&/);

        for(var i=0; i < parameters.length; i++) {
            if(!parameters[i])
                continue;

            var ary      = parameters[i].split('=');
            hash[ary[0]] = ary[1];
        }

        hash[param] = value;

        var list = [];  
        Object.keys(hash).forEach(function (key) {
            list.push(key + '=' + hash[key]);
        });

        parser.search = '?' + list.join('&');
        return parser.href;
    }
  </script>

  <!-- Laporan Script -->
  <script>
    $("#provinsi").change(function() {
        var provinsi_id = $(this).val();
        $.ajax({
            url: "<?= site_url('admin/pelaporan/getKabupaten'); ?>",
            method: "POST",
            data: { provinsi_id: provinsi_id },
            dataType: "json",
            success: function(data) {
              $("#kabupaten").html('<option value="">Pilih Kabupaten</option>');
              data.forEach(function(item) {
                  $("#kabupaten").append('<option value="' + item.code + '">' + item.name + '</option>');
              });
            }
        });
    });

    $("#kabupaten").change(function() {
        var kabupaten_id = $(this).val();
        $.ajax({
            url: "<?= site_url('admin/pelaporan/getKecamatan'); ?>",
            method: "POST",
            data: { kabupaten_id: kabupaten_id },
            dataType: "json",
            success: function(data) {
              $("#kecamatan").html('<option value="">Pilih Kecamatan</option>');
              data.forEach(function(item) {
                  $("#kecamatan").append('<option value="' + item.code + '">' + item.name + '</option>');
              });
            }
        });
    });

    $("#kecamatan").change(function() {
        var kecamatan_id = $(this).val();
        $.ajax({
            url: "<?= site_url('admin/pelaporan/getKelurahan'); ?>",
            method: "POST",
            data: { kecamatan_id: kecamatan_id },
            dataType: "json",
            success: function(data) {
              $("#kelurahan").html('<option value="">Pilih Kelurahan</option>');
              data.forEach(function(item) {
                  $("#kelurahan").append('<option value="' + item.code + '">' + item.name + '</option>');
              });
            }
        });
    });

    $('#select-peternak').change(function(){
      var id = $(this).val()

      $.ajax({
        url: '<?= site_url('admin/pelaporan/getNomorAnggota') ?>',
        type: 'get',
        data: {id: id},
        beforeSend: function(){

        }, success: function(res){
          $('#no-anggota').val(res)
        }
      })
    })

    $('#cloneDiv').click(function(){
      $('select').select2('destroy')

      var length = $(".tanggal-ib").length
      var increment = length + 1
      var newId = "clone-" + increment
      var clone = $("#clone-1").clone()

      clone.attr("id", newId)
      clone.find(".btn-remove").removeClass("d-none")
      clone.find(".btn-remove").attr("data-id", increment)
      clone.find(".nomor-sub").text( increment + ". ")
      clone.find("input").val("")
      
      $(".hasil").append(clone)
      selectRefresh()

      $('.btn-remove').click(function(){
        var id = $(this).attr('data-id')
        $('#clone-' + id).remove()
      })
    });

    $('.btn-remove').click(function(){
      var id = $(this).attr('data-id')
      $('#clone-' + id).remove()
    })

    $('#input-username').keyup(function(){
      var username = $(this).val()
      var id = $(this).attr('data-id')
      $.ajax({
        url: '<?= site_url('admin/user/checkUsername') ?>',
        type: 'get',
        data: {username: username, id: id},
        success: function(res){
          if(res === 200){
            $('.form-username').removeClass('has-danger')
            $('.form-username').addClass('has-success')
            $('#input-username').removeClass('is-invalid')
            $('#input-username').addClass('is-valid')
          }else{
            $('.form-username').removeClass('has-success')
            $('.form-username').addClass('has-danger')
            $('#input-username').removeClass('is-valid')
            $('#input-username').addClass('is-invalid')
          }
        }
      })
    })

    function selectRefresh() {
      $('select:not(.normal)').each(function () {
          $(this).select2();
      });
    }
  </script>
  
</body>

</html>