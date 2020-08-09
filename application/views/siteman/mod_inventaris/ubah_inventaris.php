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
                echo form_open_multipart('siteman/ubah_inventaris',$attributes); ?>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <tr><th scope='row'>SN</th><td>              <input type='text' class='form-control' name='b' value="<?=$row['sn']?>"></td></tr>
                        <tr><th scope='row'>Nama Alat</th><td>       <select class='form-control' name='c'>
                                                                       <option value="<?=$row['nama_alat']?>"><?=$row['nama_alat']?></option>
                                                                       <option value="Infrared Therapy">Infrared Therapy</option>
                                                                       <option value="Ultrasound Therapy">Ultrasound Therapy</option> 
                                                                       <option value="Microwave Diathermy">Microwave Diathermy</option>
                                                                       <option value="Shortwave Diathermy">Shortwave Diathermy</option>
                                                                       <option value="Electrostimulator">Electrostimulator</option>
                                                                       <option value="Static Bycicle">Static Bycicle</option>
                                                                       <option value="Nebulizer">Nebulizer</option> 
                                                                       <option value="Traksi">Traksi</option>
                                                                       <option value="Laser">Laser</option>
                                                                       <option value="Parafin Bath">Parafin Bath</option>
                                                                     </select>
                                                                     </td></tr>
                        <tr><th scope='row'>Merk</th><td>            <input type='text' class='form-control' name='d' value="<?=$row['merk']?>"> </td></tr>
                        <tr><th scope='row'>Model Tipe</th><td>      <input type='text' class='form-control' name='e' value="<?=$row['model_tipe']?>"> </td></tr>
                        <tr><th scope='row'>Tahun Pengadaan</th><td> <select name="f" class="form-control">
                                                                        <option value=""></option>
                                                                         <?php 
                                                                         $thn=date('Y');
                                                                         for($x=1990; $x<=$thn; $x++){
                                                                            if ($row['tahun_pgd']==$x) {
                                                                                echo "<option value='$x' selected>$x</option>";
                                                                            }else{
                                                                                echo "<option value='$x'>$x</option>";
                                                                            }
                                                                          }
                                                                         ?> 
                                                                       </select> </td></tr>
                        <tr><th scope='row'>Tahun Operasional</th><td> <select name="g" class="form-control">
                                                                        <option value="">-Pilih-</option>
                                                                         <?php 
                                                                         $thn=date('Y');
                                                                         for($x=1990; $x<=$thn; $x++){
                                                                            if ($row['tahun_opr']==$x) {
                                                                                echo "<option value='$x' selected>$x</option>";
                                                                            }else{
                                                                                echo "<option value='$x'>$x</option>";
                                                                            }
                                                                          }
                                                                         ?>
                                                                     </select> </td></tr>
                         <tr><th scope='row'>Distributor</th><td>    <input type='text' class='form-control' name='h' value="<?=$row['distributor']?>"> </td></tr>
                         <tr><th scope='row'>Lokasi</th><td>          <select name="i" class="form-control">
                                                                       <option value="<?=$row['lokasi']?>"><?=$row['lokasi']?></option>
                                                                       <option value="UGD">UGD</option> 
                                                                       <option value="ICU">ICU</option>
                                                                       <option value="OK">OK</option>
                                                                       <option value="Laboratorium">Laboratorium</option>
                                                                       <option value="Rehab Medik">Rehab Medik</option>
                                                                     </select> </td></tr>
                        <tr><th scope='row'>Status Kalibrasi</th><td>
                                                                    <?php 
                                                                        $pilih = "checked";
                                                                        if ($row["status_klbs"]=='Laik Pakai') { 
                                                                            
                                                                    ?> 
                                                                            <input type="radio" name="j" required="" value="Laik Pakai" <?=$pilih?>>
                                                                            <label>Laik Pakai</label>
                                                                            <input type="radio" name="j" required="" value="Tidak Laik">
                                                                            <label>Tidak Laik</label>
                                                                    <?php }else{ ?>
                                                                            <input type="radio" name="j" required="" value="Laik Pakai">
                                                                            <label>Laik Pakai</label>
                                                                            <input type="radio" name="j" required="" value="Tidak Laik" <?=$pilih?>>
                                                                            <label>Tidak Laik</label>
                                                                    <?php } ?>
                                                                 </td></tr>
                        <tr><th scope='row'>File Klibrasi</th><td><input type='file' class='form-control' name='k'> </td></tr>
                      </tbody>
                      </table>

                      <div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Ubah</button>
                            <a href='<?=base_url().'siteman/inventaris'?>' class='btn btn-default pull-right'>Kembali</a>
                      </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>