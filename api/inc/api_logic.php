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

    public function status(){
        $data = [
            'status' => 'SUCCESS',
            'message' => 'API is running ok',
            'results' => null
        ];

        return $data;
    }

    public function get_all_clients(){
        // $database = new database();
        // $results = $database->EXE_QUERY("SELECT * FROM clientes");

        $data = [
            'status' => 'SUCCESS',
            'message' => 'All clients retrieved successfully',
            'results' => [
                'Paulo',
                'Karol'
            ]
        ];

        return $data;
    }
}