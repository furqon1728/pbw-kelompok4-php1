<!DOCTYPE html>
<html>
	
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">  
    <link rel="manifest" href="/site.webmanifest">

    <title> Pendaftaran Rute Penerbangan </title>
    <!-- Mengambil fonts melalui googlefonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="style.css">

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>



<header>
	<nav class="navbar bg-body-tertiary shadow-lg mb-5">
		<div class="container-fluid">
			<a class="navbar-brand ps-3">
				<img src="img/favicon-32x32.png" alt="logo">
				<strong>Travoluka</strong></a>
		</div>
	</nav>  
</header>

<body>
	
	<div class="container">
	<h1 class="my-5 text-center"> Pendaftaran Rute Penerbangan</h1>
	<!-- Membuat Form dengan mengunakan method POST -->
		<form method="post" action="">
	<!-- Membuat Kolom Input nama_maskapai bertipe text -->
		<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="nama-maskapai" >Nama Maskapai:</label>
				<input type="text" class="form-control" id="nama-maskapai" name="nama-maskapai" required>
			</div>
    <!-- Membuat dropdown bandara asal memakai foreach -->
			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="bandara-asal">Bandara Asal:</label>
				<select class="form-control" id="bandara-asal" name="bandara-asal" required>
					<option value="">Pilih Bandara Asal</option>
					<?php 
					$bandaraAsal = array(
						"Soekarno Hatta",
						"Husein Sastranegara",
						"Abdul Rachman Saleh",
						"Juanda"
					);

					sort($bandaraAsal);

					foreach ($bandaraAsal as $bandara) {
						echo "<option value='" . $bandara . "'>" . $bandara . "</option>";
					}
					?>
				</select>
			</div>
         <!-- Membuat dropdown bandara tujuan  memakai foreach -->
			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="bandara-tujuan">Bandara Tujuan:</label>
				<select class="form-control" id="bandara-tujuan" name="bandara-tujuan" required>
					<option value="">Pilih Bandara Tujuan</option>
					<?php 
					$bandaraTujuan = array(
						"Ngurah Rai",
						"Hasanuddin",
						"Inanwatan",
						"Sultan Iskandar Muda"
					);

					sort($bandaraTujuan);

					foreach ($bandaraTujuan as $bandara) {
						echo "<option value='" . $bandara . "'>" . $bandara . "</option>";
					}
					?>
				</select>
			</div>
         <!-- Membuat Kolom tanggal -->
			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="tanggal-keberangkatan">Tanggal Keberangkatan:</label>
				<input type="date" class="form-control" id="tanggal-keberangkatan" name="tanggal-keberangkatan" required>
			</div>
         <!-- Membuat Kolom Input harga_tiket bertipe number -->
		    <div class="form-group mt-3 mx-auto col-sm-8">
				<label for="harga-tiket">Harga Tiket:</label>
				<input type="number" class="form-control" id="harga-tiket" name="harga-tiket" required>
			</div>
		<!-- Membuat Jumlah Tiket -->
		    <div class="form-group mt-3 mx-auto col-sm-8">
				<label for="jumlah-tiket">Jumlah Tiket:</label>
				<input type="number" class="form-control" id="jumlah-tiket" name="jumlah-tiket" required>
			</div>

		<div class="text-center">
			<button class="btn btn-primary mt-3" type="submit" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
			 aria-expanded="false" aria-controls="collapseWidthExample">
             Lihat Tiket
             </button>
		</div>

		<?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil nilai dari form
            $namaMaskapai = $_POST["nama-maskapai"];
            $bandaraAsal = $_POST["bandara-asal"];
            $bandaraTujuan = $_POST["bandara-tujuan"];
            $tanggalKeberangkatan = $_POST["tanggal-keberangkatan"];
            $hargaTiket = $_POST["harga-tiket"];
            $jumlahTiket = $_POST["jumlah-tiket"];


            // Menghitung pajak bandara asal
            switch ($bandaraAsal) {
              case "Soekarno Hatta":
                $pajakBandaraAsal = 65000;
                break;
              case "Husein Sastranegara":
                $pajakBandaraAsal = 50000;
                break;
              case "Abdul Rachman Saleh":
                $pajakBandaraAsal = 40000;
                break;
              case "Juanda":
                $pajakBandaraAsal = 30000;
                break;
            }

            // Menghitung pajak bandara tujuan
            switch ($bandaraTujuan) {
              case "Ngurah Rai":
                $pajakBandaraTujuan = 85000;
                break;
              case "Hasanuddin":
                $pajakBandaraTujuan = 70000;
                break;
              case "Inanwatan":
                $pajakBandaraTujuan = 90000;
                break;
              case "Sultan Iskandar Muda":
                $pajakBandaraTujuan = 60000;
                break;
            }

            // Menghitung total pajak
            $totalPajak = ($pajakBandaraAsal + $pajakBandaraTujuan)*$jumlahTiket;

            // Menghitung total harga tiket
            $totalHargaTiket = ($hargaTiket * $jumlahTiket) + $totalPajak;
		  }
       ?>
	   <!-- Collapse -->
               <div style="min-height: 120px;">
			     <div class="collapse collapse-horizontal" id="collapseWidthExample">
				   <div class="card card-body mt-3  border border-primary mx-auto" style="width: 400px;">
				         <h3 class="text-center mb-4">Tiket</h3>
				         <table>
							<!-- menampilkan output tanggal dan nilainya berisi tanggal ketika data penerbangan diinput -->
							<tr>
								<td>Tanggal Keberangkatan</td>
								<td>:</td>
								<td><?php echo $tanggalKeberangkatan; ?></td>
							</tr>
							<!-- menampilkan output nama maskapai dan nilainya saat data di input-->
							<tr>
								<td>Nama Maskapai</td>
								<td>:</td>
								<td><?php echo $namaMaskapai; ?></td>
							</tr>
							  <!-- menampilkan output asal penerbangan dan nilainya saat data diinput -->
                            <tr>
								<td>Asal Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraAsal; ?></td>
							</tr>
							<!-- menampilkan output tujuan penerbangan dan nilainya saat data diinput -->
							<tr>
								<td>Tujuan Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraTujuan; ?></td>
							</tr>
							<!-- menampilkan output harga tiket dan nilainya saat data diinput -->
							<tr>
								<td>Harga Tiket</td>
								<td>:</td>
								<td> Rp. <?php echo $hargaTiket; ?></td>
							</tr>
							<!-- menampilkan output jumlah tiket -->
							<tr>
								<td>Jumlah Tiket</td>
								<td>:</td>
								<td> <?php echo $jumlahTiket; ?> tiket</td>
							</tr>
							<!-- menampilkan output pajak dan nilainya saat data diinput -->
							<tr>
								<td>Pajak</td>
								<td>: </td>
								<td> Rp. <?php echo $totalPajak; ?></td>
							</tr>
							<!-- menampilkan output total harga tiket  dan nilainya saat data diinput -->
							<tr>
								<td>Total Harga Tiket</td>
								<td>: </td>
								<td> Rp.<?php echo $totalHargaTiket; ?></td>
							</tr>
						</table>
					</div>
		    </div> 
		</div>
		</form>
	</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
 integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" 
integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

