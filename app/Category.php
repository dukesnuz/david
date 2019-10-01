<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function urls()
    {
        # Define a one-to-many relationship.
        return $this->hasMany('David\Url');
    }

    public static function getCategoriesForDrop()
    {
        $categories = Category::orderBy('categories', 'ASC')->get();
        $categoriesForDrops = [];
        foreach ($categories as $category) {
            $categoriesForDrops[$category['id']] = $category->categories;
        }
        return $categoriesForDrops;
    }
}
