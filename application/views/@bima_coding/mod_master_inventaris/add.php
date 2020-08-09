<style type="text/css">
    .autocomplete-suggestions {
        border: 1px solid #999;
        background: #FFF;
        overflow: auto;
    }
    .autocomplete-suggestion {
        padding: 2px 5px;
        white-space: nowrap;
        overflow: hidden;
    }
    .autocomplete-selected {
        background: #F0F0F0;
    }
    .autocomplete-suggestions strong {
        font-weight: normal;
        color: #3399FF;
    }
    .autocomplete-group {
        padding: 2px 5px;
    }
    .autocomplete-group strong {
        display: block;
        border-bottom: 1px solid #000;
    }
    .ajax-file-upload{
        cursor:pointer;
        width: 100%;
        height: 30px;
        text-align: center;
        top: 2px;
        font-size: 10px;
        line-height: 23px;
    }

    .ajax-file-upload-green
    {
        background-color: #188601;
        display: inline-block;
        color: #fff;
        font-size: 12px;
        padding: 1px 12px;
        cursor: pointer;
        margin-right: 5px;
        float: right;
    }

    .ajax-upload-dragdrop > span
    {
        display: none;
    }

    .ajax-file-upload-statusbar{
        display: inline;
    }

    .ajax-upload-dragdrop{
        padding: 0px 4px 0px 4px;
        width: 100%
    }
    .ajax-upload-dragdrop span:first-of-type{
        float: right; margin-top: 5px;
    }
    .ajax-file-upload-preview{
        display: inline;
        float: left;
    }
    .form-sm .ajax-file-upload
    {
        width: 100%;
    }
</style>
<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0"><?=$title?></h3>
        <p class="text-muted m-b-30 font-13"> Pastikan semua kolom terisi. </p>
        <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('inventaris/tambah_inventaris',$attributes); ?>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama alat</label>
                <div class="col-10">
                    <input class="form-control" type="hidden" id="kode_alat" name="kode_alat">
                    <select class="form-control" name="id_alat" onchange="alat()" id="id_alat">
                        <option value="0">-- Pilih --</option>
                        <?php 
                            foreach ($alat as $key) {
                                $pilih = 'selected';
                                if($row['id_alat']==$key['id_alat']){
                                    echo "<option value='$key[id_alat]' $pilih>$key[nama_alat]</option>";
                                }else{
                                    echo "<option value='$key[id_alat]'>$key[nama_alat]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row" id="hii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Merk</label>
                <div class="col-10">
                    <input class="form-control" type="text" id="merk" readonly="">
                </div>
            </div>

            <div class="form-group row" id="hiii" style="display: none;">
                <label for="example-text-input" class="col-2 col-form-label">Model/Tipe</label>
                <div class="col-10">
                    <input class="form-control" type="text" id="model_tipe" readonly="">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">nama distributor</label>
                <div class="col-10">
                    <select class="form-control" name="id_distributor">
                        <option value="">-- Pilih --</option>
                        <?php 
                            foreach ($distributor as $key) {
                                $pilih = 'selected';
                                if($row['id_distributor']==$key['id_distributor']){
                                    echo "<option value='$key[id_distributor]' $pilih>$key[nama]</option>";
                                }else{
                                    echo "<option value='$key[id_distributor]'>$key[nama]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">lokasi</label>
                <div class="col-10">
                    <select class="form-control" name="id_lokasi">
                        <option value="">-- Pilih --</option>
                        <?php 
                            foreach ($lokasi as $key) {
                                $pilih = 'selected';
                                if($row['id_lokasi']==$key['id_lokasi']){
                                    echo "<option value='$key[id_lokasi]' $pilih>$key[nama_lokasi]</option>";
                                }else{
                                    echo "<option value='$key[id_lokasi]'>$key[nama_lokasi]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">kondisi</label>
                <div class="col-10">
                    <select class="form-control" name="id_kondisi">
                       <option value="">-- Pilih --</option> 
                       <?php 
                        foreach ($kondisi as $key) {
                            $pilih = 'selected';
                            if($row['id_kondisi']==$key['id_kondisi']){
                                echo "<option value='$key[id_kondisi]' $pilih>$key[nama_kondisi]</option>";
                            }else{
                                echo "<option value='$key[id_kondisi]'>$key[nama_kondisi]</option>";
                            }
                        }
                       ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">serial number</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="sn_alat">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">thn. pengadaan</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="thn_pengadaan">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">thn. operasional</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="thn_operasional">
                </div>
            </div>

            

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">usia teknis</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="usia_teknis">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">harga</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="harga">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">penyusutan</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="penyusutan">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">nilai akumulasi</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="n_akumulasi">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">nilai buku</label>
                <div class="col-10">
                    <input class="form-control" type="number" name="n_buku">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Operational Book</label>
                <div class="col-sm-10">
                    <div id='mulitplefileuploader1'>Pilih files</div>
                    <div id='status'></div>
                    <small class="text-muted">Max (5 MB), Allowed File : pdf,xls,doc,ppt</small>
                </div>
                <span id="idoprationalbook"></span>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Manual Book</label>
                <div class="col-sm-10">
                    <div id='mulitplefileuploader2'>Pilih files</div>
                    <div id='status'></div>
                    <small class="text-muted">Max (5 MB), Allowed File : pdf,xls,doc,ppt</small>
                </div>
                <span id="idmanualbook"></span>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kalibrasi</label>
                <div class="col-sm-10">
                    <div id='mulitplefileuploader'>Pilih files</div>
                    <div id='status'></div>
                    <small class="text-muted">Max (5 MB), Allowed File : pdf,xls,doc,ppt</small>
                </div>
                <span id="idkalibrasi"></span>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?=base_url().'inventaris'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    function alat(){
        var idAlat = $("#id_alat").val();
        $.ajax({
            url: '<?=base_url().'ajax/getalat'?>',
            type: 'POST',
            dataType: 'json',
            data: {
                'id_alat': idAlat 
            },
            success: function (alats) {
                $("#hii").show();
                $("#hiii").show();
                $("#merk").val(alats.merk);
                $("#kode_alat").val(alats.kode_alat);
                $("#model_tipe").val(alats.model_tipe);
            }
        });
    };
</script>
<script type="text/javascript">
$(document).ready(function(){

$("#mulitplefileuploader").uploadFile({
    url: "<?=base_url()?>inventaris/upload_kalibrasi/",
    dragDrop: true,
    maxFileCount:1,
    multiple: false,
    fileName: "upload_kalibrasi",
    maxFileSize:5500*1024,
    allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx",     
    returnType:"json",
    dragdropWidth:'auto',
    showDone:true,
    showDelete:true,
    onSuccess: function( files, data, xhr ) {
       console.log(data);
       $('#idkalibrasi').append('<input type="hidden" name="sts_kalibrasi" value="'+data+'">');
    },
    deleteCallback: function(data,pd) 
    {
        for(var i=0;i<data.length;i++) {
            var str = data[i];
            console.log(str.replace(/[^a-z0-9]/gi, '_'));
            $.post("<?=base_url()?>inventaris/delete/",{op:"delete",name:data[i]},
            function(resp, textStatus, jqXHR) { 
                console.log(data);
            });
            
        }  
        console.log(data[0]); 
        pd.statusbar.hide();
    }
});

});

$(document).ready(function(){

$("#mulitplefileuploader1").uploadFile({
    url: "<?=base_url()?>inventaris/upload_book_op/",
    dragDrop: true,
    maxFileCount:1,
    multiple: false,
    fileName: "upload_book_op",
    maxFileSize:5500*1024,
    allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx",     
    returnType:"json",
    dragdropWidth:'auto',
    showDone:true,
    showDelete:true,
    onSuccess: function( files, data, xhr ) {
       console.log(data);
       $('#idoprationalbook').append('<input type="hidden" name="buku_op" value="'+data+'">');
    },
    deleteCallback: function(data,pd) 
    {
        for(var i=0;i<data.length;i++) {
            $.post("<?=base_url()?>inventaris/delete/",{op:"delete",name:data[i].replace(/[^a-z0-9]/gi, '_')},
            function(resp, textStatus, jqXHR) { 
                console.log(data);
            });
            
        }  
        console.log(data[0]); 
        pd.statusbar.hide();
    }
});

});

$(document).ready(function(){

$("#mulitplefileuploader2").uploadFile({
    url: "<?=base_url()?>inventaris/upload_book_manual/",
    dragDrop: true,
    maxFileCount:1,
    multiple: false,
    fileName: "upload_book_manual",
    maxFileSize:5500*1024,
    allowedTypes:"pdf,doc,docx,xls,xlsx,ppt,pptx",     
    returnType:"json",
    dragdropWidth:'auto',
    showDone:true,
    showDelete:true,
    onSuccess: function( files, data, xhr ) {
       console.log(data);
       $('#idmanualbook').append('<input type="hidden" name="buku_manual" value="'+data+'">');
    },
    deleteCallback: function(data,pd) 
    {
        for(var i=0;i<data.length;i++) {
            $.post("<?=base_url()?>inventaris/delete/",{op:"delete",name:data[i].replace(/[^a-z0-9]/gi, '_')},
            function(resp, textStatus, jqXHR) { 
                console.log(data);
            });
            
        }  
        console.log(data[0]); 
        pd.statusbar.hide();
    }
});

});



</script>