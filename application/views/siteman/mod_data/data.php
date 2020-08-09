<div class="row">
  <div class="col-md-12">
    <h2><?=$title;?></h2>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Semua Data
        <a href="<?=base_url().'siteman/cetak_riwayat'?>" class="btn btn-primary btn-sm pull-right">Riwayat Kerusakan Alat Tahunan</a></div>
      <div class="panel-body">
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
            <thead>
              <tr>
                <th>No.</th>
                <th>Alat</th>
                <th>Status</th>
                <th>Masalah</th>
                <th>Anls Kerusakan</th>
                <th>Tindak Lanjut</th>
                <th>Service Report</th>
                <th><i class="fa fa-list"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              <?php   
              //looping array
                foreach ($inventaris as $row) {
              ?>  
                  <tr <?php if ($row['status']=='Pending') {?>
                    style="background-color:#f9c7c7;"
                    <?php } ?>>
                    <td><?php   echo $i; ?></td>
                    <td>
                      <table>
                        <tr><th style="width: 70px">Kode </th><td>:</td><td>&nbsp;<a href="<?=base_url().'siteman/riwayat_data/'.$row['id']?>"><?php   echo $row["kode"]; ?></a> </td></tr>
                        <tr><th style="width: 70px">Nama </th><td>:</td><td> <?php   echo $row["nama_alat"]; ?></td></tr>
                        <tr><th style="width: 70px">S/N </th><td>:</td><td> <?php   echo $row["sn"]; ?></td></tr>
                        <tr><th style="width: 70px">Merk </th><td>:</td><td> <?php   echo $row["merk"]; ?></td></tr>
                        <tr><th style="width: 70px">Model </th><td>:</td><td> <?php   echo $row["model_tipe"]; ?></td></tr>
                        <tr><th style="width: 70px">Lokasi </th><td>:</td><td> <?php   echo $row["lokasi"]; ?></td></tr>
                        <tr><th style="width: 70px">Jenis </th><td>:</td><td> <?php   echo $row["jenis_pm"];?></td></tr>
                        <tr><th style="width: 70px">Jwl.Pem </th><td>:</td><td> <?php   echo $this->mylibrary->tgl_indo($row["jadwal_pm"]);?></td></tr>
                        <tr><th style="width: 70px">Tgl.Pel </th><td>:</td><td> <?php   echo $this->mylibrary->tgl_indo($row["tgl_pm"]);?></td></tr>
                    </table>
                    </td>
                    <td><?php   echo $row["status"]; ?></td>
                    <td><?php   echo $row["analisis"]; ?></td>
                    <td><?php   echo $row["masalah"]; ?></td>
                    <td><?php   echo $row["tindakan"]; ?></td>
                    <td><a href="<?=base_url().'siteman/detil_data/'.$row['id']?>">view report</a></td>
                    <td style="text-align: center">
                      <a href="<?=base_url().'siteman/ubah_data/'.$row['id']?>">
                        <i class="fa fa-cog"></i>
                      </a>
                      <a href="<?=base_url().'siteman/hapus_data/'.$row['id']?>"
                      onclick="return confirm('apakah anda yakin akan menghapus data ini?')";>
                        <i class="fa fa-trash-o" style="color: red;"></i>
                      </a>
                    </td>
                  </tr>
            <?php $i++; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>