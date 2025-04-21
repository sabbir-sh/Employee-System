<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    public function index5()
    {

        $data['page_title'] = "Home Page ";
        return view('frontend.home', $data);
    }
    public function index()
    {
        $banners = HomeBanner::where('published', 1)->get();
        $categories = Category::all();
        $tasks = Task::where('status', 'In_progress')->get();

        // Load a single product (e.g., latest or featured)
        // $product = Product::latest()->first(); // or use where('published', 1)->first()

        return view('frontend.home', compact('banners', 'categories', 'tasks'));
    }


}

