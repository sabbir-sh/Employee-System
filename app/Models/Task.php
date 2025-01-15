<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'assigned_to',
    ];

    /**
     * Get the user that the task is assigned to.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
