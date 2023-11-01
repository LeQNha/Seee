<?php
session_start();
    // require './MVC/Core/Database.php';
    // require './MVC/Models/BaseModel.php';
    // require './MVC/Controllers/BaseController.php';

    // $controllerName = ucfirst($_REQUEST['controller'] ?? 'Welcome').'Controller';
    // $actionName     = $_REQUEST['action'] ?? 'index';
    
    // require "./Controllers/$controllerName.php";

    // $controllerObject = new $controllerName();
    // $controllerObject->$actionName();
    // echo $_GET["url"];

    require_once "./MVC/Bridge.php";
    
    $myApp = new App();

    
?>