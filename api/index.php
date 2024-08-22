<?

// dependencies
require_once(dirname(__FILE__) . '/inc/config.php');
require_once(dirname(__FILE__) . '/inc/api_class.php');

// instance of the api_class
$api = new api_class();

// check if method is valid
if(!$api->check_method($_SERVER['REQUEST_METHOD'])) {
    // send error response
    $api->api_request_error("Invalid request method");
}

// set request method
$api->set_method($_SERVER['REQUEST_METHOD']);

// set request endpoint
$api->set_endpoint($_SERVER['REQUEST_METHOD']);
if($api->get_method() == 'GET') {
    $api->set_endpoint($_GET['endpoint']);
}
else if($api->get_method() == 'POST') {
    $api->set_endpoint($_POST['endpoint']);
}

$api->send_api_status();


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