<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mecon <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>


<script src="<?php echo base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/menu.js"></script>
<script src="<?php echo base_url() ?>assets/js/main.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script type="text/javascript">
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pegawai Tetap", "Pegawai Tidak Tetap"],
            datasets: [{
                data: [<?php echo $this->db->query("select status from data_pegawai where status='Pegawai Tetap'")->num_rows(); ?>,
                    <?php echo $this->db->query("select status from data_pegawai where status='Pegawai Tidak Tetap'")->num_rows(); ?>,
                ],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#dddfeb'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dddfeb'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<script type="text/javascript">
    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laki - Laki", "Perempuan"],
            datasets: [{
                label: "Berdasarkan Jenis Kelamin",
                backgroundColor: ['orange', 'green'], // Warna untuk Laki-laki dan Perempuan
                borderColor: ['orange', 'green'],
                hoverBackgroundColor: ['lightcoral', 'darkorange', 'lightgreen'], // Warna hover untuk "Berdasarkan Jenis Kelamin", Laki-laki, dan Perempuan
                hoverBorderColor: ['black', 'black', 'black'],
                data: [
                    <?php echo $this->db->query("select jenis_kelamin from data_pegawai where jenis_kelamin='Laki-laki'")->num_rows(); ?>,
                    <?php echo $this->db->query("select jenis_kelamin from data_pegawai where jenis_kelamin='Perempuan'")->num_rows(); ?>,
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },

        }
    });
</script>

</body>

</html>

</body>

</html>