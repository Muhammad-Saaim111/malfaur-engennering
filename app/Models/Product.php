<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'brand_id',
        'image',
        'description',
        'specifications'
    ];

    protected $casts = [
        'specifications' => 'array'
    ];

    /**
     * Map 'title' to 'name' for the view.
     */
    public function getNameAttribute()
    {
        return $this->title;
    }

    /**
     * Map 'category_id' to category string name.
     */
    public function getCategoryAttribute()
    {
        $categories = [
            1 => 'Cutting Tools',
            2 => 'Measuring Equipment',
            3 => 'Standard Parts',
            4 => 'Aerospace Parts',
            5 => 'Raw Materials'
        ];
        return $categories[$this->category_id] ?? 'Uncategorised';
    }

    /**
     * Convert 'specifications' JSON object to specs array format.
     */
    public function getSpecsAttribute()
    {
        $specs = [];
        $rawSpecs = $this->specifications;
        if (is_array($rawSpecs)) {
            foreach ($rawSpecs as $key => $val) {
                if ($key !== 'dimensions' && $key !== 'dimension_image' && !str_ends_with($key, '_state') && is_string($val)) {
                    $specs[] = [$key, $val];
                }
            }
        }
        return $specs;
    }
}
