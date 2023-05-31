<!-- add Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header px-3">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../app/categories.php" enctype="multipart/form-data" method="post">
                <div class="modal-body px-3">
                    <div class="form-group">
                        <label for="" class=" text-dark">Category name:</label>
                        <input type="text" class="form-control" placeholder="Enter new category..." name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="" class=" text-dark">Choose image:</label>
                        <input type="file" accept="image/*" data-preview="#add-preview" class=" photo-chooser form-control" name="image" required>
                    </div>
                    <div class="mb-3">
                        <img src="" id="add-preview" style="max-height:170px" class=" img-fluid" alt="">
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

<!-- edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header px-3">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../app/categories.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" id='id'>
                <div class="modal-body px-3">
                    <div class="form-group">
                        <label for="" class=" text-dark">Category name:</label>
                        <input type="text" class="form-control" placeholder="Enter new category..." name="category" id="category" >
                    </div>
                    <div class="form-group">
                        <label for="" class=" text-dark">Choose image:</label>
                        <input type="file" accept="image/*" data-preview="#edit-preview" class="photo-chooser form-control" name="image" >
                    </div>
                    <div class="mb-3">
                        <img src="" id="edit-preview" style="max-height:170px" class=" img-fluid" alt="">
                    </div>

                </div>
                <div class="modal-footer px-3">
                    <button type="button" class="btn btn-dark light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>