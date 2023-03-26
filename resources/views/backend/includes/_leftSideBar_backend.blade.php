<div class="br-logo"><a href=""><span>[</span>{{ $setting->company_name }}<span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu mt-2">
        <li class="br-menu-item">
            <a href="{{ route('admin.dashboard') }}"
                class="br-menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-ios-home tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        @if (Auth::user()->role['id'] === 3)
        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">PRODUCTS</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('manage.products') }}" class="sub-link">Manage
                            Product</a>
                    </li>
                    <li class="sub-item"><a href="{{ route('add.products') }}" class="sub-link">Add Product</a></li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link {{ Request::is('blank') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-pie-outline tx-24"></i>
                    <span class="menu-item-label">Orders</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link {{ Request::is('blank') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-stats-bars tx-24"></i>
                    <span class="menu-item-label">Earning</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="{{ route('show.allMessage') }}" class="br-menu-link {{ Request::is('blank') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-quote tx-24"></i>
                    <span class="menu-item-label">Product Querries <span class="badge badge-danger">0</span></span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
        @else
            <li class="br-menu-item">
                <a href="{{ route('blank') }}" class="br-menu-link {{ Request::is('blank') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-document tx-24"></i>
                    <span class="menu-item-label">Blank Page</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="{{ route('admin.customer.index') }}"
                    class="br-menu-link {{ Request::is('admin/customer*') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-person-stalker tx-24"></i>
                    <span class="menu-item-label">Customer</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <i class="menu-item-icon icon icon ion-person-stalker tx-20"></i>
                    <span class="menu-item-label">User Manager</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('admin.user.index') }}"
                            class="sub-link {{ Request::is('admin/user') ? 'active' : '' }}">All User</a>
                    </li>
                    @if (Auth::user()->role['id'] === 1)
                        <li class="sub-item"><a href="{{ route('admin.role.index') }}"
                                class="sub-link {{ Request::is('admin/role') ? 'active' : '' }}">All Role</a>
                        </li>
                    @endif
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-grid tx-24"></i>
                    <span class="menu-item-label">Category</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('category.manage') }}" class="sub-link">All Category</a>
                    </li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-grid tx-24"></i>
                    <span class="menu-item-label">Subcategory</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('subcategory.index') }}" class="sub-link">All
                            SubCategory</a>
                    </li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-grid tx-24"></i>
                    <span class="menu-item-label">Slider's</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ Route('createSlider') }}" class="sub-link">Create Slider</a></li>
                    <li class="sub-item"><a href="{{ Route('manageSlider') }}" class="sub-link">Manage Slider</a></li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-grid tx-24"></i>
                    <span class="menu-item-label">Coupon's</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('admin.coupon.create') }}" class="sub-link">Create
                            Coupon</a>
                    </li>
                    <li class="sub-item"><a href="{{ route('admin.coupon.manage') }}" class="sub-link">Manage
                            Coupon</a>
                    </li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">PRODUCTS</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('manage.products.pending') }}" class="sub-link">Manage
                            Product</a>
                    </li>
                    @if(Auth::user()->role_id == 1 && Auth::user()->role_id == 2)
                    <li class="sub-item"><a href="{{ route('all.productlist') }}" class="sub-link">Manage
                            All Product</a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
                      <li class="sub-item"><a href="{{ route('add.products') }}" class="sub-link">Add Product</a></li>
                    @endif
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                    <span class="menu-item-label">User Messages</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('show.allMessage') }}" class="sub-link">All Messages</a>
                    </li>
                </ul>
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="{{ route('setting') }}" class="br-menu-link">
                    <i class="menu-item-icon icon ion-gear-a tx-22"></i>
                    <span class="menu-item-label">Setting</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
        @endif

        <li class="br-menu-item">
            <a href="{{ url('/') }}" class="br-menu-link" target="_blank">
                <i class="menu-item-icon icon ion-help-buoy tx-22"></i>
                <span class="menu-item-label">Live Visit</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="{{ route('admin.logout') }}" class="br-menu-link">
                <i class="menu-item-icon icon ion-power tx-22 text-danger"></i>
                <span class="menu-item-label">Logout</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
    </ul><!-- br-sideleft-menu -->
    <br>
</div><!-- br-sideleft -->
