<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product; // Product モデルを使用するために追加

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_categories = MajorCategory::all();

        // おすすめ商品のデータを取得
        $recommend_products = Product::inRandomOrder()->take(10)->get();

        // 新着商品のデータを取得
        $recently_products = Product::orderBy('created_at', 'desc')->take(10)->get();

        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();

        // 変数をビューに渡す
        return view('web.index', compact('major_categories', 'categories', 'recommend_products', 'recently_products'));
    }
}