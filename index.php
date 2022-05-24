<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP интаро</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <form name='search_form' class="form" method='POST'>    //форма поиска
          <label for="adress">Адрес:</label><br>
          <input type="text" id="adress" name="adress" required="required"><br>
          <p class="error_msg"></p>
          <button class="btn submit_btn" id="submit_button">Поиск</button>
    </form>
    
    <div class="feedback_form close" id="feedback_form">
        <div class="feedback_form_msg" id="feedback_form_msg">  //поле для вывода инфы
        </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    //скрипт яндекса
<script src="script.js"></script>
</html>
