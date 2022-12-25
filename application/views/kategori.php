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
                        <h3 class="page-title mb-0 p-0">Kategori</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <button class="btn btn-success d-none d-md-inline-block text-white" data-toggle="modal" data-target="#tambahDataModal"><span class="fas fa-plus-circle"></span> Tambah Kategori</button>
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
              <h3 class="card-header mb-0">Daftar Kategori</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>time</th>
                            <th>Nama Kategori</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($kategori as $k) :
                    ?>
                        <tr>
                            <td><?=$k->time?></td>
                            <td><center><?=$k->kategori?></center></td>
                            <td style="width: 90px;"><center>
                                <button style="font-size: 14px; padding: 8px;" class="btn btn-warning editKategori" data-main="<?=$k->id?>"><i class="fas fa-edit"></i></button>&nbsp;
                                <button style="font-size: 14px; padding: 8px;" class="btn btn-danger hapusKategori" data-main="<?=$k->id?>"><i  class="fas fa-trash-alt"></i></button>
                            </center></td>
                        </tr>
                    <?php endforeach ?>
                            
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>time</th>
                            <th>Nama Kategori</th>
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
                        <?php echo form_open_multipart('admin/kategori/input'); ?>
                            <div class="form-group">
                                <label for="namaKategoriInput">Nama Kategori</label>
                                <input type="text" class="form-control" id="namaKategoriInput" name="kategori" placeholder="Nama Kategori..." required>
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
                        <?php echo form_open_multipart('admin/kategori/edit'); ?>
                            <div class="form-group">
                            <input type="hidden" readonly class="form-control" id="kodeKategoriEdit" name="kode_kategori" required>
                                <label for="namaKategoriEdit">Nama Kategori</label>
                                <input type="text" class="form-control" id="namaKategoriEdit" name="kategori" placeholder="Nama Kategori..." required>
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
            