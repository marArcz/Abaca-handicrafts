$(function() {
    Notiflix.Loading.init({
        className: 'notiflix-loading',
        customSvgUrl: 'assets/images/abaca-logo.svg',
        backgroundColor: 'rgba(250,250,250,0.6)',
        svgSize: '60px',
        svgColor:"#463C32",
        messageColor: '#000',
    });

    // Notiflix.Loading.circle("Abaca Handicraft");
    AOS.init();

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

    let scrollTop = $(window).scrollTop()
    console.log('scrolltop: ', scrollTop)

    if (scrollTop > 20) {
        $(".main-navbar").addClass("scrolling")
    } else {
        $(".main-navbar").removeClass("scrolling")
    }
})

$(window).on('scroll', function(e) {
    let scrollTop = $(window).scrollTop()
    console.log('scrolltop: ', scrollTop)

    if (scrollTop > 20) {
        $(".main-navbar").addClass("scrolling")
    } else {
        $(".main-navbar").removeClass("scrolling")
    }
})



$(function () {
    const pageLoader = new PageLoader("body")

    pageLoader.setProgress(0)
    setTimeout(() => pageLoader.setProgress(100), 500)

    loadPhotoDiv()
})


function loadPhotoDiv() {
    $.each($(".photo-div"), function (i, elem) {
        let img = $(elem).data("image");
        $(elem).css('background-image',`url('${img}')`);
    });
}

