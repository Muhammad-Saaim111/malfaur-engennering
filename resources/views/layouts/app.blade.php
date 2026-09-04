<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Malfaur Engineering Products — Precision engineering components and industrial products for professional applications across the UK.')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'Malfaur Engineering Products') | UK Engineering Supplier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/malfaur.css') }}">
    @stack('head')
</head>
<body>

    {{-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ --}}
    <header id="site-header">
        <div class="container">
            <div class="header-inner">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="logo" aria-label="Malfaur Engineering Products — Home">
                    <img src="{{ asset('images/logo-transparent.png') }}" class="site-logo" alt="Malfaur Engineering">
                </a>

                {{-- Desktop Navigation --}}
                <nav class="main-nav" role="navigation" aria-label="Main navigation">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <div class="nav-item has-mega-dropdown" id="navProductsItem">
                        <a href="{{ route('products') }}" class="nav-link nav-link-dropdown {{ request()->routeIs('products*') ? 'active' : '' }}" id="navProductsTrigger" aria-haspopup="true" aria-expanded="false">
                            Products
                            <svg class="nav-dropdown-caret" width="9" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Who We Are</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </nav>

                {{-- CTA --}}
                <div class="header-cta">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Enquire Now
                    </a>
                </div>

                {{-- Hamburger --}}
                <button class="hamburger" id="hamburger" aria-label="Toggle navigation" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        {{-- 3-Way Cascading Mega Dropdown --}}
        <div class="products-mega-dropdown" id="productsMegaDropdown" role="region" aria-label="Products Cascade Menu">
            <div class="container mega-container">
                {{-- Top Category Title Link --}}
                <div class="mega-top-bar">
                    <a href="{{ route('products') }}" class="mega-top-link">
                        Products <span class="mega-top-arrow">&gt;</span>
                    </a>
                </div>

                {{-- 3-Way Grid Layout --}}
                <div class="mega-grid">
                    
                    {{-- ── COLUMN 1: CATEGORIES (Level 1) ── --}}
                    <div class="mega-col mega-col-1" role="tablist" aria-label="Product Categories">
                        <div class="mega-col-inner">
                            <a href="{{ route('products') }}?category=Cutting+Tools" class="mega-cat-item" data-cat-id="cutting-tools" role="tab" tabindex="0">
                                <span class="mega-cat-label">
                                    <span class="mega-cat-dot dot-orange"></span>
                                    Cutting Tools
                                </span>
                                <span class="mega-arrow">&gt;</span>
                            </a>

                            <a href="{{ route('products') }}?category=Measuring+Equipment" class="mega-cat-item" data-cat-id="measuring-equipment" role="tab" tabindex="0">
                                <span class="mega-cat-label">
                                    <span class="mega-cat-dot dot-blue"></span>
                                    Measuring Equipment
                                </span>
                                <span class="mega-arrow">&gt;</span>
                            </a>

                            <a href="{{ route('products') }}?category=Standard+Parts" class="mega-cat-item" data-cat-id="standard-parts" role="tab" tabindex="0">
                                <span class="mega-cat-label">
                                    <span class="mega-cat-dot dot-green"></span>
                                    Standard Parts
                                </span>
                                <span class="mega-arrow">&gt;</span>
                            </a>

                            <a href="{{ route('products') }}?category=Aerospace+Parts" class="mega-cat-item" data-cat-id="aerospace-parts" role="tab" tabindex="0">
                                <span class="mega-cat-label">
                                    <span class="mega-cat-dot dot-purple"></span>
                                    Aerospace Parts
                                </span>
                                <span class="mega-arrow">&gt;</span>
                            </a>

                            <a href="{{ route('products') }}?category=Raw+Materials" class="mega-cat-item" data-cat-id="raw-materials" role="tab" tabindex="0">
                                <span class="mega-cat-label">
                                    <span class="mega-cat-dot dot-amber"></span>
                                    Raw Materials
                                </span>
                                <span class="mega-arrow">&gt;</span>
                            </a>
                        </div>
                    </div>

                    {{-- ── COLUMN 2: SUB-CATEGORIES (Level 2) ── --}}
                    <div class="mega-col mega-col-2">
                        <div class="mega-col-inner">
                            
                            {{-- Cutting Tools Subcategories --}}
                            <div class="mega-subcat-panel" data-cat="cutting-tools">
                                <a href="{{ route('products') }}?category=Cutting+Tools" class="mega-subcat-heading-link">
                                    All Cutting Tools
                                </a>
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=reamers" class="mega-subcat-item" data-subcat-id="subcat-reamers">
                                    <span>Reamers &amp; Deburring</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=countersinks" class="mega-subcat-item" data-subcat-id="subcat-countersinks">
                                    <span>Countersinks &amp; Counterbores</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=milling" class="mega-subcat-item" data-subcat-id="subcat-milling">
                                    <span>Parting Off Blades</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                            </div>

                            {{-- Measuring Equipment Subcategories --}}
                            <div class="mega-subcat-panel" data-cat="measuring-equipment">
                                <a href="{{ route('products') }}?category=Measuring+Equipment" class="mega-subcat-heading-link">
                                    All Measuring Equipment
                                </a>
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=micrometers" class="mega-subcat-item" data-subcat-id="subcat-micrometers">
                                    <span>Micrometers &amp; Micrometer Heads</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=inside-measuring" class="mega-subcat-item" data-subcat-id="subcat-inside-measuring">
                                    <span>Inside Measuring Instruments</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-subcat-item" data-subcat-id="subcat-calipers">
                                    <span>Calipers &amp; Height Gauges</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                            </div>

                            {{-- Standard Parts Subcategories --}}
                            <div class="mega-subcat-panel" data-cat="standard-parts">
                                <a href="{{ route('products') }}?category=Standard+Parts" class="mega-subcat-heading-link">
                                    All Standard Parts
                                </a>
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=spring-plungers" class="mega-subcat-item" data-subcat-id="subcat-spring-plungers">
                                    <span>Spring Plungers</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=indexing-plungers" class="mega-subcat-item" data-subcat-id="subcat-indexing-plungers">
                                    <span>Indexing Plungers &amp; Positioning</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=fasteners-bearings" class="mega-subcat-item" data-subcat-id="subcat-fasteners-bearings">
                                    <span>Fasteners &amp; Bearings</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                            </div>

                            {{-- Aerospace Parts Subcategories --}}
                            <div class="mega-subcat-panel" data-cat="aerospace-parts">
                                <a href="{{ route('products') }}?category=Aerospace+Parts" class="mega-subcat-heading-link">
                                    All Aerospace Parts
                                </a>
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=superalloys" class="mega-subcat-item" data-subcat-id="subcat-superalloys">
                                    <span>Superalloys &amp; High-Nickel</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-fittings" class="mega-subcat-item" data-subcat-id="subcat-aero-fittings">
                                    <span>Aviation Fittings &amp; Consumables</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-seals" class="mega-subcat-item" data-subcat-id="subcat-aero-seals">
                                    <span>Aerospace Fasteners &amp; Seals</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                            </div>

                            {{-- Raw Materials Subcategories --}}
                            <div class="mega-subcat-panel" data-cat="raw-materials">
                                <a href="{{ route('products') }}?category=Raw+Materials" class="mega-subcat-heading-link">
                                    All Raw Materials
                                </a>
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=alloy-steels" class="mega-subcat-item" data-subcat-id="subcat-alloy-steels">
                                    <span>Alloy Steels &amp; Tubes</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=aluminium-profiles" class="mega-subcat-item" data-subcat-id="subcat-aluminium-profiles">
                                    <span>Aluminium Profiles &amp; Extrusions</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=sheets-plates" class="mega-subcat-item" data-subcat-id="subcat-sheets-plates">
                                    <span>Sheets, Plates &amp; Foils</span>
                                    <span class="mega-arrow">&gt;</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- ── COLUMN 3: ITEMS / PRODUCTS (Level 3) ── --}}
                    <div class="mega-col mega-col-3">
                        <div class="mega-col-inner">
                            
                            {{-- Cutting Tools - Reamers --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-reamers">
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=reamers" class="mega-leaf-heading-link">
                                    All Reamers &amp; Deburring <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=machine-reamers" class="mega-leaf-link">Machine Reamers</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=deburring-reamers-4103" class="mega-leaf-link">Deburring Reamers</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=frontback-deburrer-90-" class="mega-leaf-link">Front/Back Deburrer 90°</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=machine-reamers" class="mega-leaf-link">Machine Reamers DIN 212</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=machine-reamers" class="mega-leaf-link">High-Precision Chucking Reamers</a></li>
                                </ul>
                            </div>

                            {{-- Cutting Tools - Countersinks --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-countersinks">
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=countersinks" class="mega-leaf-heading-link">
                                    All Countersinks &amp; Counterbores <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=countersinks-90-1326" class="mega-leaf-link">Countersinks 90° Standard</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=90-countersinks-for-tapping-size-holes-" class="mega-leaf-link">90° Countersinks for Tapping Holes</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=counterbores-with-pilots-for-tapping-size-holes-" class="mega-leaf-link">Counterbores with Pilots</a></li>
                                </ul>
                            </div>

                            {{-- Cutting Tools - Parting Off Blades --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-milling">
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=milling" class="mega-leaf-heading-link">
                                    All Parting Off Blades <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=parting-off-blade-26200" class="mega-leaf-link">Parting Off Blade (Series 26200)</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=parting-off-blade-26201" class="mega-leaf-link">Parting Off Blade (Series 26201)</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=parting-off-blade-26202" class="mega-leaf-link">Parting Off Blade (Series 26202)</a></li>
                                    <li><a href="{{ route('products') }}?category=Cutting+Tools&slug=parting-off-blade-26206" class="mega-leaf-link">Parting Off Blade (Series 26206)</a></li>
                                </ul>
                            </div>

                            {{-- Measuring Equipment - Micrometers --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-micrometers">
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=micrometers" class="mega-leaf-heading-link">
                                    All Micrometers <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-quantumike-ip65-coolant-proof-micrometer-293-140-40" class="mega-leaf-link">Mitutoyo QuantuMike IP65 (0-25mm)</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-quantumike-ip65-coolant-proof-micrometer-293-142-40" class="mega-leaf-link">QuantuMike IP65 (50-75mm)</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-high-accuracy-micrometer-mdh-25mc" class="mega-leaf-link">Mitutoyo High-Accuracy MDH-25MC</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=micrometers" class="mega-leaf-link">Precision Outside Micrometers</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=micrometers" class="mega-leaf-link">Micrometer Heads &amp; Stands</a></li>
                                </ul>
                            </div>

                            {{-- Measuring Equipment - Inside Measuring --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-inside-measuring">
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=inside-measuring" class="mega-leaf-heading-link">
                                    All Inside Measuring <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=digital-3-point-internal-micrometer-468-161" class="mega-leaf-link">Digital 3-Point Internal Micrometer</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-digimatic-holtest-set-468-261" class="mega-leaf-link">Mitutoyo Digimatic Holtest Set 0.275-0.5"</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-digimatic-holtest-set-468-978" class="mega-leaf-link">Mitutoyo Digimatic Holtest Set 0.8-2"</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-digimatic-caliper-jaw-inside-micrometer-345-350-30" class="mega-leaf-link">Caliper Jaw Inside Micrometer</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&slug=mitutoyo-interchangeable-measuring-head-8-10mm" class="mega-leaf-link">Interchangeable Measuring Head 8-10mm</a></li>
                                </ul>
                            </div>

                            {{-- Measuring Equipment - Calipers --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-calipers">
                                <a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-heading-link">
                                    All Calipers &amp; Height Gauges <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-link">Digital Vernier Calipers</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-link">Special Purpose Calipers</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-link">Analog Dial Calipers</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-link">Caliper Accessories &amp; Depth Bases</a></li>
                                    <li><a href="{{ route('products') }}?category=Measuring+Equipment&subcat=calipers" class="mega-leaf-link">Linear Height Gauges (LH-600F)</a></li>
                                </ul>
                            </div>

                            {{-- Standard Parts - Spring Plungers --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-spring-plungers">
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=spring-plungers" class="mega-leaf-heading-link">
                                    All Spring Plungers <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-slot-and-ball-standard-spring-force-steel-58-black-oxide" class="mega-leaf-link">Spring Plungers Slot &amp; Ball (Steel 5.8)</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-slot-and-ball-standard-spring-force-long-version-stainless-steel-14305" class="mega-leaf-link">Spring Plungers Long (Stainless 1.4305)</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-slot-and-ball-long-lok-secured-standard-spring-force-stainless-steel-14305" class="mega-leaf-link">LONG-LOK Secured Spring Plungers</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-hexagon-socket-and-thrust-pin-standard-spring-force-stainless-steel-14305" class="mega-leaf-link">Hexagon Socket &amp; Thrust Pin</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-hexagon-socket-and-thrust-pin-standard-spring-force-steel-58-black-oxide-m24" class="mega-leaf-link">Hex Socket Thrust Pin M24</a></li>
                                </ul>
                            </div>

                            {{-- Standard Parts - Indexing Plungers --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-indexing-plungers">
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=indexing-plungers" class="mega-leaf-heading-link">
                                    All Indexing Plungers <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=kipp-precision-indexing-plungers-with-cylindrical-pin-standard-steel-grip-ball-thermoplastic-blackgrey" class="mega-leaf-link">KIPP Precision Indexing Plungers</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=spring-plungers-with-slot-and-thrust-pin-long-lok-secured-standard-spring-force-stainless-steel-14305" class="mega-leaf-link">Slot &amp; Thrust Pin LONG-LOK Plungers</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&slug=stainless-steel-14305" class="mega-leaf-link">Stainless Steel Positioning 1.4305</a></li>
                                </ul>
                            </div>

                            {{-- Standard Parts - Fasteners & Bearings --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-fasteners-bearings">
                                <a href="{{ route('products') }}?category=Standard+Parts&subcat=fasteners-bearings" class="mega-leaf-heading-link">
                                    All Fasteners &amp; Bearings <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&subcat=fasteners-bearings" class="mega-leaf-link">Deep Groove Ball Bearings (DIN 625)</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&subcat=fasteners-bearings" class="mega-leaf-link">High-Tensile Hex Bolts (Grade 8.8 / 10.9)</a></li>
                                    <li><a href="{{ route('products') }}?category=Standard+Parts&subcat=fasteners-bearings" class="mega-leaf-link">Precision Bushings &amp; Retaining Rings</a></li>
                                </ul>
                            </div>

                            {{-- Aerospace Parts - Superalloys --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-superalloys">
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=superalloys" class="mega-leaf-heading-link">
                                    All Superalloys <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=alloy-c-22" class="mega-leaf-link">ALLOY C 22 - Round Bar &amp; Plate</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=inconel-600-round-bar" class="mega-leaf-link">INCONEL® 600 - Round Bar</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=alloy-x" class="mega-leaf-link">ALLOY X - Coil, Tube &amp; Wire</a></li>
                                </ul>
                            </div>

                            {{-- Aerospace Parts - Fittings --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-aero-fittings">
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-fittings" class="mega-leaf-heading-link">
                                    All Aviation Fittings <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=alloy-x-ams-5754ams-5536-fittings" class="mega-leaf-link">ALLOY X AMS 5754 / AMS 5536 Fittings</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=alloy-x-ams-5754ams-5536-thermal-spraying" class="mega-leaf-link">Thermal Spraying Materials</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&slug=alloy-x-ams-5754ams-5536-welding-electrodes" class="mega-leaf-link">AMS 5754 Welding Electrodes</a></li>
                                </ul>
                            </div>

                            {{-- Aerospace Parts - Seals & Fasteners --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-aero-seals">
                                <a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-seals" class="mega-leaf-heading-link">
                                    All Aero Fasteners &amp; Seals <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-seals" class="mega-leaf-link">Titanium Aerospace Fasteners (Grade 5)</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-seals" class="mega-leaf-link">Aerospace Precision O-Rings (FKM)</a></li>
                                    <li><a href="{{ route('products') }}?category=Aerospace+Parts&subcat=aero-seals" class="mega-leaf-link">High-Pressure Hydraulic Seals</a></li>
                                </ul>
                            </div>

                            {{-- Raw Materials - Alloy Steels --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-alloy-steels">
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=alloy-steels" class="mega-leaf-heading-link">
                                    All Alloy Steels &amp; Tubes <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=alloy-steel-hex-bar" class="mega-leaf-link">Alloy Steel Hex Bar</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=alloy-steel-rectangle-bar" class="mega-leaf-link">Alloy Steel Rectangle Bar</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=alloy-steel-streamline-tube" class="mega-leaf-link">Alloy Steel Streamline Tube</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&subcat=alloy-steels" class="mega-leaf-link">Precision Ground Tool Steel</a></li>
                                </ul>
                            </div>

                            {{-- Raw Materials - Aluminium Profiles --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-aluminium-profiles">
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=aluminium-profiles" class="mega-leaf-heading-link">
                                    All Aluminium Profiles <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=all-aluminum-angle" class="mega-leaf-link">All Aluminum Angle</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=aluminum-channel" class="mega-leaf-link">Aluminum Channel</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=aluminum-t-slot" class="mega-leaf-link">Aluminum T-Slot Modular Extrusions</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&subcat=aluminium-profiles" class="mega-leaf-link">Aluminium 6082-T6 Round Bar</a></li>
                                </ul>
                            </div>

                            {{-- Raw Materials - Sheets & Plates --}}
                            <div class="mega-leaf-panel" data-subcat="subcat-sheets-plates">
                                <a href="{{ route('products') }}?category=Raw+Materials&subcat=sheets-plates" class="mega-leaf-heading-link">
                                    All Sheets, Plates &amp; Foils <span class="mega-arrow">&gt;</span>
                                </a>
                                <ul class="mega-leaf-list">
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=aluminum-tread-plate" class="mega-leaf-link">Aluminum Tread Plate (Chequer)</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&slug=aluminum-foil" class="mega-leaf-link">Precision High-Purity Aluminum Foil</a></li>
                                    <li><a href="{{ route('products') }}?category=Raw+Materials&subcat=sheets-plates" class="mega-leaf-link">Structural Ground Aluminium Plate</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    {{-- ── COLUMN 4: FEATURED PRODUCT SPOTLIGHT ── --}}
                    <div class="mega-col mega-col-featured">
                        <div class="mega-col-inner">
                            
                            {{-- Cutting Tools Featured --}}
                            <div class="mega-featured-card" data-cat="cutting-tools">
                                <span class="featured-brand">Malfaur Precision</span>
                                <h4 class="featured-name">Parting Off Blades &amp; Tooling</h4>
                                <a href="{{ route('products') }}?category=Cutting+Tools&subcat=milling" class="featured-link">
                                    High-performance CNC tooling <span class="featured-arrow">&gt;</span>
                                </a>
                                <div class="featured-img-wrap">
                                    <img src="{{ asset('images/product-cutting-tools.png') }}" alt="Parting Off Blades" loading="lazy">
                                </div>
                            </div>

                            {{-- Measuring Equipment Featured (Matches reference image LH-600F / Mitutoyo) --}}
                            <div class="mega-featured-card" data-cat="measuring-equipment">
                                <span class="featured-brand" style="color:#d9381e;">Mitutoyo</span>
                                <h4 class="featured-name">The LH-600F<br>Height Gauge</h4>
                                <a href="{{ route('products.show', 'mitutoyo-quantumike-ip65-coolant-proof-micrometer-293-140-40') }}" class="featured-link">
                                    Easy operation, high-accuracy <span class="featured-arrow">&gt;</span>
                                </a>
                                <div class="featured-img-wrap">
                                    <img src="{{ asset('images/lh-600f-height-gauge.jpg') }}" alt="Mitutoyo LH-600F Height Gauge" loading="lazy">
                                </div>
                            </div>

                            {{-- Standard Parts Featured --}}
                            <div class="mega-featured-card" data-cat="standard-parts">
                                <span class="featured-brand">KIPP Mechanical</span>
                                <h4 class="featured-name">Precision Indexing Plungers</h4>
                                <a href="{{ route('products.show', 'kipp-precision-indexing-plungers-with-cylindrical-pin-standard-steel-grip-ball-thermoplastic-blackgrey') }}" class="featured-link">
                                    German standard components <span class="featured-arrow">&gt;</span>
                                </a>
                                <div class="featured-img-wrap">
                                    <img src="{{ asset('images/product-fasteners.png') }}" alt="Precision Indexing Plungers" loading="lazy">
                                </div>
                            </div>

                            {{-- Aerospace Parts Featured --}}
                            <div class="mega-featured-card" data-cat="aerospace-parts">
                                <span class="featured-brand">Malfaur Aerospace</span>
                                <h4 class="featured-name">INCONEL® 600 Round Bar</h4>
                                <a href="{{ route('products.show', 'inconel-600-round-bar') }}" class="featured-link">
                                    Extreme heat &amp; corrosion alloy <span class="featured-arrow">&gt;</span>
                                </a>
                                <div class="featured-img-wrap">
                                    <img src="{{ asset('images/hero-engineering.png') }}" alt="INCONEL 600 Superalloy" loading="lazy">
                                </div>
                            </div>

                            {{-- Raw Materials Featured --}}
                            <div class="mega-featured-card" data-cat="raw-materials">
                                <span class="featured-brand">Malfaur Materials</span>
                                <h4 class="featured-name">6082-T6 Structural Aluminium</h4>
                                <a href="{{ route('products') }}?category=Raw+Materials" class="featured-link">
                                    Cut to size with mill certs <span class="featured-arrow">&gt;</span>
                                </a>
                                <div class="featured-img-wrap">
                                    <img src="{{ asset('images/hero-engineering.png') }}" alt="Structural Engineering Raw Materials" loading="lazy">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    {{-- Mobile Nav --}}
    <nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation">
        <div class="mobile-nav-links">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            
            {{-- Collapsible Products in Mobile Nav --}}
            <div class="mobile-nav-group">
                <div class="mobile-nav-header-row">
                    <a href="{{ route('products') }}" class="mobile-nav-link {{ request()->routeIs('products*') ? 'active' : '' }}">Products</a>
                    <button type="button" class="mobile-cat-toggle" id="mobileCatToggle" aria-label="Toggle products categories" aria-expanded="false">
                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                            <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <div class="mobile-cat-sublist" id="mobileCatSublist">
                    <a href="{{ route('products') }}?category=Cutting+Tools" class="mobile-sub-link">
                        <span class="mega-cat-dot dot-orange"></span> Cutting Tools
                    </a>
                    <a href="{{ route('products') }}?category=Measuring+Equipment" class="mobile-sub-link">
                        <span class="mega-cat-dot dot-blue"></span> Measuring Equipment
                    </a>
                    <a href="{{ route('products') }}?category=Standard+Parts" class="mobile-sub-link">
                        <span class="mega-cat-dot dot-green"></span> Standard Parts
                    </a>
                    <a href="{{ route('products') }}?category=Aerospace+Parts" class="mobile-sub-link">
                        <span class="mega-cat-dot dot-purple"></span> Aerospace Parts
                    </a>
                    <a href="{{ route('products') }}?category=Raw+Materials" class="mobile-sub-link">
                        <span class="mega-cat-dot dot-amber"></span> Raw Materials
                    </a>
                </div>
            </div>

            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Who We Are</a>
            <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-primary" style="width:100%;justify-content:center;">Enquire Now</a>
    </nav>

    {{-- Page Content --}}
    <main class="page-offset">
        @yield('content')
    </main>

    {{-- ═══════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════ --}}
    <footer id="site-footer">
        <div class="container">
            <div class="footer-grid">

                {{-- Brand --}}
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('images/logo-transparent.png') }}" class="site-logo footer-logo" alt="Malfaur Engineering">
                    </a>
                    <p>Supplying precision engineering components and industrial products to professional customers across the United Kingdom. Quality and reliability at the core of everything we do.</p>
                </div>

                {{-- Navigation --}}
                <div>
                    <p class="footer-col-title">Navigation</p>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Products Catalogue</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">Who We Are</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Products --}}
                <div>
                    <p class="footer-col-title">Products</p>
                    <ul class="footer-links">
                        <li><a href="{{ route('products') }}" class="footer-link">Bearings &amp; Bushings</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Hydraulic Components</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Fasteners &amp; Fixings</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Pneumatic Systems</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Cutting Tools</a></li>
                        <li><a href="{{ route('products') }}" class="footer-link">Measurement &amp; Gauging</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <p class="footer-col-title">Contact</p>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>United Kingdom<br><em style="font-style:normal;color:rgba(255,255,255,0.3)">Address to be confirmed</em></span>
                    </div>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>enquiries@malfaurengineering.co.uk</span>
                    </div>
                    <div class="footer-contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+44 (0) 000 000 0000</span>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <p class="footer-copy">&copy; {{ date('Y') }} Malfaur Engineering Products Ltd. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms &amp; Conditions</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/malfaur.js') }}"></script>
    @stack('scripts')
</body>
</html>
