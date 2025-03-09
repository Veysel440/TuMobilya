<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255|unique:menus,url',
            'page_title' => 'nullable|string|max:255',
            'page_description' => 'nullable|string|max:500',
        ]);

        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla eklendi.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255|unique:menus,url,' . $menu->id,
            'page_title' => 'nullable|string|max:255',
            'page_description' => 'nullable|string|max:500',
        ]);

        $menu->update([
            'title' => $request->title,
            'url' => $request->url,
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla silindi.');
    }
}
