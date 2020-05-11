<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Show the menu dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $otherCategories = Categories::with('foodItem')->where('id', '<>', 3)->get();
        return view('menu', ['otherCategories' => $otherCategories]);
    }
}
