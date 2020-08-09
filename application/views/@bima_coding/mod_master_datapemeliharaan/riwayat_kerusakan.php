<!DOCTYPE html>
 <html>
 <head>
  <title>RIWAYAT KERUSAKAN</title>
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
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">RIWAYAT KERUSAKAN ALAT</h1>
            <div style="width: 800px; margin: 0px auto;">
                <canvas id="myChart"></canvas>
            </div>
            <a id="printPageButton" href="javascript:void(0)" onclick="window.print()">cetak</a><br><br>
            <table class="table table-bordered" border="1" cellpadding="5" cellspacing="0">
            <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Kode Inventaris</th>
                        <th>Nama Alat</th>
                        <th>S/N</th>
                        <th>Merk</th>
                        <th>Model/Tipe</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Jadwal Pemeliharaan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Status</th>
                        <th>Masalah</th>
                        <th>Analis Kerusakan</th>
                        <th>Tindak Lanjut</th>
                        <th>Keterangan</th>
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
                            <td><?=$row['tgl_perencanaan']?></td>
                            <td><?=$row['tgl_mulai']?></td>
                            <td><?=$row['status']?></td>
                            <td><?=$row['masalah']?></td>
                            <td><?=$row['analisis_kerusakan']?></td>
                            <td><?=$row['tindak_lanjut']?></td>
                            <td><?=$row['ket']?></td>
                        </tr>
                    <?php
                        $no++;    # code...
                        }
                     ?>
                </tbody>
            </table>
  </div>
  </div>
  <?php
    $labels = NULL;
    $counts = NULL;
    foreach ($record_grafik as $row_grafik) {
        $labels = $labels.' " '.$row_grafik['noinv'].'",';
        $data_count = $this->db->query("SELECT * FROM t_datapemeliharaan bb 
                        LEFT JOIN t_inv a ON bb.id_inv = a.id_inv
                        LEFT JOIN t_jenis ff ON bb.id_jenis = ff.id_jenis
                        LEFT JOIN t_alat b ON a.`id_alat`= b.`id_alat`
                        LEFT JOIN t_merk aa ON b.`id_merk` = aa.id_merk
                        LEFT JOIN t_distributor c ON a.`id_distributor` = c.id_distributor
                        LEFT JOIN t_lokasi d ON a.id_lokasi = d.id_lokasi
                        LEFT JOIN t_kondisi e ON a.id_kondisi = e.id_kondisi WHERE a.noinv = '".$row_grafik['noinv']."'
                        ORDER BY bb.id_pemeliharaan DESC")->result_array();
        $count = count($data_count);
        $counts = $counts.' " '.$count.'",';
    }
  ?>
  <script type="text/javascript" src="<?= base_url().'assets/custom/chartjs.js' ?>"></script>
  <script>
    var ctx=document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx,{
      type:'bar',
      data:{
        labels:[<?= $labels ?>],
        datasets:[{
          label:'',
          data:[
            <?= $counts ?>
          ],
          backgroundColor:[
          'rgba(255, 99, 132,0.2)',
          'rgba(54, 162, 235,0.2)',
          'rgba(255, 206, 86,0.2)',
          'rgba(75, 192, 192,0.2)',
          'rgba(245, 89, 122,0.2)',
          'rgba(44, 152, 225,0.2)',
          'rgba(245, 196, 76,0.2)',
          'rgba(65, 182, 182,0.2)',
          'rgba(245, 176, 76,0.2)',
          'rgba(65, 152, 182,0.2)'
          ],
          borderColor:[
          'rgba(255, 99, 132,1)',
          'rgba(54, 162, 235,1)',
          'rgba(255, 206, 86,1)',
          'rgba(75, 192, 192,1)',
          'rgba(245, 89, 122,1)',
          'rgba(44, 152, 225,1)',
          'rgba(245, 196, 76,1)',
          'rgba(65, 182, 182,1)',
          'rgba(245, 176, 76,1)',
          'rgba(65, 162, 182,1)'
          ],
          borderWidth:1
        }]
      },
      options:{
        scales :{
          yAxes:[{
              ticks:{
                beginAtZero:true
              }     
          }]
        }
      }
    });
</script>

 </body> 
 </html>
