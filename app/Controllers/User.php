<?php

// use BaseController;

class User extends  BaseController
{
    public function index()
    {
        // echo "hello from index";
        // return view("home");
        // helper("Base");
        // echo parser("hello world");

        return view("index", array('name' => 'santu', "address" => "kolkata"));
    }
}
