<?
// Call API
$results = api_request('get_all_clients', 'GET');

// Checking if result was successful
if($results['data']['status'] == 'SUCCESS'){
    $clientes = $results['data']['results'];
}
// If not, set an empty array
else {
    $clientes = [];
}

// If one client was selected
if(isset($_GET['id'])){
    //Call API
    $result = api_request('get_client_by_id', 'GET', ['id' => $_GET['id']]);

    // Checking if result was successful
    if($result['data']['status'] == 'SUCCESS'){
        $cliente = $result['data']['results'][0];
    }
    // If not, set an empty array
    else {
        $cliente = [];
    }
}
?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center mb-4">CLIENTES</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <? 
                // If there are no clients
                if($clientes == []) { ?>
                    <p class="text-center">Não há clientes registrados.</p>
                <? }
                // Else if one client was selected but something went wrong in the API call
                else if (isset($_GET['id']) and $cliente == []) { ?>
                    <p class="text-center">Erro ao carregar cliente.</p>
                <? }
                // Else if one client was selected
                else if (isset($_GET['id'])) include("cliente_id.php");
                // Else show all clients
                else include("clientes_lista.php");
                ?>
            </div>
        </div>
    </div>
</section>