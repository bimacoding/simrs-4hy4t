<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('siteman/ubah_distributor',$attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                <div class="col-10">
                    <input type="hidden" name="id" value="<?=$row['id_distributor']?>">
                    <input class="form-control" type="text" name="nama" value="<?=$row['nama']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Alamat</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="alamat" value="<?=$row['alamat']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kota</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="kota" value="<?=$row['kota']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Telepon</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="tlp" value="<?=$row['tlp']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Fax</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="fax" value="<?=$row['fax']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="email" name="email" value="<?=$row['email']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Situs Web</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="situs" value="<?=$row['situs']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Teknisi</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="teknisi" value="<?=$row['teknisi']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kontak</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nohp_teknisi" value="<?=$row['nohp_teknisi']?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'siteman/distributor'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>