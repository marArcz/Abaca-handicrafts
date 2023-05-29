<?php require '../shared/session.php' ?>
<?php
$selected_category = isset($_GET['category']) ? $_GET['category'] : 'All';
?>

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
    <title>Products</title>
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
        <?php $header_title = "Products" ?>
        <?php include '../shared/header.php' ?>
        <!-- header -->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include '../shared/sidebar.php' ?>

        <!-- content -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-0">
                    <div class="card-body">
                        <ul class=" nav-elegant">
                            <li class="<?= $selected_category == 'All' ? 'active' : '' ?>">
                                <?php
                                $get_count = $pdo->query('SELECT COUNT(*) FROM products');
                                $product_count = $get_count->fetch();
                                ?>
                                <a href="?category=All">
                                    <span class="me-2">
                                        All
                                    </span>
                                    <?php if ($product_count[0] > 0) : ?>
                                        <span class="badge text-bg-dark-brown text-light fw-bold badge-sm">
                                            <?= $product_count[0] ?>
                                        </span>
                                    <?php endif ?>
                                </a>
                            </li>
                            <?php
                            $query = $pdo->query('SELECT * FROM categories');
                            while ($row = $query->fetch()) {
                                $get_count = $pdo->prepare('SELECT COUNT(*) FROM products WHERE category_id = ?');
                                $get_count->execute([$row['id']]);
                                $product_count = $get_count->fetch();
                            ?>
                                <li class="<?= $row['category_name'] == $selected_category ? 'active' : '' ?>">
                                    <a href="?category=<?= $row['category_name'] ?>">
                                        <span class="me-2">
                                            <?= $row['category_name'] ?>
                                        </span>
                                        <?php if ($product_count[0] > 0) : ?>
                                            <span class="badge text-bg-dark-brown text-light fw-bold badge-sm">
                                            <?= $product_count[0] ?>
                                        </span>
                                        <?php endif ?>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Product List</h5>
                        <a href="add-product.php" class=" btn btn-primary btn-sm"><i class="bx bx-plus"></i> New Product</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // get categories
                                    if ($selected_category == 'All') {
                                        $query = $pdo->query('SELECT products.*,categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id');
                                    } else {
                                        $query = $pdo->prepare('SELECT products.*,categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE categories.category_name = ?');
                                        $query->execute([$selected_category]);
                                    }
                                    $i = 1;
                                    while ($row = $query->fetch()) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center ">
                                                    <img src="../<?= $row['image'] ?>" class="img-fluid me-2" width="50" alt="">
                                                    <div>
                                                        <p class="my-1 fs-18 fw-bold"><?= $row['product_name'] ?></p>
                                                        <?php if ($row['is_featured']) : ?>
                                                            <span class="badge text-primary bgl-primary badge-sm">Featured</span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>₱<?= $row['price'] ?>.00</td>
                                            <td>
                                                <p class="my-1 text-<?= $row['status'] == 0 ? 'danger' : 'success' ?> fw-bold">
                                                    <?= $row['status'] == 0 ? 'Out of stock' : 'Available' ?>
                                                </p>
                                            </td>
                                            <td>
                                                <div class="badge bgl-primary text-primary fw-bold">
                                                    <?= $row['category_name'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="manage-product.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info light" type="button">
                                                    <i class=" bx bx-show bx-xs"></i>
                                                </a>
                                                <a href="../app/products.php?id=<?= $row['id'] ?>" data-id="<?= $row['id'] ?>" class="delete-btn btn btn-sm btn-danger light" type="button">
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
    <?php include '../shared/modals/products-modal.php' ?>
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