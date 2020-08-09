 <!DOCTYPE html>
 <html>
 <head>
  <title>DATA INVENTARIS</title>
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
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">DAFTAR INVENTARIS ALAT TAHUN <?php echo date('Y'); ?></h1>
            <a id="printPageButton" href="javascript:void(0)" onclick="window.print()">cetak</a><br><br>
            <table class="table table-bordered" border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th style="width: 100px;">Kode inventaris</th>
                        <th style="width: 100px;">Serial Number</th>
                        <th style="width: 100px;">Nama Alat</th>
                        <th style="width: 100px;">Merk</th>
                        <th style="width: 100px;">Model / Tipe</th>
                        <th style="width: 100px;">Tahun Pengadaan</th>
                        <th style="width: 100px;">Tahun Operasional</th>
                        <th style="width: 100px;">Distributor</th>
                        <th style="width: 100px;">Lokasi</th>
                        <th style="width: 100px;">Kondisi</th>
                        <th style="width: 100px;">Usia Teknis</th>
                        <th style="width: 100px;">Harga Beli</th>
                        <th style="width: 100px;">Penyusutan</th>
                        <th style="width: 100px;">Nilai Akumulasi</th>
                        <th style="width: 100px;">Nilai Buku</th>
                        <th style="width: 100px;">Sts. Kalibrasi</th>
                        <th style="width: 100px;">Operating Manual</th>
                        <th style="width: 100px;">Manual Book</th>
                        <th>QR Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td style="width: 100px;"><?=$row['noinv']?></td>
                            <td style="width: 100px;"><?=$row['sn_alat']?></td>
                            <td style="width: 100px;"><?=$row['nama_alat']?></td>
                            <td style="width: 100px;"><?=get_merk($row['id_merk']);?></td>
                            <td style="width: 100px;"><?=$row['model_tipe']?></td>
                            <td style="width: 100px;"><?=$row['thn_pengadaan']?></td>
                            <td style="width: 100px;"><?=$row['thn_operasional']?></td>
                            <td style="width: 100px;"><?=$row['nama']?></td>
                            <td style="width: 100px;"><?=$row['nama_lokasi']?></td>
                            <td style="width: 100px;"><?=$row['nama_kondisi']?></td>
                            <td style="width: 100px;"><?=$row['usia_teknis']?></td>
                            <td style="width: 100px;"><?=$row['harga']?></td>
                            <td style="width: 100px;"><?=$row['penyusutan']?></td>
                            <td style="width: 100px;"><?=$row['n_akumulasi']?></td>
                            <td style="width: 100px;"><?=$row['n_buku']?></td>
                            <td style="width: 100px;"><?=$row['sts_kalibrasi']?></td>
                            <td style="width: 100px;"><?=$row['buku_op']?></td>
                            <td style="width: 100px;"><?=$row['buku_manual']?></td>
                            <td style="width: 100px;"><?=$row['qrcode']?></td>
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
