<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        // $categories = Category::orderByDesc('id')->get();

        return view('Category.index', compact('categories'));
    }

    public function create(){
        $category = new Category();
        return view('Category.Create', compact('category'));
    }

    public function store(CategoryRequest $request){
        Category::created($request->validated());
        return redirect()->route('categories.index')->with('succes', 'Categoría Creada');
    }

    public function show (string $id){
        $category = Category::findOrFail($id);
        return view('Category.show', compact('category'));
    }

    public function edit(string $id){
        $categories = Category::findOrFail($id);
        return view('Category.edit', compact('categories'));
    }

    public function update(CategoryRequest $request, string $id){
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Categoría Actualizada');
    }
}
