<?php

namespace Src\Router;

class Route {

    // how to turn it private?
    public $path;
    public $callable;
    public $folder;
    public $middleware;
    public $id;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct($path, $callable, $id = null){

        // $this->path = trim($path);
        $this->path = $path;
        $this->id = $id;

        $array = explode("@", $callable);
        $this->callable = $array;

        $this->folder = substr($this->callable[0], 0, -10);
    }

//      ┌──────────────┐
//      │  MIDDLEWARE  │
//      └──────────────┘
public function middleware(object $route){

    switch ($route->middleware) {
        case 'admin':
            return false;     
            break;

        case 'auth':
            return false;     
            break;
        
        default:
            return true;
            break;
    }
}

//      ┌────────────┐
//      │  REDIRECT  │
//      └────────────┘
    public function redirect($controller, $id = null){

        $file = $controller[0];
        $method = $controller[1];
        $model = $this->folder.'Model';

        require ($_SERVER['DOCUMENT_ROOT'].'/app/Controller/'.$this->folder.'/'.$file.'.php');
        require ($_SERVER['DOCUMENT_ROOT'].'/app/Model/'.$this->folder.'/'.$model.'.php');
        
        $name = $file.'::'.$method;
        $name = new $file();

        if ( $id != null ){
            $name->$method($id);
        }
        else{
            $name->$method();
        }
    }
}