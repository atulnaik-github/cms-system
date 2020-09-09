    <script src="<?= site_url('assets/userarea/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/vendors/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/assets/js/main.js'); ?>"></script>


    <script src="<?= site_url('assets/userarea/vendors/chart.js/dist/Chart.bundle.min.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/assets/js/dashboard.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/assets/js/widgets.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/vendors/jqvmap/dist/jquery.vmap.min.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
    <script src="<?= site_url('assets/userarea/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>

    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= site_url('assets/userarea/')?>assets/js/init-scripts/data-table/datatables-init.js"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    <script>
      setTimeout(function(){
        $('.alert-messages').delay(150).fadeOut('slow');
    }, 5000);
    </script>

</body>

</html>