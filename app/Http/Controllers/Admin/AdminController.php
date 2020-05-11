<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class AdminController extends Controller
{
    public function categories()
    {
        $this->authorize('manage', 'App\Categories');
        $categories = Categories::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Update/Insert Categories
     *
     * @param Request $request Request Object
     *
     * @return array
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function upsert(Request $request)
    {
        $this->authorize('manage', 'App\Categories');
        $categories = $request->post('categories');
        foreach ($categories as $category) {
            if ($category['id']) {
                $category['created_at'] = date(
                    'Y-m-d H:i:s',
                    strtotime($category['created_at'])
                );
                $category['updated_at'] = date('Y-m-d H:i:s');
                Categories::where('id', $category['id'])->update($category);
            } else {
                $category['start_time'] = date('Y-m-d H:i:s');
                $category['end_time'] = date('Y-m-d H:i:s');
                Categories::create($category);
            }
        }
        return ['success'=> true, 'categories' => Categories::all()];
    }

    /**
     * Delete a category
     *
     * @param Categories $category Category to delete
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return array
     */
    public function destroy(Categories $category)
    {
        $this->authorize('delete', 'App\Categories');
        $category->delete();
        return ['success' => true, 'categories' => Categories::all()];
    }

    /**
     * Edit Menu Items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMenu()
    {
        return view('admin.editMenu', ['categories' => Categories::with('foodItem')->get()]);
    }
}
