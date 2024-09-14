<?
// Call API
$results = api_request('get_all_products', 'GET');
// Checking if result was successful
if($results['data']['status'] == 'SUCCESS'){
    $produtos = $results['data']['results'];
}
// If not, set an empty array
else {
    $produtos = [];
}

// If one client was selected
if(isset($_GET['id'])){
    //Call API
    $result = api_request('get_product_by_id', 'GET', ['id' => $_GET['id']]);

    // Checking if result was successful
    if($result['data']['status'] == 'SUCCESS'){
        $produto = $result['data']['results'][0];
    }
    // If not, set an empty array
    else {
        $produto = [];
    }
}
?>

<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center mb-4">PRODUTOS</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <? 
                // If there are no clients
                if($produtos == []) { ?>
                    <p class="text-center">Não há produtos registrados.</p>
                <? }
                // Else if one client was selected but something went wrong in the API call
                else if (isset($_GET['id']) and $produto == []) { ?>
                    <p class="text-center">Erro ao carregar produto.</p>
                <? }
                // Else if one client was selected
                else if (isset($_GET['id'])) include("produto_id.php");
                // Else show all clients
                else include("produtos_lista.php");
                ?>
            </div>
        </div>
    </div>
</section>