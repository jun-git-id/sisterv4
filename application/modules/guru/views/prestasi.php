
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
        <form   class="form-inline" method="post" action="" enctype ="multipart/form-data" id="posts">
        <select name="tahunakademik_id" class="form-control <?= form_error('tahunakademik_id') ? 'is-invalid' : '' ?>">
                            <?php foreach ($tahunakademik as $dt) : ?>
                            <?php if ($tahunakademik_id == $dt['id']) {?>
                            <option value='<?= $dt['id']?>' selected> <?= $dt['nama']?></option>";
                            <?php  } else { ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('tahunakademik_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                            <?php } ?>
                            <?php endforeach; ?>
                        </select>
                        <select name="kelas_id" class="form-control <?= form_error('kelas_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Kelas ==</option>
                            <?php foreach ($kelas as $dt) : ?>
                            <?php if ($kelas_id == $dt['id']) {?>
                            <option value='<?= $dt['id']?>' selected> <?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>";
                            <?php  } else { ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('kelas_id', $dt['id'], FALSE); ?>><?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>
                            <?php } ?>
                            <?php endforeach; ?>
                        </select>
        <input type="submit" value="Lihat" name="submit"class="btn btn-success">
    </a>
</form>
        </div>

      </div>
      
      <div class="box-body">
        <div class="row">
       
<!-- -->
<div class="col-md-12">
    <?php if($getlistsiswa){ ?>
        
        <table id='example' class='table table-bordered table-striped'>
            <thead>
                <tr><th rowspan='2'>No</th>
                <th rowspan='2'>NIS</th>
                <th rowspan='2'>Nama Siswa</th>
                <th><center>Jenis Kegiatan</center></th>
                <th><center>Keterangan</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sno = $row + 1;
            foreach ($getlistsiswa as $dt) : ?>
<form method="post" action="<?= base_url('guru/prestasi_add') ?>" >
<tr><td><?= $sno++ ?></td>
<td><?= $dt['nis']?></td>
<td><?= $dt['namasiswa']?> </td>
<input type='hidden' name='siswa_id' value='<?= $dt['siswa_id'] ?>'>
<td><input type='text' name='a1' value='' style='width:200px; text-align:left; padding:0px; color:blue'placeholder='Tuliskan Kegiatan...'></td>
<td><input type='text' name='b1' value='' style='width:200px; text-align:left; padding:0px; color:blue'placeholder='Tuliskan Keterangan...'></td>
<td>
<input type='hidden' name='tahunakademik_id' value='<?= $tahunakademik_id ?>'>
<input type='hidden' name='kelas_id' value='<?= $kelas_id ?>'>
<input type='hidden' name='user_id' value='<?= $user['id'] ?>'>
<button type='submit' name='simpan' class='btn btn-primary'>Simpan</button>
</td>
</tr>
</form>
<?php 
    foreach ($get_prestasi as $dt2) :
    if( $dt['siswa_id']==$dt2['siswa_id']){ ?>
<tr><td></td>
<td></td>
<td></td>
<td><?= $dt2['jenis_kegiatan']?> </td>
<td><?= $dt2['keterangan']?></td>
<td>
<a href="<?= base_url('guru/prestasi_edit/'.$tahunakademik_id.'/'.$kelas_id.'/'.$dt2['prestasi_id'])?>"class='btn btn-xs btn-warning'><span class='glyphicon glyphicon-edit'></span></a>
    <a href="<?= base_url('guru/prestasi_hapus/'.$tahunakademik_id.'/'.$kelas_id.'/'.$dt2['prestasi_id'])?>"class='btn btn-xs btn-danger' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
    </td>
</tr>
<?php } 
endforeach; ?>
<?php endforeach; ?>
    </tbody>
        </table>
        <div style='clear:both'></div>
    <?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</font></div><br><br><br>";

    } ?>
          </div>

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->