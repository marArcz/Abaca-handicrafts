<div class="modal fade" id="view-product-modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 ">
            <div class="modal-header border-bottom border-orange border-2">
                <h6 class="modal-title">Product Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 position-relative">
                <div class="row">
                    <div class="col-md">
                        <!-- <img src="./assets/images/products/bag3.png" class="img-fluid mb-3" alt=""> -->
                        <div id="view-product-modal-carousel" class="carousel slide " data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#view-product-modal-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <div class="circle"></div>
                                </button>
                                <button type="button" data-bs-target="#view-product-modal-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                                    <div class="circle"></div>

                                </button>
                                <button type="button" data-bs-target="#view-product-modal-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                                    <div class="circle"></div>

                                </button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../assets/images/products/Chandelier1.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../assets/images/products/Chandelier2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../assets/images/products/Chandelier3.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <p class="fs-4 fw-light text-dark-brown">Brown and Pink Kimono Dress</p>
                        <p class="my-1 fw-bold text-dark">Php. 5,000</p>
                        <div class="mt-3 mb-5">
                            <p class="text-secondary">
                                <small>Color: Brown, Pink</small>
                            </p>
                            <div class="col-4">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" class="form-control rounded-0" min="1" value="1">
                            </div>
                        </div>

                        <div class="mt-3">
                            <button class="col-12 mb-5 btn btn-dark-brown rounded-0 text-light fw-light" type="button">Add to Cart</button>
                            <a href="view-product.php" class="link-dark fw-lighter">View more details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>