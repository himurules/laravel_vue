<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $chefs = Chefs::all();
        return view('about',['chefs'=>$chefs]);
    }
}
