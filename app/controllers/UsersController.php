<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{


    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('users', ['users' => $users]);
    }
    public function store()
    {
        // Belom bikin method insertnya


        // Insert


        // Redirect pake fungsi header
    }
}