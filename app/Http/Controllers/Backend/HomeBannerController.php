<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class HomeBannerController extends Controller
{
    public function index()
    {
        $banners = HomeBanner::all();
        $banners = HomeBanner::orderBy('created_at', 'desc')->get();
        return view('backend.homebanner.index', compact('banners'));
    }


    public function create()
    {
        return view('backend.Homebanner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'position' => 'nullable|integer',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'offer' => 'nullable|string|max:255',
            'published' => 'nullable|boolean',
            'link' => 'nullable|url',
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads/banners'), $imageName);
        
        HomeBanner::create([

            'photo' => 'uploads/banners/'.$imageName,
            'position' => $request->position,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'offer' => $request->offer,
            'published' => $request->published ?? true,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner Added Successfully');
    }


    public function edit($id)
{
    $banner = HomeBanner::findOrFail($id);
    return view('Backend.Homebanner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = HomeBanner::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'offer' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'published' => 'required|boolean',
            'link' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Handle Image Upload
        if ($request->hasFile('photo')) {
            // Delete the old image
            if ($banner->photo && file_exists(public_path('storage/' . $banner->photo))) {
                unlink(public_path('storage/' . $banner->photo));
            }

            // Store the new image
            $photoPath = $request->file('photo')->store('banners', 'public');
            $banner->photo = $photoPath;
        }

        // Update other fields
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->offer = $request->offer;
        $banner->position = $request->position;
        $banner->published = $request->published;
        $banner->link = $request->link;

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner Updated Successfully');
    }

    public function destroy($id)
{
    $banner = HomeBanner::findOrFail($id);

    // Check if the photo exists and delete it
    if ($banner->photo && file_exists(public_path('storage/' . $banner->photo))) {
        unlink(public_path('storage/' . $banner->photo));
    }

    // Delete the banner record from the database
    $banner->delete();

    // Redirect to the index page with a success message
    return redirect()->route('admin.banners.index')->with('success', 'Banner Deleted Successfully');
    }

}
