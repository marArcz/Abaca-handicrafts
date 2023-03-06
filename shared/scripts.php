<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $(function() {
        $("#offcanvas-cart").on('show.bs.offcanvas', function(e) {
            let productCard = $($(e.relatedTarget).data('target'));
            let offcanvas = $(this);
            let productName = productCard.find('.product-name').html();
            let productPrice = productCard.find('.product-price').html();
            let productImage = productCard.find('.product-image').attr('src');
            let viewProductBtn = productCard.find('a')
            let viewProductUrl = productCard.find('a').data('url')

            viewProductBtn.attr('url', `${viewProductUrl}?name=${productName}&image=${productImage}&price`)
            offcanvas.find(".product-name").html(productName)
            offcanvas.find(".product-price").html(productPrice)
            offcanvas.find(".product-image").attr('src', productImage)
        })
        $("#offcanvas-cart").on('hidden.bs.offcanvas', function(e) {
            let offcanvas = $(this);


            offcanvas.find(".product-name").html("")
            offcanvas.find(".product-price").html("")
            offcanvas.find(".product-image").attr('src', offcanvas.find(".product-image").data("placeholder"))
        })
    })
</script>