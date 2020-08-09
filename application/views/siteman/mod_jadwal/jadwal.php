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
        <a href="<?=base_url().'siteman/tambah_jadwal'?>" class="btn btn-primary btn-sm pull-right">Tambah Data</a></div>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dataTable table-responsive">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Inventaris</th>
                <th>S/N</th>
                <th>Nama Alat</th>
                <th>Merk</th>
                <th>Model/Tipe</th>
                <th>Lokasi Alat</th>
                <th>Jenis</th>
                <th>Jadwal 1</th>
                <th>Jadwal 2</th>
                <th>Jadwal 3</th>
                <th><i class="fa fa-list"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($record as $row) { ?>  
                  <tr style="background-color:#f9c7c7;">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["kode"]; ?></td> 
                    <td><?php echo $row["sn"]; ?></td>
                    <td><?php echo $row["nama_alat"]; ?></td>
                    <td><?php echo $row["merk"]; ?></td>
                    <td><?php echo $row["model_tipe"]; ?></td>
                    <td><?php echo $row["lokasi"]; ?></td>
                    <td><?php echo $row["jenis_pm"]; ?></td>
                    <td><?php echo $this->mylibrary->tgl_indo($row['tgl_pm']); ?></td>
                    <td><?php 
                    if ($row['nama_alat']=='Infrared Therapy' OR
                        $row['nama_alat']=='Nebulizer'OR
                        $row['nama_alat']=='Shortwave Diathermy'
                     ) {
                     echo $this->mylibrary->tgl_indo($row['tgl_pm2']);}
                    else {
                     echo '-';
                    }
                      ?>
                   </td>
                    <td><?php
                     echo $this->mylibrary->tgl_indo($row['tgl_pm']);
                      ?>
                    </td>    
                    <td style="text-align: center">
                      <a href="<?=base_url().'siteman/ubah_jadwal/'.$row['id']?>">
                        <i class="fa fa-cog" title="Edit data"></i>
                      </a><br>
                      <a href="<?=base_url().'siteman/update_jadwal/'.$row['id']?>" title='Update data'>
                        <i class="fa fa-pencil"></i>
                      </a><br>
                      <a href="<?=base_url().'siteman/hapus_jadwal/'.$row['id']?>"
                      onclick="return confirm('apakah anda yakin akan menghapus data ini?')";>
                        <i class="fa fa-trash-o" style="color: red;" title="hapus data"></i>
                      </a>
                    </td>
                  </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>