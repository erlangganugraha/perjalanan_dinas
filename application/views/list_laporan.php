
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Laporan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Laporan</a></li>
        <li class="active">Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
         <div class="box-header with-border">
          <h3 class="box-title">Form Data Laporan | <a href="<?=base_url();?>laporan/index" class="btn btn-danger"><i class="fa fa-plus"></i> Input Baru Laporan Perjalanan</a></h3>

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
                  <th>Action</th>
                  <th>Judul Laporan</th>
                  <th>Maksud Perjalanan</th>
                  <th>Tgl Berangkat</th>
                  <th>Tgl Kembali</th>
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
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-cloud-download"></i> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a target="_blank" href="<?=base_url();?>laporan/generate_pdf/<?=$v->id_laporan;?>">Download Laporan</a></li>
                        
                      </ul>
                    </div>
                    <a class="btn btn-primary btn-xs" href="<?=base_url();?>laporan/edit/<?=$v->id_laporan;?>" title="Edit Data"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini ?')" href="<?=base_url();?>laporan/exeDelete/<?=$v->id_laporan;?>" title="Hapus Data"><i class="fa fa-remove"></i></a>
                  </td>
                  <td><?=substr($v->judul, 0, 40);?> ...</td>
                  <td><?=$v->maksud_perjalanan;?></td>
                  <td><?=$tgl_berangkat;?></td>
                  <td><?=$tgl_kembali;?></td>

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