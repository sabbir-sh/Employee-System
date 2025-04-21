<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {

        $data['products'] = Product::all();
        $data['products'] = Product::orderBy('created_at', 'desc')->get();
        return view('backend.product.index', $data);
    }

    public function create()
    {
        return view('backend.product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'faq' => 'nullable|string',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'discount' => 'nullable|numeric',
            'video_link' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'hover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Generate slug from the product name
        $slug = Str::slug($request->name);

        // Ensure the slug is unique by checking the database
        $slugCount = Product::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = $slug . '-' . ($slugCount + 1); // Append a number to make it unique
        }

        // Handle multiple photos upload
        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('products/photos', 'public');
            }
        }

        // Handle single file uploads
        $validated['thumbnail_img'] = $request->hasFile('thumbnail_img')
            ? $request->file('thumbnail_img')->store('products/thumbnail', 'public')
            : null;

        $validated['hover_img'] = $request->hasFile('hover_img')
            ? $request->file('hover_img')->store('products/hover', 'public')
            : null;

        $validated['video_img'] = $request->hasFile('video_img')
            ? $request->file('video_img')->store('products/video', 'public')
            : null;

        $validated['meta_img'] = $request->hasFile('meta_img')
            ? $request->file('meta_img')->store('products/meta', 'public')
            : null;

        $validated['photos'] = json_encode($photoPaths); // store as JSON array in DB
        $validated['slug'] = $slug; // Add the generated slug to the validated data

        // Create the product with the validated data
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validation rules for the product
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'discount' => 'nullable|numeric',
            'video_link' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'faq' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'video_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'meta_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Update text fields
        $product->fill($validated);

        // Handle new photos upload
        if ($request->hasFile('photos')) {
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('products/photos', 'public');
            }
            $product->photos = json_encode($photoPaths);
        }

        // Handle thumbnail
        if ($request->hasFile('thumbnail_img')) {
            $product->thumbnail_img = $request->file('thumbnail_img')->store('products/thumbnail', 'public');
        }

        // Handle hover image
        if ($request->hasFile('hover_img')) {
            $product->hover_img = $request->file('hover_img')->store('products/hover', 'public');
        }

        // Handle video image
        if ($request->hasFile('video_img')) {
            $product->video_img = $request->file('video_img')->store('products/video', 'public');
        }

        // Handle meta image
        if ($request->hasFile('meta_img')) {
            $product->meta_img = $request->file('meta_img')->store('products/meta', 'public');
        }

        // Update slug if the name has changed
        if ($product->name != $request->name) {
            $slug = Str::slug($request->name);
            $slugCount = Product::where('slug', $slug)->count();
            if ($slugCount > 0) {
                $slug = $slug . '-' . ($slugCount + 1); // Append a number to make it unique
            }
            $product->slug = $slug;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }


}
