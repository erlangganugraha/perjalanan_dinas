<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Perjalanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"></i> Perjalanan</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Default box -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Form Input Perjalanan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>-->
          </div>
        </div>
        <div class="box-body">
            <form method="post" accept-charset="utf-8" action="<?=base_url();?>perjalanan/exeAdd" role="form" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">No Surat :</label>
                    <div class="col-sm-6">
                      <input type="text"  class="form-control" name="txtNoSurat">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dasar :</label>
                  <div class="col-sm-10">
                  <textarea name="editor1" id="editor1" name="txtDasar">
                  	<ol>
          						<li>Peraturan Gubernur Jawa Barat Nomor 102 Tahun 2016 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Tahun Anggaran 2017 (Berita Daerah Provinsi Jawa Barat Tahun 2016 Nomor 102 Seria A); dan (baku).</li>
          						<li>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA SKPD) Tahun 2017 Nomor : 1.16.01.55.019.5.2 Kegiatan Pemutakhiran Konten Website Jabarprov.go.id</li>
          					</ol>
                  </textarea>
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tempat Berangkat :</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="txtTempatBerangkat" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tempat Tujuan :</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="txtTempatTujuan" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Maksud Perjalanan :</label>
                  <div class="col-md-8">
                    <textarea  name="txtMaksudPerjalanan" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Untuk :</label>
                  <div class="col-md-10">
                  <textarea name="editor2" id="editor2" name="txtUntuk">
                    <ol>
                      <li>Melaksanakan Peliputan Khusus dan Hunting Potensi Wisata Gunung Tangkuban Perahu, untuk Pemutakhiran Media Jabarprov.go.id pada tanggal <em><strong>6 Juli 2017</strong></em> di Kabupaten Subang.</li>
                      <li>Pembiayaan dibebankan pada Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Tahun 2017. 1.16.01 Dinas Komunikasi dan Informatika Provinsi Jawa Barat Sub Organisasi 1.16.01.04 Bidang Aplikasi Informatika (55.019) Kegiatan Pemutakhiran Konten Website Jabarprov.go.id.</li>
                      <li>Melaksanakan tugas ini dengan sebaik-baiknya dan penuh rasa tanggung jawab serta memberikan laporan kegiatan sesuai dengan ketentuan berlaku.</li>
                    </ol>
                  </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tanggal Berangkat :</label>
                  <div class="col-md-3">
                    <input type="date" class="form-control datepicker" name="txtTglBerangkat" required="" >
                  </div>
                  <label class="col-md-2 control-label">Tanggal Kembali :</label>
                  <div class="col-md-3">
                    <input type="date" class="form-control datepicker" name="txtTglKembali" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tingkat Biaya :</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="txtTingkatBiaya" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Alat Angkut :</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="txtAlatAngkut" required="">
                  </div>
                </div>
                <hr/>
                <div class="form-group">
                  <label class="col-md-3 control-label">Kuasa Pengguna Anggararan (KPA) :</label>
                  <div class="col-md-6">
                  <select class="form-control" name="txtKpa" required="">
                    <option selected="selected" disabled="disabled"></option>
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
                    <option selected="selected" disabled="disabled"></option>
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
                    <input type="text" class="form-control" name="txtInstansi" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Akun :</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="txtAkun" required="">
                  </div>
                </div>
                <hr/>

                <div class="form-group">
                <label class="col-md-2 control-label">Pilih Pelaksana :</label>
                <div class="col-md-10">
                <div class="panel panel-primary" >
                  <div class="panel-body" style="padding:20px;">
                    
                    <div class="form-group">
                    <div class="input-group">
		                <span class="input-group-addon"><i class="fa fa-search"></i></span>
		                <input class="form-control" placeholder="Cari Berdasarkan Nama" id="txtSearch" type="text" onkeyup="search()" >
		                </div>

                  <br/>
                      <div class="table-responsive">
                        <table data-order='[[ 2, "asc" ]]' class="table pelaksanaTable table-bordered table-striped" id="dataPelaksana">
                            <thead>
                            <tr>
                              <th>Pilih</th>
                              <th>Nama</th>
                              <th>Jabatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $no=0;
                              foreach ($getData as $v) { 
                              $no++;
                            ?>
                            <tr>
                              <td align="center"><input type="checkbox" name="txtPelaksana[]" value="<?=$v->nip;?>"></td>
                              <td><?=$v->nama;?></td>
                              <td><?=$v->jabatan;?></td>
                            </tr>

                            <?php } ?>
                            
                            </tbody>
                          </table>
                        </div>

                    </div>
                  </div>
                </div>
                </div>
                </div>

                <script>
        					function search() {
        					  // Declare variables
        					  var input, filter, table, tr, td, i;
        					  input = document.getElementById("txtSearch");
        					  filter = input.value.toUpperCase();
        					  table = document.getElementById("dataPelaksana");
        					  tr = table.getElementsByTagName("tr");

        					  // Loop through all table rows, and hide those who don't match the search query
        					  for (i = 0; i < tr.length; i++) {
        					    td = tr[i].getElementsByTagName("td")[2];
        					    if (td) {
        					      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        					        tr[i].style.display = "";
        					      } else {
        					        tr[i].style.display = "none";
        					      }
        					    }
        					  }
        					}
        				</script>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
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