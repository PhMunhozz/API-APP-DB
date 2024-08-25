<?

function api_request($endpoint, $method = 'GET', $variables = []){

    // initiate the curl client
    $client = curl_init();

    // defines the url
    $url = API_BASE_URL;

    // if request is GET
    if($method == 'GET'){

        $url .= "?endpoint=$endpoint";
        if(!empty($variables)){
            $url .= '&'.http_build_query($variables);
        }
    }

    // if request is POST
    if($method == 'POST'){
        $variables = array_merge(
            ['endpoint' => $endpoint],
            $variables
        );
        // set postfields for each variable
        curl_setopt($client, CURLOPT_POSTFIELDS, $variables);
    }

    // set the url
    curl_setopt($client, CURLOPT_URL, $url);

    // returns the result as a string
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    // execute the request
    $response = curl_exec($client);

    // close the client
    curl_close($client);

    // echo $url;
    return json_decode($response, true);

}