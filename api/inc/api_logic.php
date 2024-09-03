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
    
    // success response
    public function success_response($message, $results){
        $data = [
            'status' => 'SUCCESS',
            'message' => $message,
            'results' => $results
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
        // // filter for active and deleted clients

        // $sql = "SELECT * FROM clientes WHERE 1 ";

        // // filter only active clients
        // if(key_exists('only_active', $this->params) and filter_var($this->params['only_active'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND ISNULL(deleted_at) ";

        // // filter only deleted clients
        // if(key_exists('only_deleted', $this->params) and filter_var($this->params['only_deleted'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND NOT ISNULL(deleted_at) ";
        
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes");

        // if client not found
        if(empty($results)) return $this->error_response('No clients found');
        else return $this->success_response('All clients retrieved successfully', $results);
    }

    //get active clients
    public function get_all_active_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NULL");

        // if client not found
        if(empty($results)) return $this->error_response('No active clients found');
        else return $this->success_response('All active clients retrieved successfully', $results);
    }

    //get inactive clients
    public function get_all_inactive_clients(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NOT NULL");

        // if client not found
        if(empty($results)) return $this->error_response('No inactive clients found');
        else return $this->success_response('All inactive clients retrieved successfully', $results);
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
        else return $this->success_response('Client retrieved successfully', $results);
    }

    // get all products in the database
    public function get_all_products(){
        
        // // filter for active and deleted products

        // $sql = "SELECT * FROM produtos WHERE 1";
        // // filter only active products
        // if(key_exists('only_active', $this->params) and filter_var($this->params['only_active'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND ISNULL(deleted_at) ";

        // // filter only deleted products
        // if(key_exists('only_deleted', $this->params) and filter_var($this->params['only_deleted'], FILTER_VALIDATE_BOOLEAN)) $sql .= "AND NOT ISNULL(deleted_at) ";

        $database = new database();
        $results = $database->EXE_QUERY("SELECT * FROM produtos");

        // if product not found
        if(empty($results)) return $this->error_response('No products found');
        else return $this->success_response('All products retrieved successfully', $results);
    }

    //get active products
    public function get_all_active_products(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NULL");

        // if product not found
        if(empty($results)) return $this->error_response('No active products found');
        else return $this->success_response('All active products retrieved successfully', $results);
    }

    //get inactive products
    public function get_all_inactive_products(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NOT NULL");

        // if product not found
        if(empty($results)) return $this->error_response('No inactive products found');
        else return $this->success_response('All inactive products retrieved successfully', $results);
    }

    //get all products with stock
    public function get_all_products_with_stock(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NULL AND quantidade > 0");

        // if product not found
        if(empty($results)) return $this->error_response('No products found');
        else return $this->success_response('All products retrieved successfully', $results);
    }

    //get all products without stock
    public function get_all_products_without_stock(){
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NULL AND quantidade <= 0");

        // if product not found
        if(empty($results)) return $this->error_response('No products found');
        else return $this->success_response('All products retrieved successfully', $results);
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
        else return $this->success_response('Product retrieved successfully', $results);
    }

}