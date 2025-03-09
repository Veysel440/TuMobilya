<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(4)->get();
        $menus = Menu::all();
        $sliders = Slider::all();
        $announcements = Announcement::all();

        return view('home.index', compact('products', 'menus', 'sliders', 'announcements'));
    }
}
