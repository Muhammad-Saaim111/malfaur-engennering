<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('pages.products', compact('products'));
})->name('products');

Route::get('/products/{slug}', function ($slug) {
    try {
        $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(10)
            ->get();

        if ($relatedProducts->count() < 6) {
            $extraProducts = \App\Models\Product::where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->limit(10 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($extraProducts);
        }
    } catch (\Exception $e) {
        abort(404, "Product not found");
    }

    return view('pages.product-details', compact('product', 'relatedProducts'));
})->name('products.show');

Route::get('/who-we-are', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
