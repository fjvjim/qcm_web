<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = $this->_data;
        $data['isLogin']=false;
        $data['type']=0;
        return view('home', $data);
    }
}
