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
                $('.feedback_form').removeClass('close').addClass(' open'); //показываем форму ответа
                $('.form').addClass(' close');      //скрываем начальную форму
                $('.feedback_form_msg').text("");
                // $('.feedback_form_msg').append(data.datas);
                // $('.feedback_form_msg').append("<br>");
                data.datas.forEach(msg => {
                    $('.feedback_form_msg').addClass(' open').append(msg);  //добавляем данные в форму
                    $('.feedback_form_msg').append("<br>");
                });
            }
            else{
                $('.error_msg').text("");   //если есть ошибки
                data.errors.forEach(error => {
                    $('.error_msg').addClass(' open').append(error);    //добавить текст ошибки
                    $('.error_msg').append("<br>");
                });
            }
        }
    })
});
