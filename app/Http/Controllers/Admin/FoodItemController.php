<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodItemPost;
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
    public function store(FoodItemPost $request)
    {
        $foodItem = FoodItem::create($request->validated());
        $foodItem->categories()->attach($request->validated()['category']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $foodItem)
    {
        return $foodItem;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return FoodItem
     */
    public function edit(FoodItem $foodItem)
    {
        $categories = [];
        foreach ($foodItem->categories as $cat) {
            $categories[] = $cat->pivot->category_id;
        }
        $foodItem->category = $categories;
        return $foodItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(FoodItemPost $request, FoodItem $foodItem)
    {
        $foodItem->update($request->validated());
        $foodItem->categories()->sync($request->validated()['category']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return array
     */
    public function destroy(FoodItem $foodItem)
    {
        $foodItem->delete();
        return ['success' => true];
    }
}
