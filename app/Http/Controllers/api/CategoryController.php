<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function navbarCategories(Request $request){
        $categories  = Category::with('children')->where('parent', 0)->orWhere('parent', null)->get();
        // return $categories;
        return CategoryCollection::make($categories);
        // return $categories;
    }
}
