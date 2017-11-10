<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Perjalanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Pegawai</a></li>
        <li class="active">Detail</li>
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
            foreach ($getData2 as $d) {
              $no_surat = $d->no_surat;
              $maksud_perjalanan = $d->maksud_perjalanan;
              $tingkat_biaya = $d->tingkat_biaya;
              $tempat_berangkat = $d->tempat_berangkat;
              $tempat_tujuan = $d->tempat_tujuan;
              $tgl_b = $d->tgl_berangkat;
              $tgl_berangkat = date("d/M/Y", strtotime($tgl_b));

              $tgl_k = $d->tgl_kembali;
              $tgl_kembali = date("d/M/Y", strtotime($tgl_k));

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
          <address>
            Dari Tanggal : <?=$tgl_berangkat;?><br>
            Sampai : <?=$tgl_kembali;?><br>
            Tempat Berangkat : <?=$d->tempat_berangkat;?><br>
            Tempat Tujuan : <?=$d->tempat_tujuan;?><br>
            Alat Angkut : <?=$d->alat_angkut;?>
          </address>
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>NAMA</th>
              <th>JABATAN</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach ($getData as $k) { $no++;?>
            <tr>
              <td><?=$no;?></td>
              <td><?=$k->nip;?></td>
              <td><?=$k->nama;?></td>
              <td><?=$k->jabatan;?></td>
            </tr>
            <?php } ?>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>-->
          <a href="<?=base_url();?>perjalanan/index" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-back"></i> Kembali
          </a>
        </div>
      </div>
    </section>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->