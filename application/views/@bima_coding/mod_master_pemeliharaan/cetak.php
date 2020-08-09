 <!DOCTYPE html>
 <html>
 <head>
  <title>DATA PEMELIHARAAN</title>
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
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">DAFTAR PEMELIHARAAN ALAT</h1>
<a id="printPageButton" href="javascript:void(0)" onclick="window.print()">cetak</a><br><br>

            <table class="table table-bordered" border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Kode Inventaris</th>
                        <th>S/N</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>Model/Tipe</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Jadwal 1</th>
                        <th>Jadwal 2</th>
                        <th>Jadwal 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><?=$row['noinv']?></td>
                            <td><?=$row['sn_alat']?></td>
                            <td><?=$row['nama_alat']?></td>
                            <td><?=$row['nama_merk']?></td>
                            <td><?=$row['model_tipe']?></td>
                            <td><?=$row['nama_lokasi']?></td>
                            <td><?=$row['inisial']?></td>
                            <td><?=$row['tgl_pm']?></td>
                            <td><?=$row['tgl_pm2']?></td>
                            <td><?=$row['tgl_pm3']?></td>
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
