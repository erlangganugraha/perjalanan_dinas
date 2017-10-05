<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Pegawai</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Pegawai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>-->
          </div>
        </div>
        <div class="box-body">
            <form method="post" accept-charset="utf-8" action="<?=base_url();?>pegawai/exeAdd" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text"  class="form-control" name="txtNip" required="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="txtNama" required="">
                </div>

                <div class="form-group">
                  <label>Golongan</label>
                  <select class="form-control" id="optGolongan" name="optGolongan" required="">
                    <option></option>
                    <?php foreach ($getGolongan as $v) {?>
                    <option value="<?php echo $v->pangkat;?>"><?=$v->golongan;?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Pangkat</label>
                    <input type="text" readonly name="txtPangkat" class="form-control">
                    <input type="hidden" readonly name="txtGolongan" class="form-control">
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="txtJabatan" required="">
                </div>

                <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control" name="optBidang" required="">
                    <option></option>
                    <?php foreach ($getBidang as $v) {?>
                    <option value="<?=$v->bidang;?>"><?=$v->bidang;?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tingkatan</label>
                  <select class="form-control" name="optTingkatan" required="">
                    <option></option>
                    <?php foreach ($getTingkatan as $v) {?>
                    <option value="<?php echo $v->tingkatan;?>"><?=$v->tingkatan;?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="optStatus" required="">
                    <option></option>
                    <!-- Aktif, pensiun, tugas belajar, sudah pindah. -->
                    <option value="Aktif">Aktif</option>
                    <option value="Pensiun">Pensiun</option>
                    <option value="Tugas Belajar">Tugas Belajar</option>
                    <option value="Sudah Pindah">Sudah Pindah</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?=base_url();?>pegawai/index" class="btn btn-danger">Cancel</a>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->

    <script type="text/javascript">
      $('[name="optGolongan"]').change(function() {
        $('[name="txtPangkat"]').val($("#optGolongan option:selected").val());
        $('[name="txtGolongan"]').val($("#optGolongan option:selected").text());
      });

    </script>