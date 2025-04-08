<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getAll()
    {
        return Menu::all();
    }

    public function create(array $data)
    {
        return Menu::create($data);
    }

    public function update($id, array $data)
    {
        $menu = Menu::findOrFail($id);
        return $menu->update($data);
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        return $menu->delete();
    }

    public function find($id)
    {
        return Menu::findOrFail($id);
    }
}
