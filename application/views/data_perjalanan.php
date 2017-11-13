
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Perjalanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Perjalanan</a></li>
        <li class="active">Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Data Perjalanan | <a href="<?=base_url();?>perjalanan/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Perjalanan</a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>-->
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table nameTable table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Maksud Perjalanan</th>
                  <th>Tempat Tujuan</th>
                  <th>Jumlah Orang</th>
                  <th>Tgl Berangkat</th>
                  <th>Tgl Kembali</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  foreach ($getData as $v) { 
                  $no++;

                  $tgl_b = $v->tgl_berangkat;
                  $tgl_berangkat = date("d/M/Y", strtotime($tgl_b));

                  $tgl_k = $v->tgl_kembali;
                  $tgl_kembali = date("d/M/Y", strtotime($tgl_k));
                ?>
                <tr>
                  <td><?=$no;?></td>
                  <td><?=$v->no_surat;?></td>
                  <td><?=$v->maksud_perjalanan;?></td>
                  <td><?=$v->tempat_tujuan;?></td>
                  <td><?=$v->jumlah_orang;?> Orang</td>
                  <td><?=$tgl_berangkat;?></td>
                  <td><?=$tgl_kembali;?></td>
                  <td align="center" width="35%">
                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-cloud-download"></i> SP <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a target="_blank" href="<?=base_url();?>Perjalanan/laporan_sp/<?=$v->id_perjalanan;?>">Dengan KOP</a></li>
                        <li><a target="_blank" href="<?=base_url();?>Perjalanan/laporan_sp2/<?=$v->id_perjalanan;?>">Tanpa Kop</a></li>
                      </ul>
                    </div>

                    <!-- Single button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-cloud-download"></i> SPD <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a target="_blank" href="<?=base_url();?>Perjalanan/pdfSpd/1/<?=$v->id_perjalanan;?>">Dengan KOP</a></li>
                        <li><a target="_blank" href="<?=base_url();?>Perjalanan/pdfSpd/2/<?=$v->id_perjalanan;?>">Tanpa Kop</a></li>
                      </ul>
                    </div>

                  <a class="btn btn-success btn-sm" href="<?=base_url();?>perjalanan/detail/<?=$v->id_perjalanan;?>" title="Detail Data"> <i class="glyphicon glyphicon-list"></i> Detail</a> 

                  <a class="btn btn-danger btn-sm" href="<?=base_url();?>perjalanan/edit/<?=$v->id_perjalanan;?>" title="Detail Data"> <i class="glyphicon glyphicon-pencil"></i> Edit</a> 

                  <a class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini ?')" href="<?=base_url();?>perjalanan/exeDelete/<?=$v->id_perjalanan;?>" title="Hapus Data"><i class="fa fa-remove"></i> Hapus</a></td>
                </tr>

                <?php } ?>
                
                </tbody>
              </table>
            </div>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->