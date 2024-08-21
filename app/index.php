<?

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

// $variables = [
//     'nome' => 'paulo',
//     'sobrenome' => 'munhoz'
// ];

// request
// $results = api_request('status', 'GET', $variables);
$results = api_request('status', 'GET');

echo '<pre>';
var_dump($results);