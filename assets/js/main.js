
$(function () {
    const pageLoader = new PageLoader("body")

    pageLoader.setProgress(0)
    setTimeout(()=> pageLoader.setProgress(100),500)
})