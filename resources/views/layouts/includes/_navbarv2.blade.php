<nav
    class="
        navbar
        login
        navbar-expand-lg navbar-light
        d-flex
        justify-content-between
        fixed-top
      ">
    <div id="sidebar-toggler" class="active">
        <span id="sidebar-icon" class="sidebar-toggler-icon">&times;</span>
    </div>
    <div class="user-info-wrapper">
        <div class="user-info dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            @if (auth()->user()->avatar)
                <img src="{{ asset('admin/assets/images/profile/' . auth()->user()->avatar) }}" alt=""
                    style="width: 30px; height: 30px; object-fit: cover; object-position: center; border-radius: 50%">
            @else
                <img src="https://i.pravatar.cc/150?img=15" alt="" width="32" height="32" style="border-radius: 50%" />
            @endif
            <span>{{ auth()->user()->name }}</span>
        </div>
        <div class="dropdown-menu" aria-labelledby="dropdownUser">
            @role('admin')
                <a href="{{ route('admin.profile') }}" class="dropdown-item">Profile</a>
            @else
                <a href="{{ route('customer.profile') }}" class="dropdown-item">Profile</a>
            @endrole
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>
