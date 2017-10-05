<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Perjalanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Perjalanan</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Perjalanan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>-->
          </div>
        </div>

        <?php 
          foreach($getEdit as $e){
            $no_surat = $e->no_surat;
            $dasar = $e->dasar;
            $tempat_berangkat = $e->tempat_berangkat;
            $tempat_tujuan = $e->tempat_tujuan;
            $maksud_perjalanan = $e->maksud_perjalanan;
            $untuk = $e->untuk;
            $tgl_berangkat = $e->tgl_berangkat;
            $tgl_kembali = $e->tgl_kembali;
            $tingkat_biaya = $e->tingkat_biaya;
            $alat_angkut = $e->alat_angkut;
            $instansi = $e->instansi;
            $akun = $e->akun;
          }
        ?>

        <div class="box-body">
            <form method="post" accept-charset="utf-8" action="<?=base_url();?>perjalanan/exeEdit/<?=$this->uri->segment(3)?>" role="form" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">No Surat :</label>
                    <div class="col-sm-6">
                      <input type="text"  class="form-control" name="txtNoSurat" value="<?=$no_surat;?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dasar :</label>
                  <div class="col-sm-10">
                  <textarea name="editor1" id="editor1" name="txtDasar">
                  	<?=$dasar;?>
                  </textarea>
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tempat Berangkat :</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="txtTempatBerangkat" required="" value="<?=$tempat_berangkat;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tempat Tujuan :</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="txtTempatTujuan" required="" value="<?=$tempat_tujuan;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Maksud Perjalanan :</label>
                  <div class="col-md-8">
                    <textarea  name="txtMaksudPerjalanan" class="form-control"><?=$maksud_perjalanan;?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Untuk :</label>
                  <div class="col-md-10">
                  <textarea name="editor2" id="editor2" name="txtUntuk">
                   <?=$untuk;?>
                  </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tanggal Berangkat :</label>
                  <div class="col-md-3">
                    <input type="date" class="form-control datepicker" name="txtTglBerangkat" required="" value="<?=$tgl_berangkat;?>">
                  </div>
                  <label class="col-md-2 control-label">Tanggal Kembali :</label>
                  <div class="col-md-3">
                    <input type="date" class="form-control datepicker" name="txtTglKembali" required="" value="<?=$tgl_kembali;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tingkat Biaya :</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="txtTingkatBiaya" required="" value="<?=$tingkat_biaya;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Alat Angkut :</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="txtAlatAngkut" required="" value="<?=$alat_angkut;?>">
                  </div>
                </div>
                <hr/>
                <div class="form-group">
                  <label class="col-md-3 control-label">Kuasa Pengguna Anggararan (KPA) :</label>
                  <div class="col-md-6">
                  <select class="form-control" name="txtKpa" required="">
                     <?php foreach ($kpa as $p) { ?>

                      <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>

                    <?php } ?>
                      <optgroup label="Kepala Dinas">
                      <?php
                        foreach ($getPenugas1 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>
                      <optgroup label="Sekretaris">
                      <?php
                        foreach ($getPenugas2 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>
                      <optgroup label="Kepala Bidang">
                      <?php
                        foreach ($getPenugas3 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>

                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Penugas :</label>
                  <div class="col-md-6">
                  <select class="form-control" name="txtPenugas" required="">
                    <?php foreach ($penugas as $p) { ?>

                    <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>

                    <?php } ?>
                      <optgroup label="Kepala Dinas">
                      <?php
                        foreach ($getPenugas1 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>
                      <optgroup label="Sekretaris">
                      <?php
                        foreach ($getPenugas2 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>
                      <optgroup label="Kepala Bidang">
                      <?php
                        foreach ($getPenugas3 as $p) {
                          ?>
                          <option value="<?php echo $p->nip; ?>"><?php echo $p->nama; ?> (<?php echo $p->tingkatan; ?> <?php echo $p->bidang; ?>)</option>
                          <?php
                        }
                      ?>
                      </optgroup>

                  </select>
                  </div>
                </div>
                <hr/>
                <div class="form-group">
                  <label class="col-md-3 control-label">Instansi :</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="txtInstansi" required="" value="<?=$instansi;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Akun :</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="txtAkun" required="" value="<?=$akun;?>">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?=base_url();?>perjalanan/index" class="btn btn-danger">Cancel</a>
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