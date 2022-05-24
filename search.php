<?php
$api_token=file_get_contents('parametrs.txt');  //получить токен
$url='https://geocode-maps.yandex.ru/1.x/?';
$address=$_GET['adress'];   //получаем адрес из поля инпут
$parameters = array(    //формируем параметры запроса
    'apikey' => $api_token,
    'geocode' => $address,
    'format' => 'json'
  );
$response = file_get_contents($url. http_build_query($parameters)); //получаем ответ
$my_loc= json_decode($response, true);  //декодируем данные
$metro="Not found in ur area";  //метро по умолчанию не найдено

if($my_loc['response']['GeoObjectCollection']['metaDataProperty']['GeocoderResponseMetaData']['found']>=1){ //если найдено >=1 мест
    $cord = str_replace(" ", ",", $my_loc['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos']); //координаты первого места
    $parameters = array(    //параметры для получения метро
    'apikey' => $api_token,
    'geocode' => $cord,
    'kind' => 'metro',
    'format' => 'json'
    );
    $response = file_get_contents($url. http_build_query($parameters)); //получаем метро
    $obj = json_decode($response, true);
    // var_dump($obj);
    if($obj['response']['GeoObjectCollection']['metaDataProperty']['GeocoderResponseMetaData']['found']>=1){    //если найдено более 1 метро
        $metro = "Метро: ".$obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['name'];    //формируем строку
    }
}
$coordinates =$my_loc['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];  //получаем новые координаты метро
$my_loc=$my_loc['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['formatted'];    //получаем адрес метро
// echo $metro;
$datas=array($my_loc, $coordinates, $metro);    //формируем итоговый массив

$response =[
    "status" =>true,
    "datas" =>$datas
];
echo json_encode($response);    //отправляем запрос
