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
                Form Ubah Data
            </div>
            <div class='panel-body'>
                <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off');
                echo form_open_multipart('siteman/ubah_jadwal',$attributes); ?>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                        <tr><th scope='row'>Kode</th><td>            <input type='text' class='form-control' name='kode' readonly id="kode" value="<?=$row['kode']?>"> </td></tr>
                        <tr><th scope='row'>SN</th><td>              <input type='text' class='form-control' name='sn' readonly id="sn" value="<?=$row['sn']?>"> </td></tr>
                        <tr><th scope='row'>Nama Alat</th><td>       <input type="text" name="nama_alat" class="form-control" readonly id="nmalat" value="<?=$row['nama_alat']?>"> </td></tr>
                        <tr><th scope='row'>Merk</th><td>            <input type='text' class='form-control' name='merk' readonly id="merk" value="<?=$row['merk']?>"> </td></tr>
                        <tr><th scope='row'>Model Tipe</th><td>      <input type='text' class='form-control' name='model_tipe' readonly id="model" value="<?=$row['model_tipe']?>"> </td></tr>
                         <tr><th scope='row'>Lokasi</th><td>         <input type="text" class='form-control' name="lokasi" readonly id="lokasi" value="<?=$row['lokasi']?>"> </td></tr>
                        <tr><th scope='row'>Jenis Pemeliharaan</th><td>
                                                                    <?php 
                                                                        $pilih = "checked";
                                                                        if ($row["jenis_pm"]=='PM') { 
                                                                            
                                                                    ?> 
                                                                            <input type="radio" name="jenis_pm" required="" value="PM" <?=$pilih?>>
                                                                            <label>Preventive Maintenance</label>
                                                                            <input type="radio" name="jenis_pm" required="" value="CM" >
                                                                            <label>Conservative Maintenance</label>
                                                                    <?php }else{ ?>
                                                                            <input type="radio" name="jenis_pm" required="" value="PM" >
                                                                            <label>Preventive Maintenance</label>
                                                                            <input type="radio" name="jenis_pm" required="" value="CM" <?=$pilih?>>
                                                                            <label>Conservative Maintenance</label>
                                                                    <?php } ?>
                                                                    
                                                                 </td></tr>
                        <tr><th scope='row'>Jadwal Pemeliharaan</th><td><input type='date' class='form-control' name='jadwal_pm' value="<?=$row['tgl_pm'];?>"> </td></tr>
                      </tbody>
                      </table>

                      <div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                            <a href='<?=base_url().'siteman/jadwal'?>' class='btn btn-default pull-right'>Kembali</a>
                      </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>