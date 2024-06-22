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
        // おすすめ商品のデータを取得するロジックを追加
        // ここでは例としてランダムに10個の商品を取得していますが、
        // 実際のアプリケーションでは適切なロジックに置き換えてください。
        $recommend_products = Product::inRandomOrder()->take(10)->get();

        // 'recommend_products' をビューに渡す
        return view('web.index', compact('major_categories', 'categories', 'recommend_products'));
    }
}