<?php
$data = ['id_alat', 'id_distributor', 'id_lokasi', 'id_kondisi', 'sn_alat', 'thn_pengadaan', 'thn_operasional', 'sts_kalibrasi', 'usia_teknis', 'harga', 'penyusutan', 'n_akumulasi', 'n_buku', 'buku_op', 'buku_manual'];
foreach ($data as $key) {
  echo '<div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">'.$key.'</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="'.$key.'">
                </div>
            </div>';
}
