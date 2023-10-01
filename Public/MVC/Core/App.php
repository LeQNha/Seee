    <?php
        class App{
                protected $controller = "HomePageController";
                protected $action = "index";
                protected $params=[];
            function __construct()
            {
            
                if(isset($_REQUEST['controller'])){
                    $controllerName = ucfirst($_REQUEST['controller'] ?? 'HomePage').'Controller';
                    $actionName     = $_REQUEST['action'] ?? 'index';

                    require "./MVC/Controllers/$controllerName.php";

                    $controllerObject = new $controllerName();
                    $controllerObject->$actionName();
                    
                }else{
                    $arr = $this->UrlProcess();
                
                    if(file_exists("./MVC/Controllers/".$arr[0]."Controller.php")){
                        $this->controller = $arr[0]."Controller";
                        unset($arr[0]); 
                    }
                    
                    require "./MVC/Controllers/".$this->controller.".php";
                    //Phải đặt sau require method exsit mới hoạt động đc
                    if(isset($arr[1]) ){
                        if(method_exists($this->controller, $arr[1])){
                            $this->action = $arr[1];
                        }
                        unset($arr[1]); 
                    }
                    $this->params = $arr?array_values($arr):[];

                    $controllerName = $this->controller;
                    $action = $this->action;
                    $c = new $controllerName();
                    $c -> $action();
                }
            }
            function UrlProcess()
            {
                if(isset($_SERVER['REQUEST_URI'])){
                    $u = trim($_SERVER['REQUEST_URI'], '/');
                    $u = filter_var($u, FILTER_SANITIZE_URL);
                    $u = explode('/', $u);
                    return $u;     
                }
            }
        }
    ?>