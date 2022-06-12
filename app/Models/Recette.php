<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @vararray<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'user_id',
        'category_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @vararray<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'price' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
