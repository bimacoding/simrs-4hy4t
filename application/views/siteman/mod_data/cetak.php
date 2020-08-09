<?php 
require 'functions.php';
 
 $query = "SELECT * FROM data_pm WHERE jenis_pm='CM'ORDER BY nama_alat ASC ";  
 $result = mysqli_query($conn, $query); 
 $no=1;

 date_default_timezone_set("Asia/Jakarta"); 
 $tahun= date("Y");

 ?>


 <!DOCTYPE html>
 <html>
 <head>
  <title>DATA KERUSAKAN ALAT</title>
  <script type="text/javascript" src="chartjs\Chart.js"></script>
  <link rel="icon" type="image/png" href="..\main\lg.png">
 </head>
 <body>
<body>

    <table align="right" cellpadding="5" cellspacing="5" ="">
      <th>
        <img src="..\main\rs.jpeg" height="75">
      </th>
      <th align="center">
        <img src="..\main\lg.png" width="75" height="75">
      </th>
      <th align="center">
        <img src="..\main\lg2.png" width="75" height="75">
      </th>
    </table>
    <h2 align="left"> Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)</h2>    
    <h4>Sistem Inventaris dan Pemeliharaan Alat Elektromedik Rumah Sakit Umum Daerah (RSUD) Cengkareng</h4>
    <h5 align="left">
    <p>Jl. Bumi Cengkkareng Indah No.1 RT.13/RW.10 Cengkareng Timur, Kota Jakarta Barat</p>
    </h5>
<hr size="12px" style="background-color: #044366;">
<h5 align="right">
<p style="color: #147893; font-family: sans-serif;" >created by Vizia Hasemi Vivaldi © 2019</p>
    </h5>
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">RIWAYAT KERUSAKAN ALAT TAHUN <?php echo $tahun; ?></h1>

  <div style="width: 800px; margin: 0px auto;">
    <canvas id="myChart"></canvas>
  </div>
  
<br><br>
<div style="clear:both"></div>
<div id="jdw"> 
  <table class="table table-bordered" border="1" cellpadding="5" cellspacing="0">
    <tr align="center">
      <th>No.</th>
      <th>Kode Inventaris</th>
      <th>Nama Alat</th>
      <th>S/N</th>
      <th>Merk</th>
      <th>Model/Tipe</th>
      <th>Lokasi Alat</th>
      <th>Jenis</th>
      <th>Jadwal Pemeliharaan</th>
      <th>Tanggal Pelaksanaan</th>
      <th>Status</th>
      <th>Masalah</th>
      <th>Analisis</th>
      <th>Tindak Lanjut</th>
    </tr>
  <?php foreach ($record as $row) { ?> 
      <tr>
        <td><?php   echo $no++; ?></td>
        <td><?php   echo $row["kode"]; ?></td>
        <td><?php   echo $row["nama_alat"]; ?></td>
        <td><?php   echo $row["sn"]; ?></td>        
        <td><?php   echo $row["merk"]; ?></td>
        <td><?php   echo $row["model_tipe"]; ?></td>
        <td><?php echo $row["lokasi"]; ?></td>
        <td><?php echo $row["jenis_pm"]; ?></td>
        <td><?php   echo date("d/F/Y", strtotime($row['jadwal_pm'])); ?></td>
        <td><?php   
        $jadwal= $row['tgl_pm'];
        $cek= explode("-", $jadwal);
        $hasil=$cek[0];
        if ($hasil==$tahun) {
          echo date("d/F/Y", strtotime($row['tgl_pm']));
        }
        ?>
        </td>
        <td><?php   echo $row["status"];; ?></td>
        <td><?php   echo $row["masalah"];; ?></td>
        <td><?php   echo $row["analisis"];; ?></td>
        <td><?php   echo $row["tindakan"];; ?></td>
      </tr>
  <?php } ?>
  </table>
</div>

  <script>
    var ctx=document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx,{
      type:'bar',
      data:{
        labels:["UST", "SWD", "MWD", "TENS", "TRAKSI", "IR", "NEBU", "LASER", "PARAFIN", "STATIC B."],
        datasets:[{
          label:'',
          data:[
          <?php 
          $ust=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Ultrasound Therapy'  AND jenis_pm='CM'");
          echo mysqli_num_rows($ust);
           ?>,
          <?php 
          $swd=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Shortwave Diathermy' AND jenis_pm='CM'");
          echo mysqli_num_rows($swd);
           ?>,
          <?php 
          $mwd=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Microwave Diathermy' AND jenis_pm='CM'");
          echo mysqli_num_rows($mwd);
           ?>,
          <?php 
          $tens=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Electrostimulator' AND jenis_pm='CM'");
          echo mysqli_num_rows($tens);
           ?>,
          <?php 
          $traksi=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Traksi' AND jenis_pm='CM'");
          echo mysqli_num_rows($traksi);
           ?>,
          <?php 
          $ir=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Infrared Therapy' AND jenis_pm='CM'");
          echo mysqli_num_rows($ir);
           ?>,
          <?php 
          $laser=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Laser' AND jenis_pm='CM'");
          echo mysqli_num_rows($laser);
           ?>,
          <?php 
          $nebu=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Nebulizer' AND jenis_pm='CM'");
          echo mysqli_num_rows($nebu);
           ?>,
           <?php 
          $cycle=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Static Bycicle' AND jenis_pm='CM'");
          echo mysqli_num_rows($cycle);
           ?>,
           <?php 
          $pbath=mysqli_query($conn, "SELECT * FROM data_pm WHERE nama_alat='Parafin Bath' AND jenis_pm='CM'");
          echo mysqli_num_rows($pbath);
           ?>
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