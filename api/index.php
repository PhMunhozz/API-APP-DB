<?

// temporary response
header("Content-Type: application/json");

$data['status'] = 'SUCCESS';
$data['method'] = $_SERVER['REQUEST_METHOD'];

// show variables of request (get or post)

echo json_encode($data);