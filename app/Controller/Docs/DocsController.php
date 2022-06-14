<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class DocsController extends Controller
{
    public $model;
    public $controller = 'Docs';

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new DocsModel($this->controller);
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.index', $head, $data);
    }

//      ┌───────────┐
//      │  INSTALL  │
//      └───────────┘
    public function install()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.install', $head, $data);
    }

//      ┌───────────┐
//      │  UTILITY  │
//      └───────────┘
    public function utility()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.utility', $head, $data);
    }

//      ┌──────────────┐
//      │  CONTROLLER  │
//      └──────────────┘
    public function controller()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.controller', $head, $data);
    }

//      ┌─────────┐
//      │  MODEL  │
//      └─────────┘
    public function model()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.model', $head, $data);
    }

//      ┌────────┐
//      │  TODO  │
//      └────────┘
    public function todo()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.todo', $head, $data);
    }

//      ┌───────────┐
//      │  CONTACT  │
//      └───────────┘
    public function contact()
    {
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('docs.contact', $head, $data);
    }

//      ┌─────────────┐
//      │  SEND MAIL  │
//      └─────────────┘
    public function send_mail()
    {
        
    }
}