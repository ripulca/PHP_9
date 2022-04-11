$('.submit_btn').click(function(e){
    e.preventDefault();
    var adress = document.search_form.adress.value;

    $.ajax({
        url: 'search.php',
        type: 'GET',
        dataType: 'json',
        data: {
            adress: adress,
        },
        success(data) {
            if(data.status) {
                $('.feedback_form').removeClass('close').addClass(' open');
                $('.form').addClass(' close');
                $('.feedback_form_msg').text("");
                // $('.feedback_form_msg').append(data.datas);
                // $('.feedback_form_msg').append("<br>");
                data.datas.forEach(msg => {
                    $('.feedback_form_msg').addClass(' open').append(msg);
                    $('.feedback_form_msg').append("<br>");
                });
            }
            else{
                $('.error_msg').text("");
                data.errors.forEach(error => {
                    $('.error_msg').addClass(' open').append(error);
                    $('.error_msg').append("<br>");
                });
            }
        }
    })
});