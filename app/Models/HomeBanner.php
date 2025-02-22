<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $table = 'home_banners'; 
    protected $fillable = [
        'photo',
        'position',
        'title',
        'subtitle',
        'offer',
        'published',
        'link'
    ];
}
