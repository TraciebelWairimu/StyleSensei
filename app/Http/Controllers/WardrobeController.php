<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WardrobeItem;

class WardrobeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $search = $request->input('search', '');
        $sortBy = $request->input('sort_by', 'category'); 

        $query = WardrobeItem::where('user_id', $user->id);
    
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('category', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        switch ($sortBy) {
            case 'category':
                $query->orderBy('category');
                break;
            case 'date_created':
                $query->orderBy('created_at');
                break;
            case 'item':
                $query->orderBy('item');
                break;
            default:
                $query->orderBy('category');
                break;
        }
        
    
        $paginator = $query->paginate(4);
        $wardrobeItems = $paginator->items();
    
        return view('wardrobe.index', compact('search', 'paginator', 'wardrobeItems'));
    }
    
    public function edit($id)
    {
        $wardrobeItem = WardrobeItem::findOrFail($id); 
        return view('wardrobe.edit', ['wardrobeItem' => $wardrobeItem]);

    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        $wardrobeItem = WardrobeItem::findOrFail($id);
    
        // Check if the authenticated user owns the item
        if ($wardrobeItem->user_id !== $user->id) {
            abort(403); // Return a forbidden error if the user doesn't own the item
        }
    
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'date_added' => 'required|date',
        ]);
    
        $wardrobeItem->category = $request->input('category');
        $wardrobeItem->description = $request->input('description');
        $wardrobeItem->date_added = $request->input('date_added');
    
        $wardrobeItem->save();
    
        return redirect()->route('wardrobe.index')->with('success', 'Wardrobe item updated successfully.');
    }
    
    // Update the wardrobe item with the new values
 

    public function destroy($id)
    {
        $wardrobeItem = WardrobeItem::findOrFail($id);
        $wardrobeItem->delete();

        return redirect()->route('wardrobe.index')->with('success', 'Wardrobe item deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $itemIds = $request->input('item_ids');

        WardrobeItem::whereIn('id', $itemIds)->delete();

        return redirect()->route('wardrobe.index')->with('success', 'Selected items deleted successfully.');
    }
}

