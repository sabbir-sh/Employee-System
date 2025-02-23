<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255',
            'slug' => 'string|max:255|unique:categories,slug',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
        ]);

        // Handle file upload for banner and icon
        $bannerPath = $request->file('banner') ? $request->file('banner')->store('categories/banners', 'public') : null;
        $iconPath = $request->file('icon') ? $request->file('icon')->store('categories/icons', 'public') : null;

        Category::create([
            'title' => $request->title,
            'banner' => $bannerPath,
            'icon' => $iconPath,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1024',
        'description' => 'nullable|string',
    ]);

    $category->title = $request->title;
    $category->slug = $request->slug;
    $category->description = $request->description;

    // Handle Banner Upload
    if ($request->hasFile('banner')) {
        if ($category->banner) {
            Storage::delete('public/' . $category->banner); // Delete the old banner if it exists
        }
        $category->banner = $request->file('banner')->store('banners', 'public');
    }

    // Handle Icon Upload
    if ($request->hasFile('icon')) {
        if ($category->icon) {
            Storage::delete('public/' . $category->icon); // Delete the old icon if it exists
        }
        $category->icon = $request->file('icon')->store('icons', 'public');
    }

    $category->save();

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);

    // Delete associated files if they exist
    if ($category->banner) {
        Storage::delete('public/' . $category->banner);
    }
    if ($category->icon) {
        Storage::delete('public/' . $category->icon);
    }

    // Delete the category from the database
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
}


}
