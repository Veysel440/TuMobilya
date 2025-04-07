<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Menu;
=======
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Services\MenuService;
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
use Illuminate\Http\Request;

class MenuController extends Controller
{
<<<<<<< HEAD
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
=======
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
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla eklendi.');
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $menu = Menu::findOrFail($id);
=======
        $menu = $this->menuService->find($id);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
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
=======
        $this->menuService->update($id, $request->validated());
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy($id)
    {
<<<<<<< HEAD
        $menu = Menu::findOrFail($id);
        $menu->delete();
=======
        $this->menuService->delete($id);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla silindi.');
    }
}
