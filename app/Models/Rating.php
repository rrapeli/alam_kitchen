<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'menu_id',
        'rating',
        'review',
        'is_anonymous',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
