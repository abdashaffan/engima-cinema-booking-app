<?php

namespace App\Controllers;

class PagesController
{

    public function home()
    {
        // require 'views/index.view.php';
        view('index');
    }
    public function about()
    {
        // require 'views/about.view.php';
        view('about');
    }
    public function contact()
    {
        // require 'views/contact.view.php';
        view('contact');
    }
}