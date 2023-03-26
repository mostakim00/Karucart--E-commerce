<!-- header_section - start -->
@php
    use App\Models\Backend\Category;
    $category = Category::where('status', 1)
        ->orderBy('id', 'DESC')
        ->limit(11)
        ->get();
@endphp
<header
    class="header_section {{ Route::CurrentRouteName() == route('web.home') ? 'header-style-no-collapse' : 'header-style-3' }}">
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6"></div>
                <div class="col col-md-6">
                    <p class="header_hotline">Call us toll free: <strong>{{ $setting->company_phone }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-3 col-md-3 col-sm-12">
                    <div class="brand_logo">
                        <a class="brand_link" href="{{ route('web.home') }}">
                            <img width="200" src="{{ asset('backend/logo/' . $setting->pic) }}"
                                srcset="{{ asset('frontend') }}/images/logo/logo_2x.png 2x" alt>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-12">
                    <form action="{{ Route('search') }}" action="GET">
                        <div class="advance_serach">
                            <div class="select_option mb-0 clearfix">

                                <select name="category">
                                    <option data-display="All Categories" value="allCat"
                                        {{ request('category') == 'allCat' ? 'selected' : '' }}>Select A Category
                                    </option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ request('category') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->category_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form_item">
                                <input type="search" name="product" placeholder="Search Prudcts..."
                                    value="{{ request('product') }}">
                                <button type="submit" class="search_btn"><i class="far fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @php
                    $cartcount = Cart::count();
                @endphp
                <div class="col col-lg-3 col-md-3 col-sm-12">
                    <button class="mobile_menu_btn2 navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </button>
                    <ul class="header_icons_group ul_li_right">
                        <li>
                            <a href="{{ route('wishlistshowpage') }}">
                                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                    viewBox="0 0 24 24" stroke="#051d43" stroke-width="1" stroke-linecap="square"
                                    stroke-linejoin="miter" fill="none" color="#2329D6">
                                    <title>Favourite</title>
                                    <path
                                        d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                                </svg>
                                <span class="wishlist_counter">0</span>
                            </a>
                        </li>
                        <button type="button" class="cart_btn">
                            <li style="list-style: none;">
                                <span class="cart_icon">
                                    <i class="icon icon-ShoppingCart"></i>
                                    <small class="cart_counter">{{ $cartcount }}</small>
                                </span>
                            </li>
                        </button>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-3">
                    <div class="allcategories_dropdown">
                        <button class="allcategories_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#allcategories_collapse" aria-expanded="false"
                            aria-controls="allcategories_collapse">
                            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
                                viewBox="0 0 24 24" aria-labelledby="statsIconTitle" stroke="#000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000">
                                <title id="statsIconTitle">Stats</title>
                                <path d="M6 7L15 7M6 12L18 12M6 17L12 17" />
                            </svg>
                            Browse categories
                        </button>
                        <div class="allcategories_collapse {{ Route::CurrentRouteName() == route('web.home') ? '' : 'collapse' }}"
                            id="allcategories_collapse">
                            <div class="card card-body">
                                <ul class="allcategories_list ul_li_block">
                                    @foreach ($category as $cat)
                                        <li><a href="{{ route('catProduct', $cat->id) }}"><i
                                                    class="fas fa-chevron-right"></i>{{ $cat->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-6">
                    <nav class="main_menu navbar navbar-expand-lg">
                        <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                            <button type="button" class="offcanvas_close">
                                <i class="fal fa-times"></i>
                            </button>
                            <ul class="main_menu_list ul_li">
                                <li><a class="nav-link" href="#">Home</a></li>
                                <li><a class="nav-link" href="{{route('web.aboutus')}}">About us</a></li>
                               <li><a class="nav-link" href="{{route('web.contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="offcanvas_overlay"></div>
                </div>

                <div class="col col-md-3">
                    <ul class="header_icons_group ul_li_right">
                        <li>
                            @if (Auth::check())
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm p-0 m-0 text-lowercase">login</a>
                            @endif
                        </li>

                        <li>
                            <a href="{{ url('/account') }}">
                                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                    viewBox="0 0 24 24" stroke="#051d43" stroke-width="1" stroke-linecap="square"
                                    stroke-linejoin="miter" fill="none" color="#2329D6">
                                    <title id="personIconTitle">Person</title>
                                    <path
                                        d="M4,20 C4,17 8,17 10,15 C11,14 8,14 8,9 C8,5.667 9.333,4 12,4 C14.667,4 16,5.667 16,9 C16,14 13,14 14,15 C16,17 20,17 20,20" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header_section - end -->
