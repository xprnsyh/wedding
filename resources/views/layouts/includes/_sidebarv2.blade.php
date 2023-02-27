@role('admin')
    <aside>
        <div id="sidebar-wrapper" class="active">
            <div class="sidebar-head">
                <div class="sidebar-brand text-center mt-1">
                    <img src="{{ asset('admin/assets/dashboard/images/logo.svg') }}" width="100" alt="" />
                </div>
            </div>
            <div class="sidebar-body">
                <a href="{{ route('home') }}" class="menu-link">
                    <div id="menu-home" class="menu {{ request()->is('home*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('home*') ? 'admin/assets/dashboard/icons/dashboard/home-active.svg' : 'admin/assets/dashboard/icons/dashboard/home.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>Home</span>
                    </div>
                </a>
                <a href="{{ route('admin.list.order') }}" class="menu-link">
                    <div id="menu-orders" class="menu {{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('admin/orders*') ? 'admin/assets/dashboard/icons/dashboard/orders-active.svg' : 'admin/assets/dashboard/icons/dashboard/orders.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>My Orders</span>
                    </div>
                </a>
                <a href="{{ route('admin.list.event') }}" class="menu-link">
                    <div id="menu-events" class="menu {{ request()->is('admin/events*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('admin/events*') ? 'admin/assets/dashboard/icons/dashboard/guestbooks-active.svg' : 'admin/assets/dashboard/icons/dashboard/guestbooks.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>My Events</span>
                    </div>
                </a>
                <a href="{{ route('admin.settings') }}" class="menu-link">
                    <div id="menu-settings"
                        class="menu {{ request()->is('admin/payments*') || request()->is('admin/banks*') || request()->is('admin/categories*') || request()->is('admin/audio*') || request()->is('admin/products*') || request()->is('admin/user*') || request()->is('admin/post*') || request()->is('admin/settings*') || request()->is('admin/newsletter*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('admin/payments*') || request()->is('admin/banks*') || request()->is('admin/categories*') || request()->is('admin/audio*') || request()->is('admin/products*') || request()->is('admin/user*') || request()->is('admin/post*') || request()->is('admin/settings*') || request()->is('admin/newsletter*') ? 'admin/assets/dashboard/icons/dashboard/settings-active.svg' : 'admin/assets/dashboard/icons/dashboard/settings.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>Settings</span>
                    </div>
                </a>
                <a href="{{ route('admin.list.log') }}" class="menu-link">
                    <div id="menu-logs" class="menu {{ request()->is('admin/logactivity*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('admin/logactivity*') ? 'admin/assets/dashboard/icons/dashboard/settings-active.svg' : 'admin/assets/dashboard/icons/dashboard/settings.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>Log Activity</span>
                    </div>
                </a>
            </div>
        </div>
    </aside>
@else
    <aside>
        <div id="sidebar-wrapper" class="active">
            <div class="sidebar-head">
                <div class="sidebar-brand text-center mt-1">
                    <img src="{{ asset('admin/assets/dashboard/images/logo.svg') }}" width="100" alt="" />
                </div>
            </div>
            <div class="sidebar-body">
                <a href="{{ route('home') }}" class="menu-link">
                    <div id="menu-home" class="menu {{ request()->is('home*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('home*') ? 'admin/assets/dashboard/icons/dashboard/home-active.svg' : 'admin/assets/dashboard/icons/dashboard/home.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>Home</span>
                    </div>
                </a>
                <a href="{{ route('customer.list.order') }}" class="menu-link">
                    <div id="menu-orders" class="menu {{ request()->is('customer/orders*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('customer/orders*') ? 'admin/assets/dashboard/icons/dashboard/orders-active.svg' : 'admin/assets/dashboard/icons/dashboard/orders.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>My Orders</span>
                    </div>
                </a>
                <a href="{{ route('customer.list.event') }}" class="menu-link">
                    <div id="menu-events" class="menu {{ request()->is('customer/events*') ? 'active' : '' }}">
                        <object oa-reusable-svg
                            data="{{ asset(request()->is('customer/events*') ? 'admin/assets/dashboard/icons/dashboard/guestbooks-active.svg' : 'admin/assets/dashboard/icons/dashboard/guestbooks.svg') }}"
                            type="image/svg+xml" class="home-icon" height="25" width="25"></object>
                        <span>My Events</span>
                    </div>
                </a>
            </div>
        </div>
    </aside>
@endrole
