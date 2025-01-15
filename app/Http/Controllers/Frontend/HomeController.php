<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data['page_title'] = "Home Page ";
        return view('frontend.home', $data);
    }

}

