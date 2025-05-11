<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\CardSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::where('user_id', Auth::id())->latest()->get();
        return view('cards.index', compact('cards'));
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = CardSize::all();
        return view('cards.create', compact('categories', 'sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'music' => 'nullable|mimes:mp3,wav|max:10240',
            'video' => 'nullable|mimes:mp4,avi,mov|max:20480',
            'card_size_id' => 'required|exists:card_sizes,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $card = new Card($request->only([
            'title',
            'description',
            'card_size_id',
            'category_id'
        ]));

        $card->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $card->image = $request->file('image')->store('cards/images', 'public');
        }

        if ($request->hasFile('music')) {
            $card->music = $request->file('music')->store('cards/musics', 'public');
        }

        if ($request->hasFile('video')) {
            $card->video = $request->file('video')->store('cards/videos', 'public');
        }

        $card->save();

        return redirect()->route('cards.index')->with('success', 'Carte créée avec succès.');
    }

    public function edit(Card $card)
    {
        $this->authorize('update', $card); // optionnel si tu veux restreindre

        $categories = Category::all();
        $sizes = CardSize::all();
        return view('cards.edit', compact('card', 'categories', 'sizes'));
    }

    public function update(Request $request, Card $card)
    {
        $this->authorize('update', $card);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'music' => 'nullable|mimes:mp3,wav|max:10240',
            'video' => 'nullable|mimes:mp4,avi,mov|max:20480',
            'card_size_id' => 'required|exists:card_sizes,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $card->fill($request->only(['title', 'description', 'card_size_id', 'category_id']));

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($card->image);
            $card->image = $request->file('image')->store('cards/images', 'public');
        }

        if ($request->hasFile('music')) {
            Storage::disk('public')->delete($card->music);
            $card->music = $request->file('music')->store('cards/musics', 'public');
        }

        if ($request->hasFile('video')) {
            Storage::disk('public')->delete($card->video);
            $card->video = $request->file('video')->store('cards/videos', 'public');
        }

        $card->save();

        return redirect()->route('cards.index')->with('success', 'Carte mise à jour.');
    }

    public function destroy(Card $card)
    {
        $this->authorize('delete', $card);

        $card->delete();
        return redirect()->route('cards.index')->with('success', 'Carte supprimée.');
    }
}
