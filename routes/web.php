<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/products', function () {
    try {
        $products = \App\Models\Product::all();
        if ($products->isEmpty()) {
            throw new \Exception("Database table is empty, using fallback data.");
        }
    } catch (\Exception $e) {
        $products = collect(json_decode(json_encode([
            [
                'id' => 1,
                'name' => 'Solid Carbide End Mills',
                'category' => 'Cutting Tools',
                'description' => 'Solid carbide end mills and milling cutters for CNC machining centres and manual milling. Multi-flute geometry with TiAlN coating for high performance in steel, aluminium, and exotic alloys.',
                'short_description' => 'TiAlN-coated solid carbide end mills for CNC milling of high-hardness metals and alloys.',
                'image' => 'product-cutting-tools.png',
                'specs' => [
                    ['Material', 'Solid Carbide'],
                    ['Coating', 'TiAlN'],
                    ['Flutes', '4 Flutes'],
                    ['Diameter', '3mm – 25mm'],
                    ['Workpiece', 'Steel / Stainless / Al']
                ]
            ],
            [
                'id' => 2,
                'name' => 'Indexable Carbide Inserts',
                'category' => 'Cutting Tools',
                'description' => 'Indexable carbide turning and milling inserts in standard ISO grades. Ideal for high-speed metal removal and finishing operations across structural steels and exotics.',
                'short_description' => 'ISO-standard turning and milling carbide inserts with high wear resistance coatings.',
                'image' => 'product-cutting-tools.png',
                'specs' => [
                    ['Type', 'Turning / Milling'],
                    ['Grade', 'ISO P / M / K'],
                    ['Coating', 'CVD Coated'],
                    ['Insert Geometry', 'CNMG / WNMG / DCMT']
                ]
            ],
            [
                'id' => 3,
                'name' => 'Digital Vernier Calipers',
                'category' => 'Measuring Equipment',
                'description' => 'High-precision digital vernier calipers with LCD screen. Dust-proof, splash-resistant stainless steel body for workshop environments.',
                'short_description' => 'IP54 hardened stainless steel digital calipers with imperial/metric conversion and high accuracy.',
                'image' => 'product-measurement.png',
                'specs' => [
                    ['Measuring Range', '0 – 150mm / 6 in'],
                    ['Resolution', '0.01mm / 0.0005 in'],
                    ['Accuracy', '±0.02mm'],
                    ['Material', 'Stainless Steel'],
                    ['Protection', 'IP54 Standard']
                ]
            ],
            [
                'id' => 4,
                'name' => 'Precision Outside Micrometer',
                'category' => 'Measuring Equipment',
                'description' => 'Precision workshop micrometer with ratcheted thimble for consistent measuring force. Carbide-tipped measuring faces for long-term flat surface accuracy.',
                'short_description' => 'Standard 0–25mm micrometer with mechanical counter/vernier scale and thermal insulated frame.',
                'image' => 'product-measurement.png',
                'specs' => [
                    ['Measuring Range', '0 – 25mm'],
                    ['Resolution', '0.001mm'],
                    ['Accuracy', '±0.002mm'],
                    ['Anvil Type', 'Flat (Carbide Tipped)']
                ]
            ],
            [
                'id' => 5,
                'name' => 'Deep Groove Ball Bearings',
                'category' => 'Standard Parts',
                'description' => 'High-grade steel ball bearings manufactured to standard ISO and DIN tolerances. Perfect for standard rotary power transmission and load bearing.',
                'short_description' => 'ISO deep groove ball bearings. Pre-lubricated standard design for general industrial machinery.',
                'image' => 'product-bearings.png',
                'specs' => [
                    ['Type', 'Deep Groove'],
                    ['Material', 'Chrome Steel'],
                    ['Standard', 'DIN 625 / ISO 6306'],
                    ['Tolerance', 'ABEC-3 / P6']
                ]
            ],
            [
                'id' => 6,
                'name' => 'High-Tensile Hex Bolts',
                'category' => 'Standard Parts',
                'description' => 'Industrial strength metric hex bolts in Grade 8.8 and 10.9 structural finishes. Zinc-plated for general corrosion resistance.',
                'short_description' => 'Standard Grade 8.8/10.9 hex bolts. Zinc-plated and certified for structural assemblies.',
                'image' => 'product-fasteners.png',
                'specs' => [
                    ['Grade', 'Grade 8.8 / 10.9'],
                    ['Thread', 'Metric Coarse (M6-M36)'],
                    ['Standard', 'DIN 931 / ISO 4014'],
                    ['Finish', 'Bright Zinc Plated']
                ]
            ],
            [
                'id' => 7,
                'name' => 'Titanium Aerospace Fasteners',
                'category' => 'Aerospace Parts',
                'description' => 'Precision-machined Ti-6Al-4V fasteners designed specifically for aerospace and motorsport weight reduction and strength.',
                'short_description' => 'High strength, ultra-light Grade 5 titanium fasteners certified for aviation and aerospace systems.',
                'image' => 'product-fasteners.png',
                'specs' => [
                    ['Material', 'Titanium Alloy (Grade 5)'],
                    ['Specification', 'AS9100 / NASM'],
                    ['Tensile Strength', '1050 MPa'],
                    ['Weight Reduction', '~45% vs Steel']
                ]
            ],
            [
                'id' => 8,
                'name' => 'Aerospace Precision O-Rings',
                'category' => 'Aerospace Parts',
                'description' => 'Fluorocarbon / Viton O-rings with wide thermal ranges and extreme chemical resistance, certified for aerospace fluid sealing.',
                'short_description' => 'Military and aerospace grade FKM O-rings designed for critical seals in hydraulic systems.',
                'image' => 'product-hydraulics.png',
                'specs' => [
                    ['Material', 'FKM / Fluorocarbon'],
                    ['Specification', 'AMS 7276 / MIL-SPEC'],
                    ['Temperature', '-20°C to +200°C'],
                    ['Application', 'Fuel Systems / Actuators']
                ]
            ],
            [
                'id' => 9,
                'name' => 'Aluminium 6082-T6 Round Bar',
                'category' => 'Raw Materials',
                'description' => 'High-quality structural aluminium bars with excellent machining properties and corrosion resistance. Perfect for CNC milling and lathe work.',
                'short_description' => 'Highly machinable 6082-T6 structural aluminium round bars, cut to size for engineering workshops.',
                'image' => 'hero-engineering.png',
                'specs' => [
                    ['Grade', 'Aluminium 6082-T6'],
                    ['Diameter Range', '12mm – 150mm'],
                    ['Standard', 'BS EN 755'],
                    ['Machinability', 'Excellent']
                ]
            ]
        ])));
    }

    return view('pages.products', compact('products'));
})->name('products');

Route::get('/products/{slug}', function ($slug) {
    try {
        $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
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
