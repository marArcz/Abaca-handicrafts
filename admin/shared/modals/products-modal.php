<!-- add Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header px-3">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../app/categories.php" method="post">
                <div class="modal-body px-3">
                    <div class="row">
                        <div class="col-md">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <img src="" alt="" class="img-fluid" id="add-product-preview">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Main Image:</label>
                                <input type="file" name="image" class="photo-chooser form-control-file form-control" data-preview="#add-product-preview">
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
                                        while($row = $query->fetch()){
                                            ?>
                                            <option value="<?= $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class=" text-dark">Description:</label>
                                <textarea name="description" placeholder="Product description..." class=" form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-3">
                    <button type="button" class="btn btn-dark light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>