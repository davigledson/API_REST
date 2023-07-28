<?php 
header("Content-Type: application/json");
require_once '../vendor/autoload.php';

//api/users/1

//explodir — Dividir uma string por uma string
if($_GET['url']){
    $url = explode('/', $_GET['url']);
//var_dump($url);

    if($url[0] === 'api'){
        //Anexar elementos ao início de um array Desde 7.3.0 esta função pode ser chamada com apenas um parâmetro.
        array_shift($url);

        $service ='App\Services\\'. ucfirst($url[0]) . 'Service';
        array_shift($url);
        //r($url);

        $method =strtolower($_SERVER['REQUEST_METHOD']);
        //r($method);

        try {
          $response = call_user_func_array(array(new $service, $method),$url);
            
            http_response_code(200);

          echo json_encode(array('status'=> 'sucess','data'=> $response));
            exit;
        } catch (\Exception $e) {
            http_response_code(404);
            echo json_encode(array('status'=> 'error','data'=> $e->getMessage()));
            exit;
        }
    }
}
