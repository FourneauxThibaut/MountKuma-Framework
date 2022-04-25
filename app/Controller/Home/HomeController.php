<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class HomeController extends Controller
{
    public $model;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new HomeModel();
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index()
    {
        // $google_font = $this->model->get_google_api();
        $data = [];
        $head = [ 'title' => 'Mount-Kuma Framework' ];

        return $this->view('home.index', $head, $data);
    }
}