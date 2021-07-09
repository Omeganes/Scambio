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

    ####################################### Relationships #######################################

    /**
     * Relation with user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * relation with category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Model validation rules
     *
     * @param Request $request
     * @return array
     */
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


    /**
     * Filter products by search term
     *
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term): mixed
    {
        if (!is_null($term)) {
            return $query->where('name', 'ILIKE', "%$term%")
                ->orWhere('description', 'ILIKE', "%$term%");
        }

        return $query;
    }
}
