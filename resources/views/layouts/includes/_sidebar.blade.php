<!-- Role Admin -->
<!-- Left Sidebar -->
@role('admin')
<aside id="leftsidebar" class="sidebar" style="font-family:Poppins;">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <a href="{{route('admin.profile')}}"><img src="https://i.pravatar.cc/150?img=15" width="70" height="70" alt="User" style="text-align: center;" /></a>
        </div>
        <div class="info-container">
            <div class="name" style="text-align: center;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name ?? ''}}</div>
            <div class="email" style="text-align: center;" >{{Auth::user()->email ?? ''}}</div>
        </div>
    </div>
    <!-- #User Info -->

    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
                <a href="{{route('home')}}"> <i class="material-icons">home</i> <span>Dashboard</span> </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"> 
                    <i class="material-icons">create</i> 
                    <span>Posts </span> 
                </a>
                <ul class="ml-menu">
                    <li class="nav-item {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                        <a href="{{route('admin.create.post')}}">
                            <span>Add New Post</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.post')}}">
                            <span>List Posts</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/user *')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">people</i>
                    <span>User </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{route('admin.list.role')}}">
                            <i class="material-icons">people</i>
                            <span>Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.list.permission')}}">
                            <i class="material-icons">people</i>
                            <span>Permission</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/user *')) ? 'active' : '' }}">
                        <a href="{{route('admin.users')}}">
                            <i class="material-icons">people</i>
                            <span>User</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/user *')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.customer')}}">
                            <i class="material-icons">people</i>
                            <span>Customer</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/manage *')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">shopping_basket</i>
                    <span>Manage </span>
                </a>
                <ul class="ml-menu">
                    <li class="nav-item {{ (request()->is('admin/categories*') || request()->is('admin/audio*') || request()->is('admin/products*') ) ? 'active' : '' }}">
                        <a href="{{route('admin.list.category')}}"> <i class="material-icons">bookmark_border</i> <span>Categories </span> </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/products*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.product')}}"> <i class="material-icons">collections</i> <span>Products </span> </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/audio*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.audio')}}"> <i class="material-icons">volume_up</i> <span>Audios </span> </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/banks*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.banks')}}"> <i class="material-icons">account_balance</i> <span>Banks </span> </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/newsletter*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.newsletter')}}"> <i class="material-icons">account_balance</i> <span>Newletter </span> </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"> 
                    <i class="material-icons">add_shopping_cart</i> 
                    <span>Orders </span> 
                </a>
                <ul class="ml-menu">
                    <li class="nav-item {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.order')}}">
                            <i class="material-icons">add_shopping_cart</i>
                            <span>List Order</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/payments*')) ? 'active' : '' }}">
                        <a href="{{route('admin.list.payment')}}">
                            <i class="material-icons">add_shopping_cart</i>
                            <span>Payment Confirmation</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/events*')) ? 'active' : '' }}">
                <a href="{{route('admin.list.event')}}"> <i class="material-icons">today</i> <span>Events </span> </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/logactivity*')) ? 'active' : '' }}">
                <a href="{{route('admin.list.log')}}"> <i class="material-icons">today</i> <span>Log Activity </span> </a>
            </li>
            <li class="nav-item">
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i> <span>Logout </span> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            
        </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 Hoofey
        </div>
        <div class="version">
            <!-- <b>Version: </b> 1.0.0 -->
            <b>CV. Akses Digital</b>
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- End Role Admin -->

@else
<!-- Role Customer -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <a href="{{route('customer.profile')}}"></a><img src="https://i.pravatar.cc/150?img=15" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" style="text-align: center;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name ?? ''}}</div>
            <div class="email" style="text-align: center;" >{{Auth::user()->email ?? ''}}</div>
        </div>
    </div>
    <!-- #User Info -->

    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
                <a href="{{route('home')}}"> <i class="material-icons">home</i> <span>Dashboard</span> </a>
            </li>
            <li class="nav-item {{ (request()->is('customer/orders*')) ? 'active' : '' }}">
                <a href="{{route('customer.list.order')}}"> <i class="material-icons">add_shopping_cart</i> <span>My Orders </span> </a>
            </li>
            <li class="nav-item {{ (request()->is('customer/events*')) ? 'active' : '' }}">
                <a href="{{route('customer.list.event')}}"> <i class="material-icons">library_books</i> <span>My Events </span> </a>
            </li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">input</i><span>Logout</span></a>
            </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
        </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 <a href="javascript:void(0);">{{config('app.name','Wedding App')}}</a>
        </div>
        <div class="version">
            <!-- <b>Version: </b> 1.0.0 -->
            <b>CV. Akses Digital</b>
        </div>
    </div>
    <!-- #Footer -->
</aside>


<!-- End Role Customer -->
@endrole