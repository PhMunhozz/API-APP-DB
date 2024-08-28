<?
class api_logic{

    private $endpoint;
    private $params;

    // defines the class properties
    public function __construct($endpoint, $params=null){
        $this->endpoint = $endpoint;
        $this->params = $params;
    }

    // check if the endoint is a valid class methos
    public function endpoint_exists(){
        return method_exists($this, $this->endpoint);
    }


    // ENDPOINTS
    // test if the API is running
    public function status(){
        $data = [
            'status' => 'SUCCESS',
            'message' => 'API is running ok',
            'results' => null
        ];

        return $data;
    }

    // get all clients in the database
    public function get_all_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes");

        // if client not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No clients found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All clients retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

    //get active clients
    public function get_active_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE ISNULL(deleted_at)");

        // if client not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No active clients found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All active clients retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

    // get client by id
    public function get_client_by_id(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE id = ?", array($this->params['id']));

        // if client not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'Client not found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All clients retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

    // get all products in the database
    public function get_all_products(){
        $database = new database();
        $results = $database->EXE_QUERY("SELECT * FROM produtos");

        // if product not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No products found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All products retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

    //get active products
    public function get_active_products(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE ISNULL(deleted_at)");

        // if product not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No active products found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All active products retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

    // get product by id
    public function get_product_by_id(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE id = ?", array($this->params['id']));
        
        // if product not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'Product not found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All products retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

}