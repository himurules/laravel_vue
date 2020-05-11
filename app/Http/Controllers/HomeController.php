<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Chefs;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $otherCategories = Categories::with('foodItem')->where('id', '<>', 3)->get();
        $exclusive = Categories::with('foodItem')->find(3);
        $chefs = Chefs::all();
        //dd($testimonials);
        return view('home', ['exclusive' => $exclusive, 'otherCategories' => $otherCategories, 'chefs' => $chefs]);
    }
}
