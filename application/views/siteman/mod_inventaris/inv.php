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
        <a href="<?=base_url().'siteman/tambah_inventaris'?>" class="btn btn-primary btn-sm pull-right">Tambah Data</a></div>
      <div class="panel-body">
        <div class="table-responsive">
          <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
            <thead>
              <tr role="row">
                <th>No.</th>
                <th>Kode Inventaris</th>
                <th>S/N</th>
                <th>Nama Alat</th>
                <th>Merk</th>
                <th>Model/Tipe</th>
                <th>Tahun Pengadaan</th>
                <th>Tahun Operasional</th>
                <th>Distributor</th>
                <th>Lokasi Alat</th>
                <th>Status Kalibrasi</th>
                <th><i class="fa fa-list"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($record as $row) { ?>  
                  <tr class="gradeA odd"
                <?php if ($row['status_klbs']=='Tidak Laik') {?>
                    style="background-color:#f9c7c7;"
                    <?php } ?>>
                    <td><?php   echo $no; ?></td>
                    <td><?php echo $row["kode"] ?></td>
                    <td><?php   echo $row["sn"]; ?></td>
                    <td><?php   echo $row["nama_alat"]; ?></td>
                    <td><?php   echo $row["merk"]; ?></td>
                    <td><?php   echo $row["model_tipe"]; ?></td>
                    <td><?php   echo $row["tahun_pgd"]; ?></td>
                    <td><?php   echo $row["tahun_opr"]; ?></td>
                    <td><?php   echo $row["distributor"]; ?></td>
                    <td><?php   echo $row["lokasi"]; ?></td>
                    <td style="text-align: center">
                       <?php   echo $row["status_klbs"]; ?>
                       <br>
                       <a href="<?=base_url().'siteman/download/'.$row["status_klb"]?>" target="_blank">lihat file</a> 
                    </td>
                    <td style="text-align: center">
                      <a href="<?=base_url().'siteman/ubah_inventaris/'.$row['id']?>">
                        <i class="fa fa-cog"></i>
                      </a>
                      <a href="<?=base_url().'siteman/hapus_inventaris/'.$row['id']?>"
                      onclick="return confirm('apakah anda yakin akan menghapus data ini?')";>
                        <i class="fa fa-trash-o" style="color: red;"></i>
                      </a>
                    </td>
                  </tr>
              <?php   $no++; ?>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>