<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('lap_kerusakan/tambah_kerusakan',$attributes); ?>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama alat</label>
                <div class="col-10">
                    <!-- <input class="form-control" type="hidden" id="invID" name="id_inv"> -->
                    <select class="form-control" name="id_inv" onchange="getinventaris()" id="id_inv">
                        <option value="0">-- Pilih --</option>
                        <?php 
                            foreach ($inv as $key) {
                                $pilih = 'selected';
                                if($row['id_inv']==$key['id_inv']){
                                    echo "<option value='$key[id_inv]' $pilih>$key[noinv] - $key[nama_alat]</option>";
                                }else{
                                    echo "<option value='$key[id_inv]'>$key[noinv] - $key[nama_alat]</option>";
                                }
                            }
                        ?>
                    </select>
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
                <label for="example-text-input" class="col-2 col-form-label">keluahan</label>
                <div class="col-10">
                    <textarea class="form-control" name="keluahan"></textarea>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tanggal Perencanaan</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="tgl_perencanaan">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tanggal Mulai</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="tgl_mulai">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Status</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="status">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Masalah</label>
                <div class="col-10">
                    <textarea class="form-control" name="masalah"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">analisis kerusakan</label>
                <div class="col-10">
                    <textarea class="form-control" name="analisis_kerusakan"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Tindak Lanjut</label>
                <div class="col-10">
                    <textarea class="form-control" name="tindak_lanjut"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                <div class="col-10">
                    <textarea class="form-control" name="ket"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Biaya</label>
                <div class="col-10">
                    <input type="number" class="form-control" name="biaya">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Service Report</label>
                <div class="col-10">
                    <input type="file" class="form-control" name="service_report">
                </div>
            </div> -->
            

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'lap_kerusakan'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
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
    };
</script>