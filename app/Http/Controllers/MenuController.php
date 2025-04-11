<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogger;

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

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(MenuRequest $request)
    {
        $menu = $this->menuService->create($request->validated());

        ActivityLogger::log('Yeni menü eklendi', 'Menu', $menu->id);

        return redirect()->route('admin.menus.index')->with('success', 'Menu başarıyla kaydedildi.');
    }

    public function edit($id)
    {
        $menu = $this->menuService->find($id);
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(MenuRequest $request, $id)
    {
        $this->menuService->update($id, $request->validated());
        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $this->menuService->delete($id);
        return redirect()->route('admin.menus.index')->with('success', 'Menü başarıyla silindi.');
    }
}
