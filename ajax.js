$(document).ready(function(){
    $(document).on("click","#lmBtn",function(e){
        var id = $("#lmBtn").attr('data-id');

        $.ajax({
            url : 'data_fetch.php',
            type: 'post',
            data: {
                id: id
            },
            beforeSend: function(){
                $("#load-more-icn").show();
            },
            success: function(response){
                $("#loadBtnRow").remove();
                $("#dataTable").append(response);
                $("#load-more-icn").hide();
            }
        });
    });
});