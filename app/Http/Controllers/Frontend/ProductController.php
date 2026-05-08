<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $newProducts = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('shop.index', compact('newProducts'));
    }

    public function catalog(Request $request)
    {
        $query = Product::with('category');

        // Фильтр по категории
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Фильтр по цене
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        // Фильтр по наличию
        if ($request->has('in_stock') && $request->in_stock == '1') {
            $query->where('amount', '>', 0);
        }

        // Сортировка
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();
        $selectedCategory = $request->category;

        return view('catalog.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Если есть дочерние категории - показываем их
        if ($category->children()->count() > 0) {
            $categories = $category->children()->paginate(12);
            return view('catalog.categories', compact('categories', 'category'));
        }

        // Если нет дочерних - показываем товары
        $products = Product::where('category_id', $category->id)->paginate(12);
        $categories = Category::all();

        return view('catalog.index', compact('products', 'categories', 'category'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'images'])->findOrFail($id);



        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }
}
