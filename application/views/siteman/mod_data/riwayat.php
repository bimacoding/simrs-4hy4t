<?php 
 $alat=$alt['kode'];
 $alat2=$alt['nama_alat'];

 $inventaris = $this->db->query("SELECT * FROM data_pm WHERE  kode = '$alat' ORDER BY jenis_pm DESC")->result_array();
 $no=1;

 date_default_timezone_set("Asia/Jakarta"); 
 $tahun= date("Y");

 ?>


 <!DOCTYPE html>
 <html>
 <head>
  <title>RIWAYAT PEMELIHARAAN ALAT</title>
  <script type="text/javascript" src="<?=base_url()?>assets/js/Chart.js"></script>
 </head>
 <body>
<body>

    <table align="right" cellpadding="5" cellspacing="5" ="">
      <th>
        <img src="<?=base_url()?>assets/main/rs.jpeg" height="75">
      </th>
      <th align="center">
        <img src="<?=base_url()?>assets/main/lg.png" width="75" height="75">
      </th>
      <th align="center">
        <img src="<?=base_url()?>assets/main/lg2.png" width="75" height="75">
      </th>
    </table>
    <h2 align="left"> Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)</h2>    
    <h4>Sistem Inventaris dan Pemeliharaan Alat Elektromedik Rumah Sakit Umum Daerah (RSUD) Cengkareng</h4>
    <h5 align="left">
    <p>Jl. Bumi Cengkkareng Indah No.1 RT.13/RW.10 Cengkareng Timur, Kota Jakarta Barat</p>
    </h5>
<hr size="12px" style="background-color: #044366;">
<h5 align="right">
    </h5>
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">Riwayat Pemeliharaan Alat Elektromedik Tahun <?php echo $tahun; ?></h1>
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;"><?php echo $alat2; ?> : <?php echo $alat; ?></h1>

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
  <?php  foreach ($inventaris as $row)
        {  ?>  
      <tr <?php if ($row['jenis_pm']=='CM') {?>
        style="background-color:#f9c7c7;"
      <?php } else { ?>
        style="background-color:#d1ebff; "
        <?php } ?>>
        <td><?php   echo $no++; ?></td>
        <td><?php   echo $row["kode"]; ?></td>
        <td><?php   echo $row["nama_alat"]; ?></td>
        <td><?php   echo $row["sn"]; ?></td>        
        <td><?php   echo $row["merk"]; ?></td>
        <td><?php   echo $row["model_tipe"]; ?></td>
        <td><?php echo $row["lokasi"]; ?></td>
        <td><?php echo $row["jenis_pm"]; ?></td>
        <td><?php   echo date("d/F/Y", strtotime($row['jadwal_pm'])); ?></td>
        <td><?php   echo date("d/F/Y", strtotime($row['tgl_pm'])); ?></td>
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
        labels:["PM", "CM"],
        datasets:[{
          label:'',
          data:[
          <?php 
          $pm=$this->db->query("SELECT * FROM data_pm WHERE jenis_pm='PM' AND kode='$alat'");
          echo $pm->num_rows();
          ?>,
          <?php
          $cm=$this->db->query($conn, "SELECT * FROM data_pm WHERE  jenis_pm='CM'  AND kode='$alat'");
          echo $cm->num_rows();
          ?>
          ],
          backgroundColor:[
          'rgba(65, 152, 182,0.2)',
          'rgba(255, 99, 132,0.2)'
          ],
          borderColor:[
          'rgba(65, 162, 182,1)',
          'rgba(255, 99, 132,1)'
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