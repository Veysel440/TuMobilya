<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->getAll();
        return view('admin.menus.index', compact('menus'));
    }

    public function store(MenuRequest $request)
    {
       $this->menuService->create($request->validated());
        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla eklendi.');
    }

    public function edit($id)
    {
        $menu = $this->menuService->find($id);
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
        $this->menuService->update($id, $request->validated());

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $this->menuService->delete($id);

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla silindi.');
    }
}
