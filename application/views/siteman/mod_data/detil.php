<!DOCTYPE html>
<html>
<head>	
	<title>LEMBAR KERJA PEMELIHARAAN</title>
</head>
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
<h1 style="color: #044366; font-style: bold; font-family: sans-serif; font-size: 50px;">LEMBAR KERJA PEMELIHARAAN</h1>
    <table border="0" cellpadding="5" cellspacing="0" align="left" >
      <tr>
        <th align="left">
          <label for="kode"> Kode Inventaris </label>
        </th>
        <th align="left">
          : <?php echo $alt['kode']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="lokasi"> Lokasi Alat </label>
        </th>
        <th align="left">
          : <?php echo $alt['lokasi']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="nama_alat"> Nama Alat </label>
        </th>
        <th align="left">
          : <?php echo $alt['nama_alat']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="jenis_pm"> Jenis Pemeliharaan </label>
        </th>
        <th align="left">
          : <?php echo $alt['jenis_pm']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="sn"> S/N</label>
        </th>
        <th align="left">
          : <?php echo $alt['sn']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="jadwal_pm"> Jadwal Pemeliharaan </label>
        </th>
        <th align="left">
          : <?php echo $alt['jadwal_pm']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="merk"> Merk  </label>
        </th>
        <th align="left">
          : <?php echo $alt['merk']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="tgl_pm"> Tanggal Pelaksanaan </label>
        </th>
        <th align="left">
          : <?php echo $alt['tgl_pm']; ?>
        </th>
      </tr>
      <tr>
        <th align="left">
          <label for="model_tipe"> Model/ Tipe </label>
        </th>
        <th align="left">
          : <?php echo $alt['model_tipe']; ?>
        </th>
        <th></th><th></th><th></th><th></th>
        <th align="left">
          <label for="status" name="status" id="status">Status</label>
        </th>
        <th align="left">
          : <?php echo $alt['status']; ?>
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
            <?php echo $alt['masalah']; ?>
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
            <?php echo $alt['analisis']; ?>
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
            <?php echo $alt['tindakan']; ?>
            </textarea> 
        </th>
      </tr>
      <br><br>
      <tr>
      <th align="right">
        <p>Jakarta, <?php date_default_timezone_set("Asia/Jakarta"); echo date("d F Y", strtotime($alt['tgl_pm'])); ?></p>
      </th>
      </tr>
      <br><br><br>
      <tr>
      <th align="right">
        <p>Teknisi Elektromedis</p>
        <p>IPSRS RSUD Cengkareng</p>
      </th>
      </tr>
    </table>

</body>
</html>