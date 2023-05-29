<?php require '../shared/session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Categories</title>
    <?php include '../shared/head.php' ?>

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!-- header -->
        <?php $header_title = "Categories" ?>
        <?php include '../shared/header.php' ?>
        <!-- header -->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include '../shared/sidebar.php' ?>

        <!-- content -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Categories</h5>
                        <button class=" btn btn-primary btn-sm" data-target="#add-modal" data-toggle="modal" type="button"><i class="bx bx-plus"></i> New Category</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // get categories
                                    $query = $pdo->query('SELECT * FROM categories');
                                    $i = 1;
                                    while ($row = $query->fetch()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['category_name'] ?></td>
                                            <td>
                                                <img src="../<?= $row['image'] ?>" width="70" alt="<?= $row['category_name'] ?>">
                                            </td>
                                            <td>
                                                <button data-id="<?= $row['id'] ?>" data-target='#edit-modal' data-toggle='modal' class="btn btn-sm btn-info light" type="button">
                                                    <i class=" bx bx-pencil bx-xs"></i>
                                                </button>
                                                <a href="../app/categories.php?id=<?= $row['id'] ?>" data-id="<?= $row['id'] ?>" class="delete-btn btn btn-sm btn-danger light" type="button">
                                                    <i class=" bx bx-trash bx-xs"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <?php include '../shared/modals/categories-modal.php' ?>
    <?php include '../shared/scripts.php' ?>
    <script>
        $("#table").dataTable({
            language: {
                paginate: {
                    next: '<i class=" bx bx-fast-forward" aria-hidden="true"></i>',
                    previous: '<i class="bx bx-rewind" aria-hidden="true"></i>'
                }
            }
        });

        $("#edit-modal").on('show.bs.modal', function(e) {
            const id = $(e.relatedTarget).data('id');

            $.ajax({
                url: "../app/categories.php",
                method: "POST",
                dataType: 'json',
                data: {
                    id,
                    get: true
                },
                success: function(res) {
                    console.log('res: ', res)
                    $("#id").val(id);
                    $('#category').val(res.category_name);
                    $("#edit-preview").attr('src',res.image).data('default',res.image);
                }
            })
        })

        $(".delete-btn").on('click', function(e) {
            e.preventDefault();
            let href = $(this).attr('href')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#eb8153',
                cancelButtonColor: '#6e6e6e',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                   window.location.href = href
                }
            })
        })
    </script>

</body>

</html>