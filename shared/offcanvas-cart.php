<div class="offcanvas offcanvas-bottom " tabindex="-1" id="offcanvas-cart" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i class="material-icon text-orange">shopping_cart</i> Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                 
                    <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                        <div class="col-md">
                            <!-- <img src="./assets/images/products/dress.png" class="img-fluid img-thumbnail bg-light shadow-sm bg-light" alt=""> -->
                            <div id="view-product-carousel" class="carousel slide " data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                        <div class="circle"></div>
                                    </button>
                                    <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                                        <div class="circle"></div>

                                    </button>
                                    <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                                        <div class="circle"></div>

                                    </button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="./assets/images/products/Chandelier1.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/products/Chandelier2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/products/Chandelier3.png" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1 mt-3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p class="my-1 fs-1">Abaca Dress</p>
                            <div>
                                <span class="badge text-bg-orange">Dress</span>
                            </div>
                            <p class="mb-1 mt-3">
                                Color: Pink, Brown
                            </p>
                            <p class="mb-1 mt-3 fw-bold fs-5">₱ 2,000</p>

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="">
                                            <div class="mb-3">
                                                <div class="text-center">
                                                    <label for="" class="form-label"><small>Quantity</small></label>
                                                </div>
                                                <input type="number" class="form-control text-center rounded-pill bg-light" value="1" min="1">
                                            </div>

                                            <div class="d-grid">
                                                <button class="btn btn-dark-brown rounded-pill" type="button">Add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
        <div class="d-grid">
            <button type="button" id="add-to-cart-btn" class="btn btn-dark rounded-0">Add to cart</button>
        </div>
    </div>
</div>