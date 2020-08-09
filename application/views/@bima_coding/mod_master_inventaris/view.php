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
                <a href="<?=base_url().'inventaris/cetak_inventaris'?>" class="badge badge-success">Cetak</a>
                <a href="<?=base_url().'inventaris/tambah_inventaris'?>" class="badge badge-primary ">Tambah</a>
            </div>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th style="width: 100px;">Kode inventaris</th>
                        <th style="width: 100px;">Serial Number</th>
                        <th style="width: 100px;">Nama Alat</th>
                        <th style="width: 100px;">Merk</th>
                        <th style="width: 100px;">Model / Tipe</th>
                        <th style="width: 100px;">Tahun Pengadaan</th>
                        <th style="width: 100px;">Tahun Operasional</th>
                        <th style="width: 100px;">Distributor</th>
                        <th style="width: 100px;">Lokasi</th>
                        <th style="width: 100px;">Kondisi</th>
                        <th style="width: 100px;">Usia Teknis</th>
                        <th style="width: 100px;">Harga Beli</th>
                        <th style="width: 100px;">Penyusutan</th>
                        <th style="width: 100px;">Nilai Akumulasi</th>
                        <th style="width: 100px;">Nilai Buku</th>
                        <th style="width: 100px;">Sts. Kalibrasi</th>
                        <th style="width: 100px;">Operating Manual</th>
                        <th style="width: 100px;">Manual Book</th>
                        <th>QR Code</th>
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
                            <td style="width: 100px;"><?=$row['noinv']?></td>
                            <td style="width: 100px;"><?=$row['sn_alat']?></td>
                            <td style="width: 100px;"><?=$row['nama_alat']?></td>
                            <td style="width: 100px;"><?=get_merk($row['id_merk']);?></td>
                            <td style="width: 100px;"><?=$row['model_tipe']?></td>
                            <td style="width: 100px;"><?=$row['thn_pengadaan']?></td>
                            <td style="width: 100px;"><?=$row['thn_operasional']?></td>
                            <td style="width: 100px;"><?=$row['nama']?></td>
                            <td style="width: 100px;"><?=$row['nama_lokasi']?></td>
                            <td style="width: 100px;"><?=$row['nama_kondisi']?></td>
                            <td style="width: 100px;"><?=$row['usia_teknis']?></td>
                            <td style="width: 100px;"><?=$row['harga']?></td>
                            <td style="width: 100px;"><?=$row['penyusutan']?></td>
                            <td style="width: 100px;"><?=$row['n_akumulasi']?></td>
                            <td style="width: 100px;"><?=$row['n_buku']?></td>
                            <td style="width: 100px;"><?=$row['sts_kalibrasi']?></td>
                            <td style="width: 100px;"><?=$row['buku_op']?></td>
                            <td style="width: 100px;"><?=$row['buku_manual']?></td>
                            <td style="width: 100px;"><?=$row['qrcode']?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'inventaris/ubah_inventaris/'.$row['id_inv'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?=base_url().'inventaris/hapus_inventaris/'.$row['id_inv'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
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