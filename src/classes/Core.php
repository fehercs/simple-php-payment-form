<?php


class Core {
    private $controller = 'PaymentForm';
    private $method = 'index';

    public function __construct() {
        $url = $this->getUrl();
        // Check for controller, instantiate if exists
        if(file_exists('./controllers/' . ucwords($url[0]). '.php')){
            $this->controller = ucwords($url[0]);
            unset($url[0]);
        }
        require_once './controllers/'. $this->controller . '.php';
        $this->controller = new $this->controller($this->method);
        // Check for method in controller
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // Run the selected method of selected controller
        call_user_func([$this->controller, $this->method]);
    }
    // Create an array from request URL
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}