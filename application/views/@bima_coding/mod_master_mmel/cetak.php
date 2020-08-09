 <!DOCTYPE html>
 <html>
 <head>
  <title>DATA MMEL</title>
  <style>
    @media print {
        #printPageButton {
        display: none;
        }
    }
  </style>
</head>
<body>

    <table align="right" cellpadding="5" cellspacing="5" ="">
      <th align="center">
        <img src="<?= base_url().'assets/img/lg2.png' ?>" width="75" height="75">
      </th>
    </table>
    <h2 align="left"> Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)</h2>    
    <h4>Sistem Inventaris dan Pemeliharaan Alat Elektromedik Rumah Sakit X</h4>
    <h5 align="left">
    <br>
    </h5>
<hr size="12px" style="background-color: #044366;">
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">DAFTAR MMEL</h1>
<a id="printPageButton" href="javascript:void(0)" onclick="window.print()">cetak</a><br><br>
            <table class="table table-bordered" border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Operasional</th>
                        <th>Lokasi</th>
                        <th>Kode Inv</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Distributor</th>
                        <th>Pembelian</th>
                        <th>Usia Teknis</th>
                        <th>Usia Pakai</th>
                        <th>Sisa Usia Manfaat</th>
                        <th>Presentase Manfaat</th>
                        <th>MEL Factor</th>
                        <th>Harga Pengganti</th>
                        <th>MMEL</th>
                        <th>Biaya Pemeliharaan</th>
                        <th>Ket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                            $usia_pakai = (date('Y') - $row['thn_operasional']);
                            $sisa_usia_manfaat = $row['usia_teknis'] - $usia_pakai;
                            $presentase_usia_manfaat = $sisa_usia_manfaat / ($row['usia_teknis']);
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><?= $row['thn_operasional'] ?></td>
                            <td><?= $row['nama_lokasi'] ?></td>
                            <td><?= $row['noinv'] ?></td>
                            <td><?= $row['nama_alat'] ?></td>
                            <td><?= $row['nama_merk'] ?></td>
                            <td><?= $row['model_tipe'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><u>Rp.<?= number_format($row['harga']) ?></u><br>tahun <?= $row['thn_pengadaan'] ?></td>
                            <td><?= $row['usia_teknis'] ?></td>
                            <td><?= $usia_pakai ?></td>
                            <td><?= $sisa_usia_manfaat ?></td>
                            <td> <?= $presentase_usia_manfaat ?> </td>
                            <td>0.9</td>
                            <td>Rp.<?= number_format($row['harga_pengganti']) ?></td>
                            <td>Rp.<?= number_format( (0.9 * $presentase_usia_manfaat * $row['harga_pengganti'])) ?></td>
                            <td><?= number_format($row['biaya_pemeliharaan']) ?></td>
                            <td><?= $row['keterangan'] ?></td>
                        </tr>
                    <?php
                        $no++;    # code...
                        }
                     ?>
                </tbody>
            </table>
</div>
  </div>
 </body> 
 </html>
