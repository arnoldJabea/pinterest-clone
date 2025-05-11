<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardSize;
use Illuminate\Http\Request;

class AdminCardController extends Controller
{
    /**
     * Affiche toutes les cartes pour modération.
     */
    public function index(Request $request)
    {
        $query = Card::with(['user', 'category', 'size'])->latest();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $cards = $query->get();
        $sizes = CardSize::all();
        $categories = \App\Models\Category::all();
        $users = \App\Models\User::all();

        return view('admin.cards.index', compact('cards', 'sizes', 'categories', 'users'));
    }

    /**
     * Permet de changer la taille d'une carte.
     */
    public function resize(Request $request, Card $card)
    {
        $request->validate([
            'card_size_id' => 'required|exists:card_sizes,id',
        ]);

        $card->card_size_id = $request->card_size_id;
        $card->touch(); // Met à jour la date de modification
        $card->save();

        return redirect()->back()->with('success', 'Taille de la carte mise à jour.');
    }

    
    public function destroy(Card $card)
    {
        $card->delete(); 
        return back()->with('success', 'Carte désactivée.');
    }
}
