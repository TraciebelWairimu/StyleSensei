<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WardrobeItem;

class WardrobeItemController extends Controller
{
    public function create()
    {
        return view('wardrobe.create');
    }
    public function store(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'item' => 'required',
        'category' => 'required',
        'description' => 'required',
        'date_added' => 'required|date',
        'image' => 'required|image|max:2048',
    ]);

    // Handle image upload
    $imagePath = $request->file('image')->store('public/images');
    $imageUrl = asset('storage/' . $imagePath);

    // Create wardrobe item
    $wardrobeItem = new WardrobeItem();
    $wardrobeItem->item = $request->item;
    $wardrobeItem->category = $request->category;
    $wardrobeItem->description = $request->description;
    $wardrobeItem->date_added = $request->date_added;
    $wardrobeItem->image = $imageUrl;
    $wardrobeItem->user_id = $user->id;

    $wardrobeItem->save();

    return redirect()->route('wardrobe.index')->with('success', 'Wardrobe item uploaded successfully.');
}

}    

