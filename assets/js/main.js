
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