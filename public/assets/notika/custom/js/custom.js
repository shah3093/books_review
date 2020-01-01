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
