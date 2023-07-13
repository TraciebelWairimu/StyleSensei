<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WardrobeItem;
use App\Models\Outfit;

class OutfitController extends Controller
{
    public function create()
    {
        $wardrobeItems = WardrobeItem::all();
        return view('outfit.create', compact('wardrobeItems'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('image')->store('outfits', 'public');

        // Create a new outfit in the database
        $outfit = Outfit::create([
            'name' => $request->input('name'),
            'description' => $request->input('name'),
            'image' => $imagePath,
        ]);

        // Attach the selected wardrobe items to the outfit
        $wardrobeItems = $request->input('wardrobe_items', []);
        $outfit->wardrobeItems()->attach($wardrobeItems);

        return redirect()->route('outfit.create')->with('success', 'Outfit created successfully.');
    }

    // Other controller methods...
}

