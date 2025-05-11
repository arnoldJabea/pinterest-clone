<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\CardSize;
use Illuminate\Http\Request;
use App\Models\Card;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $categories = Category::all();
        $sizes = CardSize::all();
        $cards = Card::all();

        return view('admin.settings.index', compact('setting', 'categories', 'sizes' , 'cards'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:BLANC,NOIR,IMAGE',
            'opacity' => 'required|numeric|min:0|max:1',
        ]);

        $setting = Setting::first();
        $setting->theme = $request->theme;
        $setting->opacity = $request->opacity;
        $setting->save();

        return back()->with('success', 'Paramètres mis à jour.');
    }
}