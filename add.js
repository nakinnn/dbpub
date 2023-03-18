$(document).ready(function(){
    $("#student_id").keyup(function(){
        let input = $(this).val();
        if(input != ""){
            $.ajax({
                url: "student_data.php",
                method: "post",
                data:{
                    query: input
                },
                success: function(response){
                    $('#show-list').html(response);
                }
            })
        }else{
            $("#show-list").html("");
        }
    })
    $(document).on('click','a',function(){
        $("#student_id").val($(this).text())
        $("#show-list").html("");
    })
})