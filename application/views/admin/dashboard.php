<div class="container-fluid">
    <!-- Weather Information -->
    <div class="text-right text-gray-500 mb-4" style="position: absolute; top: 20px; right: 20px;">
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div id="currentWeather" >
            <!-- Tempat untuk menampilkan informasi suhu -->
        </div>
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <div class="text-right text-gray-500">
            <p id="currentDateTime"></p>
        </div>
    </div>

    <!-- Image Card -->
    <div class="card mb-2 border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
        <div style="position: relative;">
            <!--<img src="<?php echo base_url('assets/img/backgrounds/bg1.png'); ?>" style="width: 100%; height: auto;">--->
            <div class="text-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0,0,0,0.7), rgba(0,0,0,0.7); color: black; padding: 20px;">
                <?php
                date_default_timezone_set('Asia/Jakarta');

                $waktu_sekarang = date('H:i');

                echo '<marquee behavior="scroll" direction="left">';
                if (strtotime($waktu_sekarang) >= strtotime('06:00') && strtotime($waktu_sekarang) < strtotime('10:00')) {
                    echo '<span style="font-size: 24px;">Selamat Pagi</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('10:00') && strtotime($waktu_sekarang) < strtotime('15:00')) {
                    echo '<span style="font-size: 24px;">Selamat Siang</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('15:00') && strtotime($waktu_sekarang) < strtotime('18:00')) {
                    echo '<span style="font-size: 24px;">Selamat Sore oke</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('18:00') && strtotime($waktu_sekarang) < strtotime('24:00')) {
                    echo '<span style="font-size: 24px;">Selamat Malam</span>';
                }
                echo '</marquee>';
                ?>
            </div>
        </div>
    </div><br>

    <!-- Weather Information -->
    <div id="currentWeather" class="text-right text-gray-500">
        <!-- Tempat untuk menampilkan informasi suhu -->
    </div>

    <!-- Update Date and Time Script -->
    <script>
        function updateDateTime() {
            var currentDate = new Date();
            var formattedDateTime = currentDate.toLocaleString('en-US', {
                weekday: 'long',
                month: 'long',
                day: 'numeric',
                year: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });

            document.getElementById('currentDateTime').innerHTML = formattedDateTime;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>

    <!-- Script untuk mengambil informasi suhu dari OpenWeatherMap -->
    <script>
        function getWeather() {
            var apiKey = 'f2575d0fe9963713757549f6fd01d40f'; // Ganti dengan API key Anda dari OpenWeatherMap
            var city = 'Jakarta Selatan'; // Ganti dengan nama kota yang ingin Anda dapatkan suhunya

            var apiUrl = 'https://api.openweathermap.org/data/2.5/' + city + '&appid=' + apiKey;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    var temperature = data.main.temp;

                    // Tampilkan suhu di elemen dengan id 'currentWeather'
                    document.getElementById('currentWeather').innerHTML = 'Suhu saat ini: ' + temperature + '°C';
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Tambahkan pesan kesalahan ke dalam elemen 'currentWeather'
                    document.getElementById('currentWeather').innerHTML = 'Gagal mengambil informasi suhu';
                });
        }

        // Panggil fungsi getWeather saat halaman dimuat
        window.onload = function() {
            getWeather();
            // Update suhu setiap 10 menit (600000 milidetik)
            setInterval(getWeather, 600000);
        };
    </script>

</div>
<!-- End Page Content -->



<!-- Container for Dashboard Overview -->
<div class="container-responsive" style="border: 1px solid #ccc; box-shadow: 0 0 10px rgba(143,143,143,0.73);  overflow-y: auto;">
    <div class="container mt-4">
        <div class="row justify-content-start">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(45deg, #00274C, #0099FF); color: white;">
                        Dashboard Overview
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="height: auto;"> <!-- Adjust the height to fit your needs -->
                            <table class="table table-striped table-bordered border border-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" style="background-color: #00274C;">Data</th>
                                        <th scope="col" style="background-color: #00274C;">Jumlah</th>
                                        <th scope="col" style="background-color: #00274C;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data Pegawai -->
                                    <tr class="table-primary">
                                        <td>Data Pegawai</td>
                                        <td><?php echo $pegawai ?></td>
                                        <td><a href="<?php echo base_url('admin/dataPegawai') ?>" class="btn btn-primary btn-sm">Detail</a></td>
                                    </tr>

                                    <!-- Data Admin -->
                                    <tr class="table-danger">
                                        <td>Data Admin</td>
                                        <td><?php echo $admin ?></td>
                                        <td><a href="" class="btn btn-danger btn-sm">Detail</a></td>
                                    </tr>

                                    <!-- Data Jabatan -->
                                    <tr class="table-success">
                                        <td>Data Jabatan</td>
                                        <td><?php echo $jabatan ?></td>
                                        <td><a href="#" class="btn btn-success btn-sm">Detail</a></td>
                                    </tr>

                                    <!-- Data Kehadiran -->
                                    <tr class="table-info">
                                        <td>Data Kehadiran</td>
                                        <td><?php echo $kehadiran ?></td>
                                        <td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End Page Content -->