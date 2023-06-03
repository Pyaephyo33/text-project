<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Item::paginate(5);
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:items',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'item_condition'=>'required',
            'item_type'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'owner_name'=>'required',
            'contact'=>'required',
            'address'=>'required',
        ]);

        $image = $request->image;
        $imagePath = uniqid().'_'.$image->getClientOriginalName();
        $image->storeAs('public/images/items',$imagePath);

        Item::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'description'=>$request->description,
            'item_condition'=>$request->item_condition,
            'item_type'=>$request->item_type,
            'image'=>$imagePath,
            'owner_name'=>$request->owner_name,
            'contact'=>$request->contact,
            'address'=>$request->address,
        ]);

        return redirect('items')->with('success','Item added');
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
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=>'required|unique:items',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'item_condition'=>'required',
            'item_type'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'owner_name'=>'required',
            'contact'=>'required',
            'address'=>'required',
        ]);

        $item = Item::find($id);
        if($request->hasFile('image')){
            $itemImage = $item->image;
            Storage::delete('storage/images/items/'.$itemImage);

            $image = $request->image;
            $imagePath = uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/items',$imagePath);

            $data['image'] = $imagePath;
        }

        $item->update($data);

        return redirect('items')->with('success','Item Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::find($id)->delete();
        return back()->with('delete','Item Deleted!');
    }

    public function search(Request $request)
    {
        $searchData = "%" . $request->search . "%";
        $items = Item::where('name', 'like', $searchData)->orWherehas('category',function($category) use($searchData){
            $category->where('name','like',$searchData);
        })->paginate(5);
        return view('admin.item.index',compact('items'));
    }
}
