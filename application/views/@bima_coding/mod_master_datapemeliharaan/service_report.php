<!DOCTYPE html>
<html>
<head>	
	<title>LEMBAR KERJA PEMELIHARAAN</title>
	<link rel="icon" type="image/png" href="..\main\lg.png">
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
  <!-- <p>Jl. Bumi Cengkkareng Indah No.1 RT.13/RW.10 Cengkareng Timur, Kota Jakarta Barat</p> -->
    </h5>
<hr size="12px" style="background-color: #044366;">
<h5 align="right">
    </h5>
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">LEMBAR KERJA PEMELIHARAAN</h1>
<a id="printPageButton" href="javascript:void(0)" onclick="window.print()">cetak</a><br><br>
    <table border="0" cellpadding="5" cellspacing="0" align="left" >
      <tr>
        <th align="left">
          <label for="kode"> Kode Inventaris </label>
        </th>
        <th align="left">
          : <?php echo $row['noinv'] ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="lokasi"> Lokasi Alat </label>
        </th>
        <th align="left">
          : <?php echo $row['nama_lokasi']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="nama_alat"> Nama Alat </label>
        </th>
        <th align="left">
          : <?php echo $row['nama_alat']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="jenis_pm"> Jenis Pemeliharaan </label>
        </th>
        <th align="left">
          : <?php echo $row['inisial']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="sn"> S/N</label>
        </th>
        <th align="left">
          : <?php echo $row['sn_alat']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="jadwal_pm"> Jadwal Pemeliharaan </label>
        </th>
        <th align="left">
          : <?php echo $row['tgl_perencanaan']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="merk"> Merk  </label>
        </th>
        <th align="left">
          : <?php echo $row['nama_merk']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="tgl_pm"> Tanggal Pelaksanaan </label>
        </th>
        <th align="left">
          : <?php echo $row['tgl_mulai']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="model_tipe"> Model/ Tipe </label>
        </th>
        <th align="left">
          : <?php echo $row['model_tipe']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">   
          <label for="status" name="status" id="status">Status</label>
        </th>
        <th align="left">
          : <?php echo $row['status']; ?>
        </th>
      </tr>
    </table>
<br><br><br><br><br>
    <table border="0" cellpadding="5" cellspacing="0" align="left" >
      <tr>
        <th align="left">
          <label for="masalah" name="masalah" id="masalah">Masalah</label>
        </th>
      </tr>
      <tr>
        <th colspan="3">
          <textarea style="resize: none; width: 600px; height: 100px; font-size: 15px; font-family: serif; text-align: left;" readonly="readonly" >
            <?php echo $row['masalah']; ?>
            </textarea> 
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="analisis" name="analisis" id="analisis" >Analisis</label>
        </th>
      </tr>
      <tr>
        <th colspan="3">
          <textarea style="resize: none; width: 600px; height: 100px; font-size: 15px; font-family: serif; text-align: left;" readonly="readonly" >
            <?php echo $row['analisis_kerusakan']; ?>
            </textarea> 
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="tindakan" name="tindakan" id="tindakan">Tindak Lanjut</label>
        </th>
      </tr>
      <tr>
        <th colspan="3">
          <textarea style="resize: none; width: 600px; height: 100px; font-size: 15px; font-family: serif; text-align: left;" readonly="readonly">
            <?php echo $row['tindak_lanjut']; ?>
            </textarea> 
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="keterangan" name="keterangan" id="keterangan">Keterangan</label>
        </th>
      </tr>
      <tr>
        <th colspan="3">
          <textarea style="resize: none; width: 600px; height: 100px; font-size: 15px; font-family: serif; text-align: left;" readonly="readonly">
            <?php echo $row['ket']; ?>
            </textarea> 
        </th>
      </tr>
      <br><br>
      <tr>
      <th align="right">
        <p>Jakarta, <?php date_default_timezone_set("Asia/Jakarta"); echo date("d F Y", strtotime($row['tgl_perencanaan'])); ?></p>
      </th>
      </tr>
      <br><br><br>
      <tr>
      <th align="right">
        <p>Teknisi Elektromedis</p>
        <p>IPSRS Rumah Sakit X</p>
      </th>
      </tr>
    </table>

</body>
</html>