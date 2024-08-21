<?

// dependencies
require_once(dirname(__FILE__) . '/inc/config.php');
require_once(dirname(__FILE__) . '/inc/api_class.php');

// instance of the api_class
$api = new api_class();
$api->send_api_status();

// // check the method
// if(!$api->check_method($_SERVER['REQUEST_METHOD'])) {
//     $api->api_request_error("Method not allowed");
// }


// // temporary response
// header("Content-Type: application/json");

// $data['status'] = 'SUCCESS';
// $data['method'] = $_SERVER['REQUEST_METHOD'];

// // show variables of request (get or post)
// if($data['method'] == 'GET') {
//     $data['data'] = $_GET;
// } else if($data['method'] == 'POST') {
//     $data['data'] = $_POST;
// }

// echo json_encode($data);