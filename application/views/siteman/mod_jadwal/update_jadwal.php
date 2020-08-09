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
                echo form_open_multipart('siteman/update_jadwal',$attributes); ?>
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
                        <tr><th scope='row'>Jenis Pemeliharaan</th><td> <input type="text" class='form-control' name="jenis_pm" readonly id="jenis_pm" value="<?=$row['jenis_pm']?>"></td></tr>

                        <tr><th scope='row'>Jadwal Pemeliharaan</th><td><input type='date' class='form-control' name='jadwal_pm' value="<?=$row['tgl_pm'];?>"> </td></tr>
                        <tr><th scope='row'>Tanggal Pelaksanaan</th><td><input type='date' class='form-control' name='tgl_pm'> </td></tr>
                        <tr><th scope='row'>Status</th><td> <select name="status" class="form-control">
                                                              <option value="">-Pilih-</option>
                                                              <option value="Selesai">Selesai</option>
                                                              <option value="Pending">Pending</option>
                                                            </select> </td></tr>
                        <tr><th scope='row'>Masalah</th><td> <textarea class="form-control" name="masalah" placeholder="isikan masalah"></textarea></td></tr>

                        <tr><th scope='row'>Analisis</th><td> <textarea class="form-control" name="analisis" placeholder="isikan analisis"></textarea></td></tr>

                        <tr><th scope='row'>Tindakan</th><td> <textarea class="form-control" name="tindakan" placeholder="isikan tindakan"></textarea></td></tr>
                        
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