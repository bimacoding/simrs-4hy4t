<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('pemeliharaan/ubah_pemeliharaan',$attributes); ?>
        <?php
            $noinv = '';
            foreach($inv as $key){
                if($key['id_inv'] == $row['id_inv']){
                    $noinv = $key['noinv'];
                }
            }
        ?>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kode inventaris</label>
                <div class="col-10">
                    <input class="form-control" type="hidden" id="pemeliharaanID" name="id" value="<?=$row['id_pemeliharaan']?>">
                    <input class="form-control" type="hidden" name="id_inv" id="id_inv" value="<?=$row['id_inv']?>">
                    <input class="form-control" readonly type="text" value="<?= $noinv ?>">
                </div>
            </div>

            <div class="form-group row" id="hi" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Alat</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama_alat" id="nama_alat" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">S/N</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="sn_alat" id="sn_alat" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Merk</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="nama_merk" id="nama_merk" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Model/Tipe</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="model_tipe" id="model_tipe" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiiiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Kondisi</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="kondisi" id="kondisi" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiiiiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Distributor</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="distributor" id="distributor" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiiiiiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Lokasi</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="lokasi" id="lokasi" readonly="">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Jenis Pemeliharaan</label>
                <div class="col-10">
                    <select class="form-control" name="id_jenis">
                        <option value="">-- Pilih --</option>
                        <?php 
                            foreach ($jenis as $key) {
                                $pilih = 'selected';
                                if($row['id_jenis']==$key['id_jenis']){
                                    echo "<option value='$key[id_jenis]' $pilih>$key[inisial]</option>";
                                }else{
                                    echo "<option value='$key[id_jenis]'>$key[inisial]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Jadwal Pemeliharaan</label>
                <div class="col-10">
                    <input style="padding-bottom: 35px; padding-top: 2px" class="form-control" type="date" value="<?= $row['tgl_pm'] ?>" name="jadwal_pemeliharaan">
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'pemeliharaan'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
        var idinv = $("#id_inv").val();
        $.ajax({
            url: '<?=base_url().'ajax/getInv'?>',
            type: 'POST',
            dataType: 'json',
            data: {
                'id_inv': idinv 
            },
            success: function (alats) {
                $("#hi").show();
                $("#hii").show();
                $("#hiii").show();
                $("#hiiii").show();
                $("#hiiiii").show();
                $("#hiiiiii").show();
                $("#hiiiiiii").show();

                $("#nama_merk").val(alats.nama_merk);
                $("#sn_alat").val(alats.sn_alat);
                $("#nama_alat").val(alats.nama_alat);
                $("#model_tipe").val(alats.model_tipe);
                $("#kondisi").val(alats.kondisi);
                $("#distributor").val(alats.distributor);
                $("#lokasi").val(alats.lokasi);
            }
        });
    function getinventaris(){
        var idinv = $("#id_inv").val();
        $.ajax({
            url: '<?=base_url().'ajax/getInv'?>',
            type: 'POST',
            dataType: 'json',
            data: {
                'id_inv': idinv 
            },
            success: function (alats) {
                $("#hi").show();
                $("#hii").show();
                $("#hiii").show();
                $("#hiiii").show();
                $("#hiiiii").show();
                $("#hiiiiii").show();

                $("#nama_merk").val(alats.nama_merk);
                $("#sn_alat").val(alats.sn_alat);
                $("#nama_alat").val(alats.nama_alat);
                $("#model_tipe").val(alats.model_tipe);
                $("#kondisi").val(alats.kondisi);
                $("#distributor").val(alats.distributor);
            }
        });
    };
</script>