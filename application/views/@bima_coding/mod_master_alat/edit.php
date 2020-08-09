<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('siteman/ubah_alat',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kode Alat</label>
                <div class="col-10">
                    <input type="hidden" name="id" value="<?=$row['id_alat']?>">
                    <input class="form-control" type="text" name="kode_alat" value="<?=$row['kode_alat']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Alat</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama_alat" value="<?=$row['nama_alat']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Merk</label>
                <div class="col-10">
                    <select class="form-control" name="id_merk">
                        <option value="">-- Pilih Merk --</option>
                        <?php foreach ($merk as $key) {
                            $pilih = 'selected';
                            if ($row['id_merk']==$key['id_merk']) {
                                echo "<option value='$key[id_merk]' $pilih>$key[nama_merk]</option>";
                            }else{
                                echo "<option value='$key[id_merk]'>$key[nama_merk]</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Model / Tipe</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="model_tipe" value="<?=$row['model_tipe']?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'siteman/alat'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>