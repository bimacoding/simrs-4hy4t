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
            <a href="<?=base_url().'siteman/tambah_supplier'?>" class="badge badge-primary float-right">Tambah</a>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telpon</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Situs</th>
                        <th>Teknisi</th>
                        <th>Kontak</th>
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
                            <td><?=$row['nama']?></td>
                            <td><?=$row['alamat']?></td>
                            <td><?=$row['kota']?></td>
                            <td><?=$row['tlp']?></td>
                            <td><?=$row['fax']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['situs']?></td>
                            <td><?=$row['teknisi']?></td>
                            <td><?=$row['nohp_teknisi']?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'siteman/ubah_supplier/'.$row['id_supplier'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?=base_url().'siteman/hapus_supplier/'.$row['id_supplier'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
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