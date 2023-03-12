class PageLoader{
    constructor(attachTo){
        this.loader =  $(`<div class="custom-page-loader"></div>`);
        this.attachTo = attachTo;
        this.init();
    }

    init() {
        this.loader.prependTo(this.attachTo)
    }

    setProgress(progress){
        console.log("loader: ", this.loader)
        // this.loader.css("width",`${progress}% !important`)
        this.loader[0].style.width = `${progress}%`
        
    }
}