<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images/categories', $imageName);

        Category::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect('categories')->with('success', 'Your category has successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $CategoryImage = $category->image;
            Storage::delete('storage/images/categories' . $CategoryImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images/categories', $imageName);

            $data['image'] = $imageName;
        }
        $category->update($data);

        return redirect('categories')->with('success','Your category has successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect('categories')->with('delete','Your category has successfully deleted!');
    }

    public function search(Request $request)
    {
        $searchData = "%" . $request->search . "%";
        $categories = Category::where('name', 'like', $searchData)->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
}
