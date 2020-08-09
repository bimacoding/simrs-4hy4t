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
            <div class="float-right">
                <a href="<?=base_url().'mmel/cetak_mmel'?>" class="badge badge-success">Cetak</a>
                <a href="<?=base_url().'mmel/tambah_mmel'?>" class="badge badge-primary">Tambah</a>
            </div>
        </h3>
        
        <div class="table-responsive">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Operasional</th>
                        <th>Lokasi</th>
                        <th>Kode Inv</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Distributor</th>
                        <th>Pembelian</th>
                        <th>Usia Teknis</th>
                        <th>Usia Pakai</th>
                        <th>Sisa Usia Manfaat</th>
                        <th>Presentase Manfaat</th>
                        <th>MEL Factor</th>
                        <th>Harga Pengganti</th>
                        <th>MMEL</th>
                        <th>Biaya Pemeliharaan</th>
                        <th>Ket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row) {
                            $usia_pakai = (date('Y') - $row['thn_operasional']);
                            $sisa_usia_manfaat = $row['usia_teknis'] - $usia_pakai;
                            $presentase_usia_manfaat = $sisa_usia_manfaat / ($row['usia_teknis']);
                    ?>
                        <tr>
                            <td><center><?=$no?></center></td>
                            <td><?= $row['thn_operasional'] ?></td>
                            <td><?= $row['nama_lokasi'] ?></td>
                            <td><?= $row['noinv'] ?></td>
                            <td><?= $row['nama_alat'] ?></td>
                            <td><?= $row['nama_merk'] ?></td>
                            <td><?= $row['model_tipe'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><u>Rp.<?= number_format($row['harga']) ?></u><br>tahun <?= $row['thn_pengadaan'] ?></td>
                            <td><?= $row['usia_teknis'] ?></td>
                            <td><?= $usia_pakai ?></td>
                            <td><?= $sisa_usia_manfaat ?></td>
                            <td> <?= $presentase_usia_manfaat ?> </td>
                            <td>0.9</td>
                            <td>Rp.<?= number_format($row['harga_pengganti']) ?></td>
                            <td>Rp.<?= number_format( (0.9 * $presentase_usia_manfaat * $row['harga_pengganti'])) ?></td>
                            <td><?= number_format($row['biaya_pemeliharaan']) ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'mmel/ubah_mmel/'.$row['id_mmel'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?=base_url().'mmel/hapus_mmel/'.$row['id_mmel'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
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