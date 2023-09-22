        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>
                            <strong>PELAPORAN SB SEXING SINGOSARI BBIB</strong>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $('#table').DataTable();

    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>


  <script>
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

    $('.btn-add-tgl').click(function(){
      var count = parseInt($('.nomor-sub:last').text()) + 1

      $('.hasil').append("<div class='d-flex align-items-center justify-content-between mb-2' id='form" + count + "'>\
                  <span class='me-2 nomor-sub'>" + count + ". </span>\
                  <input class='multisteps-form__input form-control' value='' type='date' name='tgl_ib[]' required=''>\
                  <button type='button' class='btn btn-icon-only btn-danger mb-0 ms-2 d-flex align-items-center justify-content-center btn-remove-tgl' data-id='" + count + "'><i class='fas fa-trash' aria-hidden='true'></i></button>\
                </div>")
      count++

      $('.btn-remove-tgl').click(function(){
          var id = $(this).attr('data-id')
          $('#form' + id).remove()
      })
    })

    $('.btn-remove-tgl').click(function(){
      var id = $(this).attr('data-id')
      $('#form' + id).remove()
    })
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
</body>

</html>