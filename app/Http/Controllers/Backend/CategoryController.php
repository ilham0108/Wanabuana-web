<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category_galery;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function addCategory(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'category' => 'required|alpha|min:5|max:15',
        ]);

        Category_galery::create([
            'category'     => $request->category,
        ]);
        return redirect()->back();
    }
}
