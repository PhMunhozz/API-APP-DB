<?

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

echo '<pre>';

$results = api_request('status', 'GET');
var_dump($results);

$results = api_request('statusx', 'GET');
var_dump($results);

$results = api_request('get_all_clients', 'GET');
var_dump($results);