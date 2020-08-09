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
        <h3 class="box-title m-b-0"><?=$title?>
            <a href="<?=base_url().'lap_kerusakan/tambah_kerusakan'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Waktu Pelaporan</th>
                        <th>kode inventaris</th>
                        <th>Nama Alat</th>
                        <th>S/N</th>
                        <th>Merk</th>
                        <th>Model/tipe</th>
                        <th>Lokasi</th>
                        <th>Distributor</th>
                        <th>Keluhan</th>
                        <th style="width: 50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><?=$row['tgl_buat'].' '.$row['jam_buat']?></td>
                            <td><?=$row['noinv']?></td>
                            <td><?=$row['nama_alat']?></td>
                            <td><?=$row['sn_alat']?></td>
                            <td><?=$row['nama_merk']?></td>
                            <td><?=$row['model_tipe']?></td>
                            <td><?=$row['nama_lokasi']?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['keluhan']?></td>
                            <td>
                                <center>
                                    
                                    <a href="<?=base_url().'lap_kerusakan/hapus_kerusakan/'.$row['id_kerusakanalat'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
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