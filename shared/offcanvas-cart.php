<div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvas-cart" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i class="material-icon text-orange">shopping_cart</i> Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">
            <form action="" id="add-to-cart-form">
                <div class="row justify-content-center mb-3">
                    <div class="col-md">
                        <img data-placeholder="assets\images\products\placeholder.jpg" src="assets\images\products\placeholder.jpg" class=" img-fluid img-thumbnail product-image" alt="">
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <div>
                        <p class="my-1 fs-5 fw-bold text-orange product-name">Abaca Bag</p>
                        <p class="my-1 fs-6 product-price">₱120</p>
                    </div>
                    <div class="ms-auto">
                        <a href="view-product.php" data-url="view-product.php" class="link-dark">
                            <i class="bx bx-fullscreen"></i>
                        </a>
                    </div>
                </div>
                <p class="form-text">
                    Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.
                </p>
                <div class="mt-3 text-end">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" class="form-control text-center" required value="1" min="1">
                </div>
            </form>
        </div>
    </div>
    <div class="offcanvas-footer">
        <div class="d-grid">
            <button type="button" id="add-to-cart-btn" class="btn btn-dark rounded-0">Add to cart</button>
        </div>
    </div>
</div>