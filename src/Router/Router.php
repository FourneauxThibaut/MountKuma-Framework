<?php 

namespace Src\Router;

use Src\Router\Route;

class Router 
{
    private $routes = [];
    private $url;
    private $url_argument;
    private $url_id;
    private $redirected = false;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct(string $url)
    {
        $path = explode("/", $url);    
        
        if( count($path) <= 2 && $path[1] == '' ){
            return $this->url = '/';
        }
        elseif( count($path) <= 2 && strpos($url, '?') ){

            $url_argument = explode("?", $path[1]);

            if (strpos($url, '&')){
                $path = $url_argument[0];
                $url_argument = explode("&", $url_argument[1]);
            }

            $this->url = $path;
            $this->url_argument = $url_argument;
        }
        elseif( count($path) >= 2 && strpos($url, '?') ){
            $url_argument = explode("?", $path[(count($path) -1)]);

            array_shift($path);
            array_pop($path);

            if (strpos($url, '&')){
                $path[] = $url_argument[0];
                $url_argument = explode("&", $url_argument[1]);
            }

            $this->url = $path;
            $this->url_argument = $url_argument;
        }
        else{
            array_shift($path);
            $this->url = $path;
        }
    }
    
//      ┌───────┐
//      │  ADD  │
//      └───────┘
    public function add(string $path, string $callable)
    {
        $route = new Route($path, $callable);
        $this->routes[$route->callable[0]][$route->callable[1]] = $route;
    }
    
//      ┌───────────┐
//      │  GET URL  │
//      └───────────┘
    public function get_url()
    {
        return $this->url;
    }
        
    public function print_url()
    {
        echo '<pre>';
        r($this->url);
        echo '</pre>';
    }

//      ┌──────────┐
//      │  GET ID  │
//      └──────────┘
    public function get_id()
    {
        return $this->url_id;
    }    

    public function print_id()
    {
        echo '<pre>';
        r($this->url_id);
        echo '</pre>';
    }

//      ┌────────────────┐
//      │  GET ARGUMENT  │
//      └────────────────┘
    public function get_argument()
    {
        return $this->url_argument;
    }
    
    public function print_argument()
    {
        echo '<pre>';
        r($this->url_argument);
        echo '</pre>';
    }

//      ┌──────────────────┐
//      │  GET ALL ROUTES  │
//      └──────────────────┘
    public function get_all_routes()
    {
        return $this->routes;
    }

    public function print_all_routes()
    {
        echo '<pre>';
        r($this->routes);
        echo '</pre>';
    }

//      ┌──────────────────┐
//      │  ADD MIDDLEWARE  │
//      └──────────────────┘
    public function add_middleware(string $controller,array $args,string $access)
    {

        foreach ($this->routes as $route_controller) {
            foreach ($route_controller as $method => $route) {

                foreach ($args as $arg) {
                    if( $method == $arg ){

                        $route->middleware = $access;
                    }
                }
            }
        }
    }
      
//      ┌────────┐
//      │  LOAD  │
//      └────────┘
    public function load()
    {
        if ( $this->redirected != true ){

            if ( gettype($this->url) == 'array' ){
                $this->url = join("/", $this->url);
            }

            if ( strlen($this->url) > 1 ){
                $this->url = "/" . $this->url;
            }

            if (preg_match('~[0-9]+~', $this->url)) {
                $this->url_id = preg_replace('/[^0-9]/', '', $this->url);

                $this->url = str_replace($this->url_id, "", $this->url);

                if ( stripos($this->url,"//") ){
                    $this->url = str_replace("//", "/", $this->url);
                }
            }

            foreach ($this->routes as $route_controller) {
                foreach ($route_controller as $route) {

                    // if the route has an id
                    if ( stripos($route->path,"{id}") ){
                        $id = substr($route->path, stripos($route->path,"{id}"), 4);
                        $route->id = $id;

                        $route->path = str_replace("{id}", "", $route->path);
                        
                        if ( stripos($route->path,"//") ){
                            $route->path = str_replace("//", "/", $route->path);
                        }

                        $route->id = $this->url_id;
                    }

                    if ( $route->path == $this->url ){
                        
                        $access = $route->middleware($route);
                        
                        if ( $access == true ){
                            
                            $route->redirect($route->callable, $route->id);
                            $this->redirected = true;
                        }
                        else{
                            require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Error/404.php');
                            $this->redirected = true;
                        }
                    }
                }
            }
        }
        if ( $this->redirected != true ){
            require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Error/404.php');
        }
    }
}