<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\CardSize;
use Illuminate\Http\Request;

class PublicCardController extends Controller
{
    public function index(Request $request)
    {
        $query = Card::query()
            ->whereNull('deleted_at')
            ->latest();

       
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

       
        if ($request->has('size_id') && $request->size_id != '') {
            $query->where('card_size_id', $request->size_id);
        }

        $cards = $query->get();
        $categories = Category::all();
        $sizes = CardSize::all();

        return view('public.index', compact('cards', 'categories', 'sizes'));
    }
}