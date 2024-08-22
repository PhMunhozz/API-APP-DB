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
        
    }
}