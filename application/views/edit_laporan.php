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
          
          <?php
          foreach ($editData as $k) {
            $judul = $k->judul;
            $isi = $k->isi;
          }
          ?>

      <form method="post" accept-charset="utf-8" action="<?=base_url();?>laporan/exeEdit/<?=$this->uri->segment(3);?>" role="form" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-1 control-label">Judul :</label>
                    <div class="col-sm-11">
                      <input type="text"  class="form-control" name="txtJudul" value="<?=$judul;?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label">Isi :</label>
                  <div class="col-sm-11">
                    <textarea name="editor1" id="editor1" style="height: 500px;">
                      <?=$isi;?>
                    </textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?=base_url();?>laporan/data" class="btn btn-danger">Cancel</a>
              </div>
            </form>


    </section>
        </div>
        <!-- /.box-body -->



        
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->