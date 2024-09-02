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

    // error response
    public function error_response($message){
        $data = [
            'status' => 'ERROR',
            'message' => $message,
            'results' => null
        ];
        return $data;
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
        $sql = "SELECT * FROM clientes WHERE 1 ";

        // filter only active clients
        if(key_exists('only_active', $this->params) and filter_var($this->params['only_active'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND ISNULL(deleted_at) ";

        // filter only deleted clients
        if(key_exists('only_deleted', $this->params) and filter_var($this->params['only_deleted'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND NOT ISNULL(deleted_at) ";
        
        $db = new database();
        $results = $db->EXE_QUERY("$sql");

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
    public function get_all_active_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NULL");

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

    //get inactive clients
    public function get_all_inactive_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NOT NULL");

        // if client not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No inactive clients found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All inactive clients retrieved successfully',
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
            if(empty($this->params['id'])){
                $message = 'Client ID not provided';
            }
            else $message = 'Client not found';
            
            return $this->error_response($message);
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
        
        $sql = "SELECT * FROM produtos WHERE 1";

        // filter only active products
        if(key_exists('only_active', $this->params) and filter_var($this->params['only_active'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND ISNULL(deleted_at) ";

        // filter only deleted products
        if(key_exists('only_deleted', $this->params) and filter_var($this->params['only_deleted'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND NOT ISNULL(deleted_at) ";

        $database = new database();
        $results = $database->EXE_QUERY("$sql");

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
    public function get_all_active_products(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NULL");

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

    //get inactive products
    public function get_all_inactive_products(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NOT NULL");

        // if product not found
        if(empty($results)){
            $data = [
                'status' => 'ERROR',
                'message' => 'No inactive products found',
                'results' => null
            ];
            return $data;
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All inactive products retrieved successfully',
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
            
            if(empty($this->params['id'])){
                $message = 'Product ID not provided';
            }
            else $message = 'Product not found';

            return $this->error_response($message);
        }

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All products retrieved successfully',
            'results' => $results
        ];

        return $data;
    }

}