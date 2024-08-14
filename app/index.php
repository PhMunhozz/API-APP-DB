<?

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

$variables = [
    'nome' => 'paulo',
    'sobrenome' => 'munhoz'
];
api_request('status', 'GET', $variables);