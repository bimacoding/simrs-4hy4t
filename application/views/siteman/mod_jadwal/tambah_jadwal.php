<div class="row">
  <div class="col-md-12">
    <h2><?=$title;?></h2>
  </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Tambah Data
            </div>
            <div class='panel-body'>
                <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
                echo form_open_multipart('siteman/tambah_jadwal',$attributes); ?>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr><th scope='row'>Kode</th><td>      <select name="kode" id="kode" class="form-control" onchange="isi_otomatis()">
                                                                        <option value=''>-- Pilih ---</option>
                                                                        <?php foreach ($record as $row) {
                                                                          echo "<option value='$row[kode]'> $row[nama_alat] ( <strong>$row[kode]</strong> ) </option>";
                                                                        } ?>
                                                                     </select> </td></tr>
                        <tr><th scope='row'>SN</th><td>              <input type='text' class='form-control' name='sn' readonly id="sn"> </td></tr>
                        <tr><th scope='row'>Nama Alat</th><td>       <input type="text" name="nama_alat" class="form-control" readonly id="nmalat"> </td></tr>
                        <tr><th scope='row'>Merk</th><td>            <input type='text' class='form-control' name='merk' readonly id="merk"> </td></tr>
                        <tr><th scope='row'>Model Tipe</th><td>      <input type='text' class='form-control' name='model_tipe' readonly id="model"> </td></tr>
                         <tr><th scope='row'>Lokasi</th><td>         <input type="text" class='form-control' name="lokasi" readonly id="lokasi"> </td></tr>
                        <tr><th scope='row'>Jenis Pemeliharaan</th><td>
                                                                    <input type="radio" name="jenis_pm" required="" value="Preventive Maintenance" checked="">
                                                                    <label>Preventive Maintenance</label>
                                                                    <input type="radio" name="jenis_pm" required="" value="Conservative Maintenance" checked="">
                                                                    <label>Conservative Maintenance</label>
                                                                 </td></tr>
                        <tr><th scope='row'>Jadwal Pemeliharaan</th><td><input type='date' class='form-control' name='tgl_pm'> </td></tr>
                      </tbody>
                      </table>

                      <div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                            <a href='<?=base_url().'siteman/jadwal'?>' class='btn btn-default pull-right'>Kembali</a>
                      </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <script type="text/javascript">
                function isi_otomatis(){
                    var kode = $("#kode").val();
                    $.ajax({
                        url: '<?=base_url().'ajax/get_alat'?>',
                        data:"kode="+kode ,
                    }).success(function (data) {
                        var json = data,
                        obj = JSON.parse(json);
                        $('#sn').val(obj.sn);
                        $('#nmalat').val(obj.nama_alat);
                        $('#merk').val(obj.merk);
                        $('#model').val(obj.model_tipe);
                        $('#lokasi').val(obj.lokasi);
                    });
                }
            </script>
        </div>
    </div>
</div>