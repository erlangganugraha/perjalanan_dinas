
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Pegawai</a></li>
        <li class="active">Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Data Pegawai | <a href="<?=base_url();?>pegawai/add" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Data Pegawai</a></h3>

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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Golongan</th>
                  <th>Jabatan</th>
                  <th>Bidang</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no=0;
                  foreach ($getData as $v) { 
                  $no++;
                ?>
                <tr>
                  <td><?=$no;?></td>
                  <td><?=$v->nip;?></td>
                  <td><?=$v->nama;?></td>
                  <td><?=$v->golongan;?></td>
                  <td><?=$v->jabatan;?></td>
                  <td><?=$v->bidang;?></td>
                  <td><?=$v->status;?></td>
                  <td align="center"><a class="btn btn-primary btn-xs" href="<?=base_url();?>pegawai/edit/<?=$v->id;?>" title="Edit Data"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini ?')" href="<?=base_url();?>pegawai/exeDelete/<?=$v->id;?>" title="Hapus Data"><i class="fa fa-remove"></i></a></td>
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