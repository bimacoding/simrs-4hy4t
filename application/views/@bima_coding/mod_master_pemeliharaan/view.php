<div class="col-sm-12">
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if($this->session->flashdata('error')){  ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
    <div class="white-box">
        <h3 class="box-title m-b-0">
            <?=$title?>
            <div class="float-right">
                <a href="<?=base_url().'pemeliharaan/cetak_pemeliharaan'?>" class="badge badge-success">Cetak</a>
                <?php if ($this->session->userdata('level')=='admin') { ?>
                <a href="<?=base_url().'pemeliharaan/tambah_pemeliharaan'?>" class="badge badge-primary">Tambah</a>
                <?php  } ?>
            </div>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
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
                        <?php if ($this->session->userdata('level')=='admin') { ?>
                        <th style="width: 100px">Aksi</th>
                        <?php   } ?>
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
                            <?php if ($this->session->userdata('level')=='admin') { ?>
                            <td>
                                <center>
                                    <a href="<?=base_url().'pemeliharaan/ubah_pemeliharaan/'.$row['id_pemeliharaan'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="<?=base_url().'pemeliharaan/update_pemeliharaan/'.$row['id_pemeliharaan'];?>" class="badge badge-info" title="Update">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?=base_url().'pemeliharaan/hapus_pemeliharaan/'.$row['id_pemeliharaan'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        <?php   } ?>
                        </tr>
                    <?php
                        $no++;    # code...
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>