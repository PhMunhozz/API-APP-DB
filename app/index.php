<?

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

// echo '<pre>';

// $results = api_request('status', 'GET');
// var_dump($results);
// echo '<br><br>';

// $results = api_request('statusx', 'GET');
// var_dump($results);
// echo '<br><br>';

// $results = api_request('get_all_clients', 'GET');
// var_dump($results);
// echo '<br><br>';

// $results = api_request('get_all_products', 'GET');
// var_dump($results);

// $results = api_request('get_client_by_id', 'GET', array('id' => 1));
// var_dump($results);
// echo '<br><br>';
?>
<h3>Clients</h3>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
    <?
    // Accessing clients data
    $results = api_request('get_all_clients', 'GET');
    foreach($results['data']['results'] as $client) {
        echo '<tr><td>' . $client['id'] . '</td><td>' . $client['nome'] . '</td><td>' . $client['email'] . '</td></tr>';
    }
    ?>  
</table>
<hr>
<h3>Products</h3>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Quantity</td>
    </tr>
    <?
    // Accessing products data
    $results = api_request('get_all_products', 'GET');
    foreach($results['data']['results'] as $product) {
        echo '<tr><td>' . $product['id'] . '</td><td>' . $product['produto'] . '</td><td>' . $product['quantidade'] . '</td></tr>';
    }
    ?>
</table>