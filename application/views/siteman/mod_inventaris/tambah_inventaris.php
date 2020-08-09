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
                echo form_open_multipart('siteman/tambah_inventaris',$attributes); ?>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr><th scope='row'>SN</th><td>              <input type='text' class='form-control' name='b'></td></tr>
                        <tr><th scope='row'>Nama Alat</th><td>       <select class='form-control' name='c'>
                                                                       <option value="">-Pilih-</option>
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
                        <tr><th scope='row'>Merk</th><td>            <input type='text' class='form-control' name='d'> </td></tr>
                        <tr><th scope='row'>Model Tipe</th><td>      <input type='text' class='form-control' name='e'> </td></tr>
                        <tr><th scope='row'>Tahun Pengadaan</th><td> <select name="f" class="form-control">
                                                                        <option value="">-Pilih-</option>
                                                                         <?php 
                                                                         $thn=date('Y');
                                                                         for($x=1990; $x<=$thn; $x++){?>
                                                                         <option value="<?php echo $x?>">
                                                                           <?php echo $x ?>
                                                                         </option>
                                                                        <?php } ?>
                                                                     </select> </td></tr>
                        <tr><th scope='row'>Tahun Operasional</th><td> <select name="g" class="form-control">
                                                                        <option value="">-Pilih-</option>
                                                                         <?php 
                                                                         $thn=date('Y');
                                                                         for($x=1990; $x<=$thn; $x++){?>
                                                                         <option value="<?php echo $x?>">
                                                                           <?php echo $x ?>
                                                                         </option>
                                                                        <?php } ?>
                                                                     </select> </td></tr>
                         <tr><th scope='row'>Distributor</th><td>    <input type='text' class='form-control' name='h'> </td></tr>
                         <tr><th scope='row'>Lokasi</th><td>          <select name="i" class="form-control">
                                                                       <option value="">-Pilih-</option>
                                                                       <option value="UGD">UGD</option> 
                                                                       <option value="ICU">ICU</option>
                                                                       <option value="OK">OK</option>
                                                                       <option value="Laboratorium">Laboratorium</option>
                                                                       <option value="Rehab Medik">Rehab Medik</option>
                                                                     </select> </td></tr>
                        <tr><th scope='row'>Status Kalibrasi</th><td>
                                                                    <input type="radio" name="j" required="" value="Laik Pakai" checked="">
                                                                    <label>Laik Pakai</label>
                                                                    <input type="radio" name="j" required="" value="Tidak Laik" checked="">
                                                                    <label>Tidak Laik</label>
                                                                 </td></tr>
                        <tr><th scope='row'>File Klibrasi</th><td><input type='file' class='form-control' name='k'> </td></tr>
                      </tbody>
                      </table>

                      <div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                            <a href='<?=base_url().'siteman/inventaris'?>' class='btn btn-default pull-right'>Kembali</a>
                      </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>