<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perjalanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Laporan</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Perjalanan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>-->
          </div>
        </div>
        <div class="box-body">
           <section class="invoice">
           <?php
            foreach ($getData as $d) {
              $no_surat = $d->no_surat;
              $maksud_perjalanan = $d->maksud_perjalanan;
              $tingkat_biaya = $d->tingkat_biaya;
              $tempat_berangkat = $d->tempat_berangkat;
              $tempat_tujuan = $d->tempat_tujuan;
              $tgl_berangkat = $d->tgl_berangkat;
              $tgl_kembali = $d->tgl_kembali;
              $alat_angkut = $d->alat_angkut;
            }
           ?>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-mail"></i> No Surat : <?=$no_surat;?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
          Maksud Perjalanan : <strong><?=$maksud_perjalanan;?></strong><br>
          <!--<address>
            Dari Tanggal : <?=$tgl_berangkat;?><br>
            Sampai : <?=$tgl_kembali;?><br>
            Tempat Berangkat : <?=$d->tempat_berangkat;?><br>
            Tempat Tujuan : <?=$d->tempat_tujuan;?><br>
            Alat Angkut : <?=$d->alat_angkut;?>
          </address>-->
        </div>
      </div>
      <!-- /.row -->
      <hr/>

      <form method="post" accept-charset="utf-8" action="<?=base_url();?>laporan/exeAdd/<?=$this->uri->segment(3);?>" role="form" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Judul :</label>
                    <div class="col-sm-11">
                      <input type="text"  class="form-control" name="txtJudul">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label">Isi :</label>
                  <div class="col-sm-11">
                    <textarea name="editor1" id="editor1" style="height: 500px;">
                      
                    </textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?=base_url();?>laporan/index" class="btn btn-danger">Cancel</a>
              </div>
            </form>


    </section>
        </div>
        <!-- /.box-body -->



        
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->