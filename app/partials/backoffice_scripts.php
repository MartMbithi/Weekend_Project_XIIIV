<script src="../public/backoffice/libs/jquery/dist/jquery.min.js"></script>
<script src="../public/backoffice/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../public/backoffice/js/sidebarmenu.js"></script>
<script src="../public/backoffice/js/app.min.js"></script>
<script src="../public/backoffice/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../public/backoffice/libs/simplebar/dist/simplebar.js"></script>
<script src="../public/backoffice/js/dashboard.js"></script>
<!-- Sweet Alerts -->
<script src="../public/backoffice/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Data Table Export -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('.report_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    $(document).ready(function() {
        $('.data').DataTable();
        $('.data td').css('white-space', 'initial')
    });
</script>
<!-- Load Alerts -->
<?php include('alerts.php'); ?>