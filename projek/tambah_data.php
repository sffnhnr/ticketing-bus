<h3> Riwayat Pemesanan </h3>


<table border="1">
    <tr>
        <th>No.</th>
        <th>Nama Lengkap</th>
        <th>No.Identitas</th>
        <th>No.Hp</th>
        <th>Kelas Penumpang</th>
        <th>Jadwal Keberangkatan</th>
        <th>Jumlah Penumpang</th>
        <th>Jumlah Lansia</th>
        <th>Total Harga</th>
    </tr>

    <?php
    include "koneksii.php";
    $no=1; //no dimulai dari 1
    $ambildata = mysqli_query($conn,"select * from tabel");
    while ($tampil = mysqli_fetch_array($ambildata)){

        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama_lengkap]</td>
            <td>$tampil[no_identitas]</td>
            <td>$tampil[no_hp]</td>
            <td>$tampil[kelas_penumpang]</td>
            <td>$tampil[jadwal_keberangkatan]</td>
            <td>$tampil[jum_penumpang]</td>
            <td>$tampil[jum_lansia]</td>
            <td>$tampil[total_harga]</td>
        </tr>";

        $no++;
    }
    ?>

</table>