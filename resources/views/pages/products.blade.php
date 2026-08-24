@extends('layouts.app')

@section('title', 'Engineering Products Catalogue — Malfaur Engineering Products')
@section('meta_description', 'Browse the full Malfaur Engineering Products catalogue — cutting tools, measuring equipment, standard parts, aerospace parts and raw materials for UK engineering professionals.')

@section('content')

{{-- ═══════════════════════════════════════
     PAGE HERO
═══════════════════════════════════════ --}}
<section class="page-hero" aria-labelledby="catalogue-heading">
    <div class="page-hero-image" aria-hidden="true">
        <img src="{{ asset('images/hero-engineering.png') }}" alt="" loading="eager">
    </div>
    <div class="container">
        <div class="page-hero-content">
            <nav class="page-hero-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">›</span>
                <span class="current">Products</span>
            </nav>
            <span class="section-label" style="color:var(--accent);">Engineering Products</span>
            <h1 class="display-2" id="catalogue-heading">Product Catalogue</h1>
            <p class="lead">Browse our comprehensive range of precision engineering components and industrial products. All products are available for professional and trade enquiry.</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     FILTER BAR
═══════════════════════════════════════ --}}
<div class="catalogue-filter" role="search" aria-label="Product search and filters">
    <div class="container">
        <div class="filter-row">
            <div class="search-box">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="search" id="product-search" placeholder="Search products..." aria-label="Search products">
            </div>

            <div class="filter-cats" role="group" aria-label="Filter by category">
                <button class="filter-btn active" data-filter="all" id="filter-all">All Products</button>
                <button class="filter-btn" data-filter="Cutting Tools" id="filter-cutting">Cutting Tools</button>
                <button class="filter-btn" data-filter="Measuring Equipment" id="filter-measuring">Measuring Equipment</button>
                <button class="filter-btn" data-filter="Standard Parts" id="filter-standard">Standard Parts</button>
                <button class="filter-btn" data-filter="Aerospace Parts" id="filter-aerospace">Aerospace Parts</button>
                <button class="filter-btn" data-filter="Raw Materials" id="filter-raw">Raw Materials</button>
            </div>

            <button class="filter-clear" id="filter-clear" aria-label="Clear all filters">✕ Clear Filters</button>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     PRODUCT GRID
═══════════════════════════════════════ --}}
<section class="section-pad bg-light" aria-labelledby="products-list-heading">
    <div class="container">
        <p class="products-count" id="products-count" aria-live="polite">9 products found</p>
        <h2 class="sr-only" id="products-list-heading">Products List</h2>

        <div class="product-grid-4">
            @foreach($products as $product)
            <article class="product-card fade-up"
                data-category="{{ $product->category }}"
                data-name="{{ $product->name }}"
                data-desc="{{ $product->description }}"
                data-img="{{ asset(Str::startsWith($product->image ?? '', 'http') ? $product->image : 'images/' . ($product->image ?? 'hero-engineering.png')) }}"
                data-specs='{!! json_encode($product->specs) !!}'>
                <a href="{{ route('products.show', $product->slug) }}" class="product-card-image" aria-label="View details for {{ $product->name }}">
                    <img src="{{ asset(Str::startsWith($product->image ?? '', 'http') ? $product->image : 'images/' . ($product->image ?? 'hero-engineering.png')) }}" alt="{{ $product->name }}" loading="lazy">
                    <span class="product-card-category">{{ $product->category }}</span>
                </a>
                <div class="product-card-body">
                    <h3 class="product-card-name">
                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <p class="product-card-desc">{{ $product->short_description ?? Str::limit($product->description, 100) }}</p>
                    <div class="product-card-footer">
                        @if(!empty($product->specs) && is_array($product->specs) && count($product->specs) > 0)
                            <span class="caption text-muted">{{ $product->specs[0][0] ?? '' }}: {{ $product->specs[0][1] ?? '' }}</span>
                        @else
                            <span class="caption text-muted">Precision Engineered</span>
                        @endif
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-accent-outline" id="cat-product-{{ $product->id }}">View Details</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- No Results Message --}}
        <div id="no-results" style="display:none;" class="no-product">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" style="width:48px;height:48px;margin:0 auto 1rem;color:var(--border);">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <p style="font-size:1.1rem;font-weight:600;color:var(--text-secondary);margin-bottom:0.5rem;">No products match your search</p>
            <p style="font-size:0.9rem;">Try adjusting your search term or clearing the category filter.</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     BOTTOM CTA
═══════════════════════════════════════ --}}
<section class="cta-section" aria-labelledby="products-cta-heading">
    <div class="container">
        <span class="section-label" style="justify-content:center;color:rgba(255,255,255,0.4);">Product Enquiry</span>
        <h2 class="display-2" id="products-cta-heading">Can't Find What You're Looking For?</h2>
        <p>Our team can source a wide range of engineering products beyond what's listed here. Get in touch with your requirements.</p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" id="products-enquire-btn">Send a Product Enquiry</a>
        </div>
    </div>
</section>

{{-- Product Detail Modal --}}
<div class="modal-overlay" id="product-modal" role="dialog" aria-modal="true" aria-labelledby="modal-name">
    <div class="modal-box" style="position:relative;">
        <button class="modal-close" id="modal-close" aria-label="Close product details">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div class="modal-inner">
            <div class="modal-image">
                <img id="modal-img" src="" alt="">
            </div>
            <div class="modal-content">
                <p class="modal-category" id="modal-category"></p>
                <h3 class="modal-name" id="modal-name"></h3>
                <p class="modal-desc" id="modal-desc"></p>
                <div class="modal-specs">
                    <p class="modal-specs-title">Technical Specifications</p>
                    <div id="modal-specs-body"></div>
                </div>
                <div class="modal-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Enquire About This Product</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
