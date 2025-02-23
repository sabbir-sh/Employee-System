<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Models\Category;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index5()
    {

        $data['page_title'] = "Home Page ";
        return view('frontend.home', $data);
    }

    // public function index()
    // {
    //     $banners = HomeBanner::where('published', 1)->get(); // Get only published banners
    //     return view('frontend.home', compact('banners'));
    // }

    // public function index2()
    // {
    //     $categories = Category::all();  // Fetch all categories
    //     return view('frontend.home', compact('categories'));  // Pass categories to the view
    // }
    public function index()
{
    // Fetch published banners
    $banners = HomeBanner::where('published', 1)->get();

    // Fetch all categories
    $categories = Category::all();

    // Pass both banners and categories to the view
    return view('frontend.home', compact('banners', 'categories'));
}


}

