<?php
//declaring all routes and redirections
class Route {
    function __construct() {
        $this->userControllerObj = new UserController;     
    }

    //redirecting depends on the url 
    function getRedirect() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $urlValues = explode("/", $requestUri);
        $url = end($urlValues);
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($url) {
            switch ($url) {
                case "index.php":
                case "users":
                    $this->userControllerObj->getIndex();
                    break;
                case "register":
                    if($method=='GET') {
                        $this->userControllerObj->getView('register');
                    } else if($method=='POST') {
                        $this->userControllerObj->postRegister();            
                    }
                    break;
                case "home":
                    $this->userControllerObj->getHome();
                    break;
                case "logout":
                    $this->userControllerObj->getLogout();
                    break;
                default:
                    header('Location: users');     
            }
        } else {
            $this->userControllerObj->getIndex();
        } 
    }        
} 