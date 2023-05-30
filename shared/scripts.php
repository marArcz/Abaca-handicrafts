<?php include '../shared/offcanvas-menu.php' ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../node_modules/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
<script src="../assets/js/user-page-loader.js"></script>
<script src="../assets/js/main.js"></script>

<script>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        Notiflix.Report.success(
            'Success',
            "<?= $_SESSION['success'] ?>",
            'Okay',
        );
    <?php
        unset($_SESSION['success']);
    } elseif (isset($_SESSION['error'])) {
    ?>
        Notiflix.Report.failure(
            'Failed',
            "<?= $_SESSION['error'] ?>",
            'Okay',
            {
                backOverlayColor:'rgba(10,10,10,0.5)'
            }
        );
    <?php
        unset($_SESSION['error']);
    }
    ?>
</script>