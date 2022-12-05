 <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Upload Surah</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upload Data</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <button class="btn btn-success d-none d-md-inline-block text-white" data-toggle="modal" data-target="#tambahDataModal"><span class="fas fa-plus-circle"></span> Tambah data</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->session->flashdata('upload') ?>
            <?php echo $this->session->flashdata('simpan') ?>
            <?php echo $this->session->flashdata('hapus') ?>
            <?php echo $this->session->flashdata('edit') ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="card">
            <div class="border-bottom">
              <h3 class="card-header mb-0">Daftar Surah</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Surah</th>
                            <th>Jumlah Ayat</th>
                            <th>File</th>
                            <th>time</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($surah as $s) :
                    ?>
                        <tr>
                            <td><?=$s->nama_surah?></td>
                            <td style="width: 120px;"><center><?=$s->jml_ayat?></center></td>
                            <td><a href="<?=base_url('assets/files/'.$s->file)?>" target="_blank" rel="noopener noreferrer">Lihat File</a></td>
                            <td><?=$s->time?></td>
                            <td style="width: 90px;"><center>
                                <button style="font-size: 14px; padding: 8px;" class="btn btn-warning edit" data-main="<?=$s->id?>"><i class="fas fa-edit"></i></button>&nbsp;
                                <button style="font-size: 14px; padding: 8px;" class="btn btn-danger hapus" data-main="<?=$s->id?>"><i  class="fas fa-trash-alt"></i></button>
                            </center></td>
                        </tr>
                    <?php endforeach ?>
                            
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Surah</th>
                            <th>Jumlah Ayat</th>
                            <th>File</th>
                            <th>time</th>
                            <th>Tools</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- -------------------------------------------------------------- -->
          <!-- End PAge Content -->
          <!-- -------------------------------------------------------------- -->
        </div>

        <!-- Modal Input -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Input Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/upload_data/input'); ?>
                            <div class="form-group">
                                <label for="namaSurahInput">Nama Surah</label>
                                <input type="text" class="form-control" id="namaSurahInput" name="nama_surah" placeholder="Nama Surah..." required>
                            </div>
                            <div class="form-group">
                                <label for="jmlAyatInput">Jumlah Ayat</label>
                                <input type="number" class="form-control" id="jmlAyatInput" name="jml_ayat" placeholder="Jumlah Ayat..." required>
                            </div>
                            <div class="form-group">
                                <label for="fileInput">Upload File</label>
                                <input type="file" class="form-control" id="fileInput" name="file" accept="application/pdf" required>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                    </div>
                </div>
            </div>


            <!-- Modal Edit -->
            <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                        <button type="button" class="close editBatal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/upload_data/edit'); ?>
                            <div class="form-group">
                            <input type="hidden" readonly class="form-control" id="kodeSurahEdit" name="kode_surah" required>
                                <label for="namaSurahEdit">Nama Surah</label>
                                <input type="text" class="form-control" id="namaSurahEdit" name="nama_surah" placeholder="Nama Surah..." required>
                            </div>
                            <div class="form-group">
                                <label for="jmlAyatEdit">Jumlah Ayat</label>
                                <input type="number" class="form-control" id="jmlAyatEdit" name="jml_ayat" placeholder="Jumlah Ayat..." required>
                            </div>
                            <div class="form-group">
                                <label for="fileEdit">Upload File</label>
                                <input type="file" class="form-control" id="fileEdit" name="file" accept="application/pdf">
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary editBatal" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                    </div>
                </div>
            </div>


            <!-- Modal Delete -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" > Yakin Ingin Menghapus Data?</h5>
                            <button type="button" class="close deleteBatal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary deleteBatal" data-dismiss="modal">Batal</button>
                            <button type="button" id="deleteConfirm" class="btn btn-primary">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            