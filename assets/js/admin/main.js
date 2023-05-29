$(function () {
    $(".photo-chooser").on("change", function (e) {
        let preview = $($(this).data('preview'));
        if (e.target.files.length > 0) {
            let photo = e.target.files[0];
            preview.attr('src', URL.createObjectURL(photo));

        } else if(e.target.files.length == 0 || $(this).val() == '') {
            if (preview.data('default') != undefined) {
                preview.attr('src', preview.data('default'))
            }else{
                preview.attr('src','');
            }
        }
    })

    // $(".image-container").on("click",function (e) { 
    //     let img = $(this).find('img').attr("src");
    //     $("#view-image-modal").find('img').attr('src',img)
    //     $("#view-image-modal").modal('show')
    //  })

     $("#view-image-modal").on("show.bs.modal",function (e) { 
        let img = $(e.relatedTarget).find("img").attr('src');
        $("#view-image-modal").find('img').attr('src',img)
        $("#view-image-modal").modal('show')
     })

     

     $("#view-image-modal .modal-body").on("click",function(e){
        $('#view-image-modal').modal('hide')
     })
})

