<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $_data = array();

    public function __construct()
    {
        $this->_data['idMenu'] = 1;
        $this->_data['adMenu'] = 1;
        $this->_data['isLogin'] = false;
        $this->_data['type'] = 0;

    }
}
