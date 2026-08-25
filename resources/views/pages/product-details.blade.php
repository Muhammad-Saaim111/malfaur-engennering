@extends('layouts.app')

@section('title', $product->name . ' — Malfaur Engineering Products')
@section('meta_description', Str::limit($product->description, 150))

@section('content')

{{-- Breadcrumbs & Back --}}
<div class="bg-light" style="border-bottom: 1px solid var(--border); padding: 1rem 0;">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center;">
        <nav class="page-hero-breadcrumb" aria-label="Breadcrumb" style="margin-bottom:0;">
            <a href="{{ route('home') }}" style="color:var(--text-secondary);">Home</a>
            <span aria-hidden="true">›</span>
            <a href="{{ route('products') }}" style="color:var(--text-secondary);">Products</a>
            <span aria-hidden="true">›</span>
            <span class="current" style="color:var(--text-primary); font-weight:600;">{{ $product->name }}</span>
        </nav>
        <a href="{{ route('products') }}" class="btn btn-sm btn-outline" style="padding:0.4rem 1rem;">
            ← Back to Catalogue
        </a>
    </div>
</div>

{{-- Product details area --}}
<section class="section-pad">
    <div class="container">
        <div class="contact-grid" style="grid-template-columns: 1fr 1.2fr; gap: 4rem;">
            
            {{-- Left column: Image & certs --}}
            <div class="fade-up">
                <div style="background:#ffffff; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 2rem; display:flex; align-items:center; justify-content:center; aspect-ratio:1; box-shadow: var(--shadow-sm); overflow:hidden;">
                    <img src="{{ asset(Str::startsWith($product->image ?? '', 'http') ? $product->image : 'images/' . ($product->image ?? 'hero-engineering.png')) }}" 
                         alt="{{ $product->name }}" 
                         style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain;">
                </div>
                
                {{-- Engineering Certification badging --}}
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 1.5rem;">
                    <div style="background:var(--lighter-bg); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 1rem; text-align:center;">
                        <span style="font-size:0.65rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:0.25rem;">Standard</span>
                        <strong style="font-size:0.9rem; color:var(--navy);">DIN / ISO Certified</strong>
                    </div>
                    <div style="background:var(--lighter-bg); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 1rem; text-align:center;">
                        <span style="font-size:0.65rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:0.25rem;">Quality Control</span>
                        <strong style="font-size:0.9rem; color:var(--navy);">AS9100 Compliant</strong>
                    </div>
                </div>
            </div>

            {{-- Right column: Product specs & overview --}}
            <div class="fade-up fade-up-delay-2" style="display:flex; flex-direction:column; justify-content:flex-start;">
                <span class="section-label" style="margin-bottom:0.5rem;">{{ $product->category }}</span>
                <h1 class="display-2" style="color:var(--navy); font-weight:800; margin-bottom:1rem; line-height:1.2;">{{ $product->name }}</h1>
                <span class="divider-accent" style="margin: 0 0 1.5rem 0;"></span>

                <p class="body-lg" style="color:var(--text-secondary); margin-bottom:2rem; line-height:1.8;">
                    {{ $product->description }}
                </p>


                {{-- Action buttons --}}
                <div style="display:flex; gap: 1rem; flex-wrap:wrap; margin-top:auto;">
                    <a href="{{ route('contact', ['product' => $product->name]) }}" class="btn btn-primary btn-lg" style="flex:1; justify-content:center; min-width:200px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Request Quote / Enquiry
                    </a>
                    <a href="mailto:enquiries@malfaurengineering.co.uk?subject=Technical Enquiry: {{ rawurlencode($product->name) }}" class="btn btn-outline btn-lg" style="flex:1; justify-content:center; min-width:180px;">
                        Email Specifications
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Material Suitability / ISO Badges --}}
@if(isset($product->specifications['P_state']) || isset($product->specifications['M_state']) || isset($product->specifications['K_state']) || isset($product->specifications['N_state']) || isset($product->specifications['S_state']) || isset($product->specifications['H_state']))
<section class="section-pad bg-light" style="border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
    <div class="container">
        <div style="margin-bottom:2rem;">
            <span class="section-label">Performance</span>
            <h2 class="heading-1" style="color:var(--navy);">Material Suitability &amp; Application</h2>
            <p style="color:var(--text-secondary); margin-top:0.25rem;">Standard ISO cutting material application classifications for this tooling.</p>
        </div>

        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 1.25rem;">
            @php
                $isoLetters = [
                    'P' => ['label' => 'Steel / Carbon Steel', 'color' => '#ffffff', 'bg' => '#0092D8'],
                    'M' => ['label' => 'Stainless Steel', 'color' => '#000000', 'bg' => '#ffd800'],
                    'K' => ['label' => 'Cast Iron', 'color' => '#ffffff', 'bg' => '#E30613'],
                    'N' => ['label' => 'Non-Ferrous / Al', 'color' => '#ffffff', 'bg' => '#009640'],
                    'S' => ['label' => 'Exotics / Titanium', 'color' => '#ffffff', 'bg' => '#FF5F00'],
                    'H' => ['label' => 'Hardened Steel', 'color' => '#ffffff', 'bg' => '#7D7D7D']
                ];
            @endphp

            @foreach($isoLetters as $letter => $meta)
                @if(isset($product->specifications[$letter . '_state']))
                    @php $state = $product->specifications[$letter . '_state']; @endphp
                    <div style="background:#ffffff; border:1px solid var(--border); border-radius:var(--radius-md); padding:1.25rem; display:flex; flex-direction:column; align-items:center; text-align:center; box-shadow:var(--shadow-sm);">
                        <span style="display:inline-flex; width:44px; height:44px; border-radius:50%; align-items:center; justify-content:center; font-size:1.4rem; font-weight:800; background:{{ $meta['bg'] }}; color:{{ $meta['color'] }}; margin-bottom:0.75rem;">
                            {{ $letter }}
                        </span>
                        <strong style="font-size:0.875rem; color:var(--text-primary); display:block; margin-bottom:0.25rem;">{{ $meta['label'] }}</strong>
                        <span style="font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.02em; padding:0.2rem 0.6rem; border-radius:3px;
                            @if($state == 'optimal')
                                background:#dcfce7; color:#15803d;
                            @else
                                background:#f3f4f6; color:#4b5563;
                            @endif
                        ">
                            {{ $state == 'optimal' ? 'Optimal Choice' : 'Suitable' }}
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Full Width Technical Specifications Table --}}
@if(count($product->specs) > 0)
<section class="section-pad bg-white">
    <div class="container">
        <div style="margin-bottom:2rem;">
            <span class="section-label">Specifications</span>
            <h2 class="heading-1" style="color:var(--navy); margin-bottom:0;">Technical Specifications</h2>
        </div>
        <div style="overflow-x:auto; border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-sm); background:#ffffff;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.95rem;">
                <tbody>
                    @foreach($product->specs as $index => $spec)
                        <tr style="border-bottom: 1px solid var(--border); background: {{ $index % 2 == 0 ? '#ffffff' : 'var(--lighter-bg)' }}; transition: background 0.2s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='{{ $index % 2 == 0 ? '#ffffff' : 'var(--lighter-bg)' }}'">
                            <th style="padding: 1.2rem 1.5rem; color: var(--navy); font-weight: 700; width: 35%; border-right: 1px solid var(--border); text-transform: uppercase; letter-spacing: 0.03em; font-size: 0.85rem;">
                                {{ $spec[0] }}
                            </th>
                            <td style="padding: 1.2rem 1.5rem; color: var(--text-primary); line-height: 1.6; white-space: pre-wrap;">{{ $spec[1] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

{{-- Dimension Image --}}
@if(isset($product->specifications['dimension_image']))
<section class="section-pad" style="padding-bottom: 0;">
    <div class="container">
        <div style="margin-bottom:2rem;">
            <span class="section-label">Dimensions</span>
            <h2 class="heading-1" style="color:var(--navy); margin-bottom:0;">Technical Drawings</h2>
        </div>
        <div style="background:#ffffff; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2rem; display:flex; justify-content:center; box-shadow: var(--shadow-sm); overflow-x: auto;">
            <img src="{{ $product->specifications['dimension_image'] }}" alt="Dimension drawing for {{ $product->name }}" style="max-width:100%; height:auto; image-rendering: crisp-edges; mix-blend-mode: multiply;">
        </div>
    </div>
</section>
@endif

{{-- Dimensions & Variant Table --}}
@if(isset($product->specifications['dimensions']) && is_array($product->specifications['dimensions']) && count($product->specifications['dimensions']) > 0)
<section class="section-pad">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; flex-wrap:wrap; gap:1rem;">
            <div style="margin-bottom:0;">
                <span class="section-label">Specifications</span>
                <h2 class="heading-1" style="color:var(--navy); margin-bottom:0;">Available Dimensions &amp; Variants</h2>
                <p style="color:var(--text-secondary); margin-top:0.25rem;">Select from our standard stock dimensions below. Custom dimensions can be manufactured to order.</p>
            </div>
            <div style="position:relative; width:100%; max-width:320px; margin-top: 0.5rem;">
                <input type="text" id="dimensions-search" placeholder="Search SKU, Shank, Dia..." style="width:100%; padding:0.65rem 1rem 0.65rem 2.5rem; border:1px solid var(--border); border-radius:var(--radius-sm); font-size:0.875rem; color:var(--text-primary); outline:none; background:#ffffff; box-shadow: var(--shadow-2xs); transition: border-color 0.2s;" aria-label="Search dimensions">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position:absolute; left:0.85rem; top:50%; transform:translateY(-50%); width:16px; height:16px; color:var(--text-muted); pointer-events:none;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <div style="overflow-x:auto; border: 1px solid var(--border); border-radius: var(--radius-md) var(--radius-md) 0 0; box-shadow: var(--shadow-sm); background:#ffffff;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;" id="dimensions-table">
                <thead>
                    @php
                        $firstRow = $product->specifications['dimensions'][0];
                        $headers = array_keys($firstRow);
                    @endphp
                    <tr style="background: var(--navy); color: var(--white); font-weight: 600; border-bottom: 2px solid var(--border);">
                        @foreach($headers as $header)
                            <th style="padding: 0.9rem 1.2rem; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.05em;">{{ $header }}</th>
                        @endforeach
                        <th style="padding: 0.9rem 1.2rem; font-size:0.8rem; text-transform:uppercase; letter-spacing:0.05em; text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->specifications['dimensions'] as $index => $row)
                        <tr class="dimension-row" style="border-bottom: 1px solid var(--border); transition: background 0.2s; background: {{ $index % 2 == 0 ? '#ffffff' : 'var(--lighter-bg)' }};" onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='{{ $index % 2 == 0 ? '#ffffff' : 'var(--lighter-bg)' }}'">
                            @foreach($headers as $header)
                                <td style="padding: 0.8rem 1.2rem; color: var(--text-primary); font-weight: {{ $header == 'SKU' ? '600' : '400' }};">
                                    {{ $row[$header] }}
                                </td>
                            @endforeach
                            <td style="padding: 0.8rem 1.2rem; text-align:right;">
                                <a href="{{ route('contact', ['product' => $product->name, 'sku' => $row['SKU']]) }}" style="color:var(--accent); font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:0.25rem; font-size:0.825rem;">
                                    Enquire →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Bar --}}
        <div style="display:flex; justify-content:space-between; align-items:center; padding:1.25rem 1.5rem; background:#ffffff; border:1px solid var(--border); border-top:none; border-radius: 0 0 var(--radius-md) var(--radius-md); font-size:0.875rem; box-shadow: var(--shadow-sm); flex-wrap:wrap; gap:1rem;">
            <span style="color:var(--text-secondary);" id="pagination-info">Showing 1 to 10 of 0 entries</span>
            <div style="display:flex; gap:0.25rem; align-items:center;" id="pagination-buttons">
                <!-- Buttons will be generated by JS -->
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const allRows = Array.from(document.querySelectorAll('.dimension-row'));
    const searchInput = document.getElementById('dimensions-search');
    const rowsPerPage = 10;
    let currentPage = 1;
    let filteredRows = [...allRows];

    function showPage(page) {
        currentPage = page;
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // Hide all rows first
        allRows.forEach(row => row.style.display = 'none');

        // Show only matching filtered rows for the current page
        filteredRows.forEach((row, index) => {
            if (index >= start && index < end) {
                row.style.display = '';
            }
        });

        // Update info text
        const infoSpan = document.getElementById('pagination-info');
        if (filteredRows.length === 0) {
            infoSpan.innerHTML = 'No matching entries found';
        } else {
            const actualEnd = Math.min(end, filteredRows.length);
            infoSpan.innerHTML = `Showing <strong>${start + 1}</strong> to <strong>${actualEnd}</strong> of <strong>${filteredRows.length}</strong> entries`;
        }

        renderButtons(totalPages);
    }

    function renderButtons(totalPages) {
        const container = document.getElementById('pagination-buttons');
        container.innerHTML = '';

        if (totalPages <= 1) return;

        // Previous button
        const prevBtn = document.createElement('button');
        prevBtn.innerText = 'Previous';
        prevBtn.disabled = currentPage === 1;
        styleButton(prevBtn, currentPage === 1);
        prevBtn.addEventListener('click', () => {
            if (currentPage > 1) showPage(currentPage - 1);
        });
        container.appendChild(prevBtn);

        // Page number buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.innerText = i;
            const isActive = i === currentPage;
            styleButton(pageBtn, false, isActive);
            pageBtn.addEventListener('click', () => showPage(i));
            container.appendChild(pageBtn);
        }

        // Next button
        const nextBtn = document.createElement('button');
        nextBtn.innerText = 'Next';
        nextBtn.disabled = currentPage === totalPages;
        styleButton(nextBtn, currentPage === totalPages);
        nextBtn.addEventListener('click', () => {
            if (currentPage < totalPages) showPage(currentPage + 1);
        });
        container.appendChild(nextBtn);
    }

    function styleButton(btn, disabled, active) {
        btn.style.padding = '0.35rem 0.75rem';
        btn.style.fontSize = '0.8rem';
        btn.style.fontWeight = '600';
        btn.style.border = '1px solid var(--border)';
        btn.style.borderRadius = '3px';
        btn.style.cursor = disabled ? 'not-allowed' : 'pointer';
        btn.style.margin = '0 0.1rem';
        
        if (active) {
            btn.style.background = 'var(--navy)';
            btn.style.color = '#ffffff';
            btn.style.borderColor = 'var(--navy)';
        } else if (disabled) {
            btn.style.background = '#f3f4f6';
            btn.style.color = '#9ca3af';
            btn.style.borderColor = 'var(--border)';
        } else {
            btn.style.background = '#ffffff';
            btn.style.color = 'var(--text-secondary)';
            btn.style.borderColor = 'var(--border)';
            
            // Hover effect
            btn.onmouseenter = () => {
                btn.style.borderColor = 'var(--navy)';
                btn.style.color = 'var(--navy)';
            };
            btn.onmouseleave = () => {
                btn.style.borderColor = 'var(--border)';
                btn.style.color = 'var(--text-secondary)';
            };
        }
    }

    // Real-time search filter handler
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const term = searchInput.value.toLowerCase().trim();
            
            if (term === '') {
                filteredRows = [...allRows];
            } else {
                filteredRows = allRows.filter(row => {
                    return Array.from(row.querySelectorAll('td')).some(td => {
                        return td.textContent.toLowerCase().includes(term);
                    });
                });
            }
            
            showPage(1);
        });
    }

    // Initialize
    if (allRows.length > 0) {
        showPage(1);
    }
});
</script>
@endif

{{-- Related Products --}}
@if($relatedProducts->count() > 0)
<section class="section-pad bg-light" style="border-top:1px solid var(--border);">
    <div class="container">
        <div style="margin-bottom:2.5rem;">
            <span class="section-label">Related</span>
            <h2 class="heading-1" style="color:var(--navy);">Related Products</h2>
        </div>

        <div class="product-grid">
            @foreach($relatedProducts as $relProduct)
                <article class="product-card" style="background:#ffffff;">
                    <div class="product-card-image">
                        <img src="{{ asset(Str::startsWith($relProduct->image ?? '', 'http') ? $relProduct->image : 'images/' . ($relProduct->image ?? 'hero-engineering.png')) }}" alt="{{ $relProduct->name }}" loading="lazy">
                        <span class="product-card-category">{{ $relProduct->category }}</span>
                    </div>
                    <div class="product-card-body">
                        <h3 class="product-card-name" style="font-size:0.95rem;">{{ $relProduct->name }}</h3>
                        <p class="product-card-desc" style="font-size:0.8rem; margin-bottom:1rem;">{{ Str::limit($relProduct->description, 70) }}</p>
                        <div class="product-card-footer">
                            <span class="caption text-muted" style="font-size:0.65rem;">Precision Component</span>
                            <a href="{{ route('products.show', $relProduct->slug) }}" class="btn btn-sm btn-accent-outline">
                                View Details
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
