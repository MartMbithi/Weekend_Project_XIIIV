<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="../public/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../public/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../public/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo $base_dir; ?>../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_dir; ?>../public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<!-- Load alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success('<?php echo $success; ?>')
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        toastr.error('<?php echo $err; ?>')
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        toastr.warning('<?php echo $info; ?>')
    </script>
<?php }
require_once('../modals/logout.php'); ?>
<script>
    /* Prevent double submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    /* Init Data tables */
    $('.data_table').DataTable({
        "responsive": true,
        "autoWidth": false,

    });

    /* Set active class */
    $(document).ready(function() {
        var url = window.location;
        $('li.nav-item a[href="' + url + '"]').parent().addClass('active');
        $('li.nav-item a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
    });

    /* Init Select2 */
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    /* Date picker */
    $('.date_picker_range').daterangepicker()
    /* Date picker */
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-7d'
    });

    /* Filter DP */
    $('.filter_dp').datepicker({
        format: 'mm/dd/yyyy'
    });

    function GetHouseDetails(val) {
        $.ajax({
            //get account rates
            type: "POST",
            url: "ajax.php",
            data: 'TenantDetails=' + val,
            success: function(data) {
                //alert(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
                $('#AccountRates').val(data);
            }
        });

    }

    /* Print elements in a div */
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }

    /* Export data tables */
    $(document).ready(function() {
        $('.export_dt').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>