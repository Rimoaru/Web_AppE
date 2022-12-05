            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="<?=base_url()?>assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>assets/js/pages/dashboards/dashboard1.js"></script>
    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js" defer></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //menjalankan dataTable dan menhilangkan colomn time kemudian di sort desc berdasarkan time
            $('#dataTable').DataTable({
                order: [[3, 'desc']]
            }).column(3).visible(false);
        });

        $(document).on('click', '.hapus', function (event){
            var kode = $(this).data('main');
            $('#confirmModal').modal('show');

            $('.deleteBatal').on('click', function(){
                $('#confirmModal').modal('hide');
            });
            $('#deleteConfirm').on('click', function(){
                window.location.replace("<?php echo base_url('admin/upload_data/delete/"+kode+"')?>");
            });
        });

        $(document).on('click', '.edit', function (event){
            var kode = $(this).data('main');
            $('#editDataModal').modal('show');

            $('.editBatal').on('click', function(){
                $('#editDataModal').modal('hide');
            });
            
            $.ajax({
                type : "POST",
                dataType:"JSON",
                url: "<?php echo base_url();?>admin/upload_data/getDataEdit",
                data : {kode : kode},
                success : function(data){
                     console.log(data);
                    $('#kodeSurahEdit').val(data.id);
                    $('#namaSurahEdit').val(data.nama_surah);
                    $('#jmlAyatEdit').val(data.jml_ayat);
                }
                
            });
        });


    </script>
</body>

</html>