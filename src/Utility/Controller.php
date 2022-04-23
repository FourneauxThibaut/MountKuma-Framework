<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{

    private $loader;
    protected $twig;

//      ┌────────┐
//      │  VIEW  │
//      └────────┘
    public function view($path, $data = [])
    {
        $path = explode(".", $path);
        
        // Get the file name and turn it capitalized
        if ( preg_match('~^\p{Lu}~u', $path[0]) ) {
            $path = join("/",$path);
        } 
        else {
            $path[0] = ucfirst($path[0]);
            $path = join("/",$path);
        }

        $path = "{$path}.html";

        $this->loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/app/View');
        $this->twig = new Environment($this->loader);

        if (! $data) {
            return $this->twig->display($path);
        }
        else {
            return $this->twig->display($path, $data);
        }
    }
}