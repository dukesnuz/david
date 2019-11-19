<?php

namespace David;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    public function Blogcategories()
    {
        return $this->hasMany('David\Blogpost');
    }


    public static function getBlogCategoriesForDrop()
    {
        $blogCategories = Blogcategory::orderBy('categories', 'ASC')->get();
        $blogCategoriesForDrops = [];
        foreach ($blogCategories as $category) {
            $blogCategoriesForDrops[$category['id']] = $blogCategory->categories;
        }
        return $blogCategoriesForDrops;
    }
}
