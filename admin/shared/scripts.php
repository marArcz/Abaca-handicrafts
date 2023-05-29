<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../../vendor/owl-carousel/owl.carousel.js"></script>
<script src="../../assets/js/admin/custom.min.js"></script>
<script src="../../assets/js/admin/deznav-init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<!-- <script src="../assets/js/styleSwitcher.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="../../node_modules/notiflix/dist/notiflix-aio-3.2.6.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../../assets/js/admin/main.js"></script>

<script>
    Notiflix.Confirm.init({
        titleColor: '#ff281b',
        okButtonBackground: '#ff281b',
    })
    Notiflix.Report.init({
        success: {
            backOverlay: true,
            backOverlayColor: 'rgba(0,0,0,0.5)',
        },
        failure: {
            backOverlay: true,
            backOverlayColor: 'rgba(0,0,0,0.5)',
        }
    })
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        Swal.fire({
            title:'Success!',
            text:'<?= $_SESSION['success'] ?>',
            icon:'success',
            confirmButtonColor: '#eb8153',
            confirmButtonText:"Okay"
        })
    <?php
        unset($_SESSION['success']);
    } elseif (isset($_SESSION['error'])) {
    ?>
        Swal.fire({
            title:'Failed!',
            text:'<?= $_SESSION['error'] ?>',
            icon:'error',
            confirmButtonColor: '#eb8153',
            confirmButtonText:"Okay"
        })
    <?php
        unset($_SESSION['error']);
    }
    ?>
</script>