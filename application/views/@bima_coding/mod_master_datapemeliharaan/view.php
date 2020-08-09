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
            <a href="<?=base_url().'datapemeliharaan/riwayat_kerusakan'?>" class="badge badge-success float-right">Riwayat Kerusakan</a>
        </h3>
        <div class="table-responsive">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Kode Inventaris</th>
                        <th>Nama Alat</th>
                        <th>S/N</th>
                        <th>Merk</th>
                        <th>Model/Tipe</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Jadwal Pemeliharaan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Status</th>
                        <th>Masalah</th>
                        <th>Analis Kerusakan</th>
                        <th>Tindak Lanjut</th>
                        <th>Keterangan</th>
                        <th>Service Report</th>
                        <th>Lampiran</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        
                        foreach ($record as $row) {
                            $style = '';
                            if($row['status'] == 'pending'){
                                $style = 'background-color: #413036';
                            }
                    ?>
                        <tr style="<?= $style ?>">
                            <td><center><?=$no?></center></td>
                            <td><a href="<?= base_url().'datapemeliharaan/riwayat_pemeliharaan/'.$row['id_inv'] ?>"><?=$row['noinv']?></a></td>
                            <td><?=$row['sn_alat']?></td>
                            <td><?=$row['nama_alat']?></td>
                            <td><?=$row['nama_merk']?></td>
                            <td><?=$row['model_tipe']?></td>
                            <td><?=$row['nama_lokasi']?></td>
                            <td><?=$row['inisial']?></td>
                            <td><?=$row['tgl_perencanaan']?></td>
                            <td><?=$row['tgl_mulai']?></td>
                            <td><?=$row['status']?></td>
                            <td><?=$row['masalah']?></td>
                            <td><?=$row['analisis_kerusakan']?></td>
                            <td><?=$row['tindak_lanjut']?></td>
                            <td><?=$row['ket']?></td>
                            <td><a href="<?= base_url().'datapemeliharaan/service_report/'.$row['id_pemeliharaan'] ?>">view report</a></td>
                            <td><a href="<?=base_url().'assets/uploads/dokumen/'.$row['service_report'] ?>"><?=$row['service_report']?></a></td>
                            <td>
                                <center>
                                    <a href="<?=base_url().'datapemeliharaan/ubah_datapemeliharaan/'.$row['id_pemeliharaan'];?>" class="badge badge-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?=base_url().'datapemeliharaan/hapus_datapemeliharaan/'.$row['id_pemeliharaan'];?>" class="badge badge-danger" onclick='return confirm("Apa anda yakin untuk hapus Data ini?")'>
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