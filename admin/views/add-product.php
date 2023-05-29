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
    <title>Dashboard </title>
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
        <?php $header_title = "Adding New Product" ?>
        <?php include '../shared/header.php' ?>
        <!-- header -->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include '../shared/sidebar.php' ?>

        <!-- content -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="d-flex mb-3 align-items-center">
                    <a href="products.php">
                        <i class=" bx bx-arrow-back"></i>
                    </a>
                    <p class=" fs-16 my-1 me-auto ms-auto">Add New Product</p>
                </div>
                <form action="../app/add-product.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <p class="my-1 fs-16 ">Product Details</p>
                            <div class="ms-auto">
                                <button class="btn btn-success " type="submit" name="add">Save Product <i class=" bx bx-right-arrow-alt"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="#view-image-modal" data-toggle="modal">
                                        <div class="image-container">
                                            <img src="../../assets/images/default.png" alt=""  class="img-fluid" id="add-product-preview">
                                        </div>
                                    </a>
                                    <div class="form-group text-center">
                                        <label for="">Main Image:</label>
                                        <input type="file" name="image" required class="photo-chooser form-control-file form-control" data-preview="#add-product-preview">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class=" text-dark">Product name:</label>
                                        <input type="text" class="form-control" placeholder="Enter product name..." name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class=" text-dark">Price:</label>
                                        <input type="number" class="form-control" placeholder="Enter price..." name="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class=" text-dark">Category:</label>
                                        <select name="category_id" class=" form-select" id="" required>
                                            <option value="">Select One</option>
                                            <?php
                                            $query = $pdo->query('SELECT * FROM categories');
                                            while ($row = $query->fetch()) {
                                            ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class=" text-dark">Description:</label>
                                        <textarea name="description" placeholder="Product description..." class=" form-control" rows="5"></textarea>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <div class="card border">
                                            <div class="card-header">
                                                <p class="my-1">Additional Images</p>
                                                <button class="btn btn-sm btn-primary" type="button" id="btn-add-photo">
                                                    <i class=" bx bx-plus"></i> Add
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-none" id="image-input-row">

                                                </div>
                                                <div class="row" id="product-image-row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="checkbox" id="featured-checkbox" name="featured" class="">
                                        <label for="featured-checkbox">Feature this product.</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>




    <!-- scripts -->
    <?php include '../shared/modals/image-modal.php' ?>
    <?php include '../shared/scripts.php' ?>
    <script>
        var imageInputCtr = 0;

        function newImagePreview(img, index) {
            let imagePreview = $(`   <div class="col-md-3">
                <div class="product-image">
                    <div class="controls">
                        <div class='inner'>
                            <button class="btn btn-sm btn-danger light btn-remove-image rounded-0" type="button">
                                <i class=" bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                    <a href="#view-image-modal" data-toggle='modal'>
                        <div class="image-container sm">
                            <img src="${img}" data-input="#image-input-${imageInputCtr}" data-index="${index}" alt="" class=" img-fluid mb-3 ">
                        </div>
                    </a>
                </div>
            </div>`);

            return imagePreview;
        }

        function initInputChangedHandler() {
            $(".image-input").on('change', function(e) {
                let images = e.target.files;
                console.log('images: ', images)
                let imageRow = $("#product-image-row");
                if (images.length > 0) {
                    for (let x = 0; x < images.length; x++) {
                        let image = images[x];
                        console.log("image: ", image)
                        let imgEl = newImagePreview(URL.createObjectURL(image), x);
                        imageRow.append(imgEl)
                    }
                    initBtnDeleteClickedHandler();

                }else{
                    $(this).remove();
                }

            })
        }

        function initBtnDeleteClickedHandler() {
            $(".btn-remove-image").on("click", function(e) {
                let parent = $(this).parent().parent().parent();
                let imgEl = parent.find('img');
                let index = imgEl.data('index');
                let imageInput = $(imgEl.data('input'));
  
                imageInput.remove();
                parent.parent().remove();
            })
        }

        $("#btn-add-photo").on("click", function(e) {
            imageInputCtr++;
            let row = $("#image-input-row");
            // add input element
            let imageInput = $(`<input accept="image/*" type="file" name="images[]" id="image-input-${imageInputCtr}" class="image-input">`);
            row.append(imageInput)
            initInputChangedHandler();
            imageInput.trigger('click')
        })
    </script>

</body>

</html>