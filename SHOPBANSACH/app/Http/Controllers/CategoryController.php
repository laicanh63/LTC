<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $type = $request->get('type', 'parent');
        return view('admin.categories.create', compact('categories', 'type'));
    }

    public function store(Request $request)
    {
        $type = $request->get('type', 'parent');
        $rules = ['name' => 'required'];
        if ($type === 'child') {
            $rules['parent_id'] = 'required|exists:categories,id';
        }
        $request->validate($rules);
        $data = [
            'name' => $request->name,
            'is_active' => true,
            'parent_id' => $type === 'child' ? $request->parent_id : null,
        ];
        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
