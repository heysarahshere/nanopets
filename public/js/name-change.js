function nameChangeAjax(id){

    let creature_name = document.getElementById("nameInput" + id).value;

    if(creature_name === ''){
        $('#val-error').text('Please enter an email address (preferably a real one).');
    } else {
        $.ajax({
            url: "/name-change-ajax",
            type:"post",
            data:{
                "_token": "{{ csrf_token() }}",
                creature_name: creature_name,
                creature_id: id
            },
            beforeSend: function(xhr, type) {
                $('#val-error').hide();
                // $("#success-message").text('');
                // $(".ajax-loader").show();
            },
            success:function(response){
                if(response) {
                    $('#name-change-form' + id)[0].reset();
                    $("#success-message").text(response.success);
                }
            },
            complete:function(data){
                // $(".ajax-loader").hide();
                $("#nameInputDiv" + id).addClass('hiddenFace');
                $("#nameLabel" + id).removeClass('hiddenFace');
                $("#nameLabel" + id).text(data[0]);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                $('#val-error').hide();
                $("#success-message").text('Oops, something went wrong. Please try again later.');
                // $(".ajax-loader").hide();
            }
        });
    }
}
