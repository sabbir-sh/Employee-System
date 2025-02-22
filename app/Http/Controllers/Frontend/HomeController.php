<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index2()
    {

        $data['page_title'] = "Home Page ";
        return view('frontend.home', $data);
    }

    public function index()
{
    $banners = HomeBanner::where('published', 1)->get(); // Get only published banners
    return view('frontend.home', compact('banners'));
}

}

