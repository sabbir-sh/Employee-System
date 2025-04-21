<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'category',
        'short_description',
        'description',
        'faq',
        'price',
        'quantity',
        'photos',
        'thumbnail_img',
        'hover_img',
        'video_img',
        'video_link',
        'discount',
        'meta_title',
        'meta_description',
        'meta_img',
        'published',
        'slug',
    ];
}
