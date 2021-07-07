<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];


    /**
     * Relation with user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function validate(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:new,used',
            'category_id' => 'required|exists:categories,id',
            'images' => [
                $request->method() === 'PATCH'? 'present' : 'required',
                'array',
                $request->method() === 'PATCH'? 'min:0' : 'min:1'
            ],
            'images.*' => 'required|image|max:2048'
        ]);
    }
}
