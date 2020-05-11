<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use Illuminate\Http\Request;

/**
 * Class FoodItemController
 *
 * @package App\Http\Controllers\Admin
 */
class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->user()->can('edit-menu')) {
            return response('Unauthorized', 403);
        }

        $request->validate(
            [
                'name' => 'required| max:30',
                'price' => 'required | numeric | min:0',
                'category'   => 'required',
                'description' => 'required',
                'is_active' => 'required | boolean',
                'img_src'   => 'required'
            ]
        );
        $foodItem = FoodItem::create($request->post());
        $foodItem->categories()->attach($request->post()['category']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodItem $foodItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $foodItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $foodItem)
    {
        //
    }
}
