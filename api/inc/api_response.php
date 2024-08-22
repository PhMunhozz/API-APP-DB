<?

class api_response{
    
    private $data;
    private $available_methods = ['GET', 'POST'];

    public function __construct()
    {
        $this->data = [];
    }

    // check if method is available
    public function check_method($method){
        return in_array($method, $this->available_methods);
    }

    // sets the request method
    public function set_method($method){
        $this->data['method'] = $method;
    }

    // gets the request method
    public function get_method(){
        return $this->data['method'];
    }

    // sets the request endpoint
    public function set_endpoint($endpoint){
        $this->data['endpoint'] = $endpoint;
    }

    // gets the request endpoint
    public function get_endpoint(){
        return $this->data['endpoint'];
    }

    // adds data to the response
    public function add_to_data($key, $value){
        $this->data[$key] = $value;
    }


    // OUTPUTS
    
    // outputs an api error message
    public function api_request_error($message = ""){
        $this->data['status'] = 'ERROR';
        $this->data['error_message'] = $message;
        $this->send_response();
    }

    // sends api status
    public function send_api_status(){
        $this->data['status'] = 'SUCCESS';
        $this->data['message'] = "API is running ok";
        $this->send_response();
    }

    // output final response
    public function send_response(){
        // header('Content-Type: application/json');
        echo json_encode($this->data);
        die(1);
    }
}