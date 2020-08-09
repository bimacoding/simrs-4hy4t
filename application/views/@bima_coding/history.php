<div class="container">
    <div class="col-md-12 col-lg-4 col-sm-12">
        <div class="white-box">
            
        </div>
    </div>

    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Riwayat Alat</h3>
            <div class="table-responsive">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="width: 25px">No</th>
                        <th>Jenis</th>
                        <th>Jadwal Pemeliharaan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Status</th>
                        <th>Masalah</th>
                        <th>Analis Kerusakan</th>
                        <th>Tindak Lanjut</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        
                        foreach ($record->result_array() as $row) {
                            $style = '';
                            if($row['status'] == 'pending'){
                                $style = 'background-color: #413036';
                            }
                    ?>
                        <tr style="<?= $style ?>">
                            <td><center><?=$no?></center></td>
                            <td><?=$row['inisial']?></td>
                            <td><?=$row['tgl_perencanaan']?></td>
                            <td><?=$row['tgl_mulai']?></td>
                            <td><?=$row['status']?></td>
                            <td><?=$row['masalah']?></td>
                            <td><?=$row['analisis_kerusakan']?></td>
                            <td><?=$row['tindak_lanjut']?></td>
                            <td><?=$row['ket']?></td>
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
</div>