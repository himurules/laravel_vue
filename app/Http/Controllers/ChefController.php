<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chefs::all();
        return view('chefs', ['chefs' => $chefs]);
    }
}
