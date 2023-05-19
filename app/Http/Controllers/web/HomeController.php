<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::with('media')->get();

        return view('category.index', [
            'categories' => $category,
            'title' => 'Categories',
            'flashMessage' => session('success')
        ]);
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        $parents = Category::all();
        return view('category.create', compact('parents'));
    }


    public function store(Request $request)
    {
        $rules = [
            'name'          => ['unique:categories,name', 'required', 'string', 'min:3'],
            'discription'   => ['nullable', 'string'],
            'parent_id'     => ['nullable', 'int', 'exists:categories,id'],
            'photo'         => ['nullable', 'image'],
        ];

        $validator = $request->validate($rules);
        $category = new Category();
        $category->name        = $request->name;
        $category->discription = $request->discription;
        $category->parent_id   = $request->parent_id;
        $category->save();

        $category->addMedia($request->photo)->toMediaCollection();

        // PRG : Post Redirect Get
        return redirect('/categories')->with('success', 'Category Created!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents  = Category::all();
        return view('category.edit', compact('category', 'parents'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'name'          => ['required', 'string', 'min:3'],
            'discription'   => ['nullable', 'string'],
            'parent_id'     => ['nullable', 'int', 'exists:categories,id'],
            'photo'         => ['nullable', 'image'],
        ];

        $validator             = $request->validate($rules);
        $category              = Category::findOrFail($id);
        $category->name        = $request->name;
        $category->discription = $request->discription;
        $category->parent_id   = $request->parent_id;
        $category->save();

        if ($request->photo) {
            $category->addMedia($request->photo)->toMediaCollection();
        }

        return redirect('/categories')->with('success', 'Category Updated!');
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/categories')->with('success', 'Category deleted!');
    }
}
