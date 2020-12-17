<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->_data;
        if(!session()->has("admin")){
            return redirect('login');
        }
        return redirect('/admin/question');
    }
}
