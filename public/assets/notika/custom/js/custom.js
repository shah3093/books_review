$("#slectAllPermissionDiv > .icheckbox_square-green > .iCheck-helper").on("click",function (event) {
    var status = $("#allPermission").is(":checked");
    if(status){
        $(".permission-check-box").each(function() {
            $(this).attr('checked',true);
            $(this).parent().addClass('checked');
        });
    }else{
        $(".permission-check-box").each(function() {
            $(this).attr('checked',false);
            $(this).parent().removeClass('checked');
        });
    }
});


$(".deleteModals").on('click',function (event) {
    event.preventDefault();
    $("#delete-link").html($(this).attr('data-href'));
    $("#deleteModals").modal('show');
});

$("#deleteDataConf").on('click',function (event) {
    event.preventDefault();
    var href = $("#delete-link").html();
    window.location.href = href;
})
