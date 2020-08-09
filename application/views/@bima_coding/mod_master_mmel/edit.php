<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('mmel/ubah_mmel',$attributes); ?>
        <?php
            $noinv = '';
            foreach($inv as $key){
                if($key['id_inv'] == $row['id_inv']){
                    $noinv = $key['noinv'];
                }
            }
        ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kode Inventaris</label>
                <div class="col-10">
                    <input class="form-control" type="hidden" name="id" id="id" value="<?=$row['id_mmel']?>">
                    <input class="form-control" type="hidden" name="id_inv" id="id_inv" value="<?=$row['id_inv']?>">
                    <input class="form-control" readonly type="text" value="<?= $noinv ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Harga Pengganti</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="<?= $row['harga_pengganti'] ?>" id="harga_pengganti" name="harga_pengganti">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tanggal Penawaran</label>
                <div class="col-10">
                    <input style="padding-bottom: 35px; padding-top: 2px" class="form-control" type="date" value="<?= date('Y-m-d', strtotime($row['tanggal_penawaran'])) ?>" name="tanggal_penawaran">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Biaya Pemeliharaan</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="<?= $row['biaya_pemeliharaan'] ?>" name="biaya_pemeliharaan">
                </div>
            </div>
            <hr>
            <div id="div_hitung">
                <div class="form-group row" hidden>
                    <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="keterangan">
                    </div>
                </div>
            </div>
            
            <button type="button" class="btn btn-primary waves-effect waves-light m-r-10" id="btn-hitung" name="btn-hitung"><i class="fa fa-refresh fa-spin" id="loader" style="display: none"></i> Hitung MMEL</button>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'mmel'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>
<script>
    $("#btn-hitung").on("click", function(){
        if($('#harga_pengganti').val() == '' || $('#biaya_pemeliharaan').val() == ''){
            alert('masukan semua data terlebih dahulu');
        }else{
            $('#loader').show();
            $.ajax({
                url: "<?= base_url().'mmel/hitung' ?>",
                method: "POST", 
                data: {
                    id_inv: $('#id_inv').val(),
                    harga_pengganti: $('#harga_pengganti').val(),
                    biaya_pemeliharaan: $('#biaya_pemeliharaan').val()
                }, 
                success: function(result){
                    setTimeout(function(){ 
                        $("#div_hitung").html(result);
                        $('#loader').hide(); 
                    }, 800);
                }
            });
        }
    }); 
</script>