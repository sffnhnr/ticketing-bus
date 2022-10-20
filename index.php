

<?php

	$berkas = "data/data.json";
	$dataJson = file_get_contents($berkas);
	$rutePenerbanganAll = json_decode($dataJson, true);

	//Array 
	$asalPenerbangan = array ("Eksekutif", "Class", "Ekonomi");
	$pajakAsalPenerbangan = array ("Eksekutif"=>120000, "Class"=>90000, "Eksekutif"=>50000,);

	// if(isset($_POST['kelas_penumpang'])){
	// $pajakAsalPenerbangan = array ("Eksekutif"=>120000, "Class"=>90000, "Eksekutif"=>50000,);
	// }									 

		if(isset($_POST['bayar'])){ //hitung total bayar
			$jum_penumpang1 = $_POST['jum_penumpang'];
			$jum_lansia1= $_POST['jum_lansia'];
			$tampilharga = $_POST['tampilharga'];
			$total_penumpang1 = ($jum_penumpang1 * $tampilharga);
			$total_lansia1 = ($jum_lansia1 * $tampilharga);
			$diskon_lansia1 = $total_lansia1 * 90/100;
			
			$totalbayar =  ($total_penumpang1 + $diskon_lansia1);
 
		}

		if(isset($_POST['pesantiket'])){ //pesan tiket
			$jum_penumpang = $_POST['jum_penumpang'];
			$jum_lansia = $_POST['jum_lansia'];
			$tampilharga = $_POST['tampilharga'];
			$total_penumpang = $jum_penumpang * $tampilharga;
			$total_lansia = ($jum_lansia * $tampilharga);
			$diskon_lansia = $total_lansia * 90/100;
			
			$totalpesan =  ($total_penumpang + $diskon_lansia);
 
		}

		if(isset($_POST['tampiltotal'])){ //pesan tiket
			$jum_penumpang = $_POST['jum_penumpang'];
			$jum_lansia = $_POST['jum_lansia'];
			$tampilharga = $_POST['tampilharga'];
			$total_penumpang = $jum_penumpang * $tampilharga;
			$total_lansia = ($jum_lansia * $tampilharga);
			$diskon_lansia = $total_lansia * 90/100;
			
			$totalpesan =  ($total_penumpang + $diskon_lansia);
 
		}



		


?>


<!DOCTYPE html>
<html>
<head>
	<title>Terminal SAFARI</title>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<main>
	
	<header>
		<h1 class="judul">Terminal SAFARI</h1>
		<nav>
			<a href="#kelas">Kelas</a>
			<a href="#daftar">Harga</a>	
			<a href="#form">Form</a> 
			
	</nav>
	</header>
	<img src="img/bus.jpg">
	<section>
		<h1 id="kelas">Kelas & Interior Bus</h1>
				<div class="wrapper">
				<div class="product1">
					<h2>Bus Eksekutif</h2>
					<img src="img/eksekutif.jpg">
					<img src="img/eksekutif1.jpg">
					<br><br>
					<a href="https://www.whatsapp.com">PESAN</a>
				</div>

				<div class="product2">
					<h2>Bus Reguler</h2>
					<img src="img/reguler.jpg">
					<img src="img/reguler1.jpg">
					<br><br>
					<a href="https://www.whatsapp.com">PESAN</a>
				</div>

				<div class="product3">
					<h2>Bus Ekonomi</h2>
					<img src="img/ekonom.jpg">
					<img src="img/ekonomi1.jpg">
					<br><br>
					<a href="https://www.whatsapp.com">PESAN</a>
				</div>

				
				</div>
			</section>

			<!-- Menampilkan Daftar Bus Beserta Rute Keberangkatannya -->
			<h1 id="daftar">Daftar Harga Bus </h1>
			<table border="1px" width="800px">
				<thead>
					<tr>
						<th>Nama Bus</th>
						<th>Kelas Bus</th>
						<th>Asal Keberangkatan</th>
						<th>Tujuan Keberangkatan</th>
						<th>Harga Tiket</th>
					</tr>
				</thead>
				<tbody>
					<!-- Perulangan untuk menampilkan isi Array Daftar Maskapai beserta Rute Penerbangan -->
					<?php
						for($i=0; $i<count($rutePenerbanganAll); $i++){
							echo "<tr>";
							echo "<td>".$rutePenerbanganAll[$i][0]."</td>";
							echo "<td style='text-align: center;'>".$rutePenerbanganAll[$i][1]."</td>";
							echo "<td style='text-align: center;'>".$rutePenerbanganAll[$i][2]."</td>";
							echo "<td style='text-align: center;'>".$rutePenerbanganAll[$i][3]."</td>";
							echo "<td style='text-align: center;'>".$rutePenerbanganAll[$i][4]."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>

	<h1 id="form"> Pendaftaran Rute Keberangkatan</h1>

	<!-- Form Pendaftaran Rute Keberangkatan -->
	<form action="" method="post">
		<table width="700px">
			<tr>
				<td width="20%"><label>Nama Lengkap</label></td>
				<td>:</td>
				<td width="80%"><input type="text" name="nama" class="inputtext" placeholder="Nama Lengkap" required=""></td> <!-- Input nama  -->
			</tr>
			<tr>
				<td width="20%"><label>Nomor Identitas</label></td>
				<td>:</td>
				<td width="80%"><input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"type = "number" maxlength="16" minlength="16" name="no_identitas" class="inputtext" placeholder="Nomor Identitas" required=""></td> <!-- Input nomor identitas  -->
			</tr>
			<tr>
				<td width="20%"><label>No. Hp</label></td>
				<td>:</td>
				<td width="80%"><input type="number" name="no_hp" class="inputtext" placeholder="Masukkan Nomor" required=""></td> <!-- Input no hp -->
			</tr>
			<tr>
				<td><label>Kelas Penumpang</label></td>
				<td>:</td>
				<td>
					
					<select name="kelas_penumpang"> 																					
						<?php
							foreach ($asalPenerbangan as $ap) {
								echo "<option value='".$ap."'>".$ap."</option>"; 
							} //menampilkan option
						?> 
					</select>
				</td>
			</tr>
			<tr>
				<td width="20%"><label>Jadwal Keberangkatan</label></td>
				<td>:</td>
				<td width="80%"><script>
					function DDMMYYYY(value, event) {
					  let newValue = value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');

					  const dayOrMonth = (index) => index % 2 === 1 && index < 4;

					  // on delete key.  
					  if (!event.data) {
					    return value;
					  }

					  return newValue.split('').map((v, i) => dayOrMonth(i) ? v + '/' : v).join('');;
					}

				</script><input  type="datetime-local" data-date=""  maxlength="10"  
   					 name="jadwal" required=""></td> <!-- Input jadwal keberangkatan -->
			</tr>
			<tr>

				<td width="20%">
					<label>Jumlah Penumpang</label>
					<p>Bukan Lansia (usia< 60)</p></td>
				<td>:</td>
				<td width="80%"><input type="number" name="jum_penumpang" class="inputtext" placeholder="" required=""></td> <!-- Input jumlah penumpang -->
			</tr>
			<tr>
				<td width="20%"><label>Jumlah Penumpang Lansia</label><p>Usia 60 Tahun ke atas</p></td>
				<td>:</td>
				<td width="80%"><input type="number" name="jum_lansia" class="inputtext" placeholder="" required=""></td> <!-- Input jumlah lansia -->
			</tr>
			<tr>
				<td width="20%"><label>Harga Tiket</label></td>
				<td></td>
				<td width="80%"><label for="price"><input type="text" name="tampilharga" style="border: none"; background-color:transparent; ><?php error_reporting(0); ?></label></td> <!-- Input harga tiket -->
			</tr>
			<tr>
				<td width="20%"><label>Total Bayar</label></td> 
				<td></td>
				<td width="80%"><label><input type="text" name="tampiltotal"  style="border: none"; background-color:transparent; ><?php error_reporting(0); echo "$totalbayar";?></label></td> <!-- Input total bayar -->
			</tr>

			<tr>
				<td width="20%"></td>
				<td><input type="checkbox" name=""></td>
				<td width="80%"><p>Saya dan/atau rombongan telah membaca, memahami dan setuju berdasarkan syarat dan kententuan yang telah ditetapkan</p></td> <!-- keterangan-->
			</tr>

			<tr>
				<td width="20%"><input class="btn btn-primary" type="submit" name="pesantiket" value="Pesan Tiket"></td> <!-- input button -->

				<td><input class="btn btn-primary"  type="submit" name="bayar" value="Hitung Total Bayar"></td>
				
				<td width="80%"><input class="btn btn-primary" type="submit" value="Cancel"></td>
			</tr>
		</table>

	</form> <br> <br> <br>

	<h1 id="struk">Struk Pembayaran</h1>
	
		<form action="" method="post">
			<table width="700px">
				<tr>
					<td width="20%"><label>Nama Lengkap</label></td>
					<td>:</td>
					<td width="80%"><?php error_reporting(0); echo $_POST['nama'];?></td> <!-- output nama Lengkap -->
				</tr>
				<tr>
					<td width="20%"><label>Nomor Identitas</label></td>
					<td>:</td>
					<td width="80%"><?php echo $_POST['no_identitas'];?></td> <!-- output No.Identitas -->
				</tr>
				<tr>
					<td width="20%"><label>No. Hp</label></td>
					<td>:</td>
					<td width="80%"><?php echo $_POST['no_hp'];?></td> <!-- output No. Hp -->
				</tr>
				<tr>
					<td><label>Kelas Penumpang</label></td> //
					<td>:</td>
					<td width="80%"><?php echo $_POST['kelas_penumpang'];?></td>
				</tr>
				<tr>
					<td width="20%"><label>Jadwal Keberangkatan</label></td>
					<td>:</td>
					<td width="80%"><?php echo $_POST['jadwal'];?></td> <!-- output jadwal Bus -->
				</tr>
				<tr>
					<td width="20%"><label>Jumlah Penumpang</label><p>Bukan Lansia (usia< 60)</p></td>
					<td>:</td>
					<td width="80%"><?php echo $_POST['jum_penumpang'];?></td> <!-- output nama bus -->
				</tr>
				<tr>
					<td width="20%"><label>Jumlah Penumpang Lansia</label><p>Usia 60 Tahun ke atas</p></td>
					<td>:</td>
					<td width="80%"><?php echo $_POST['jum_lansia'];?></td> <!-- output jumlah penumpang bus -->
				</tr>
				<tr>
					<td width="20%"><label>Harga Tiket</label></td>
					<td>:</td>
					<td width="80%"><label><?php echo $_POST['tampilharga'];?> </label></td> 
				</tr>
				<tr>
					<td width="20%"><label>Total Bayar</label></td>
					<td>:</td>
					<td width="80%"><label>Rp</label><?php $_POST['tampiltotal'];echo "$totalbayar";?></td> <!-- output total bayar -->
				</tr>
						</table>	
							
		</form> 

		<?php
		include "projek/koneksii.php"; //menghubungkan kedatabase

		if(isset($_POST['pesantiket'])){
			mysqli_query($conn,"insert into tabel set
				nama_lengkap = '$_POST[nama]',
				no_identitas = '$_POST[no_identitas]', //nama kolom, nama variabel
				no_hp = '$_POST[no_hp]',
				kelas_penumpang = '$_POST[kelas_penumpang]',
				jadwal_keberangkatan = '$_POST[jadwal]',
				jum_penumpang = '$_POST[jum_penumpang]',
				jum_lansia = '$_POST[jum_lansia]', 
				total_harga = $total");

			echo "Data Pesanan baru telah tersimpan.";
		}

		?>  

		

	<!-- Menampung seluruh hasil inputan User -->
</main>

	
</body>
</html>
