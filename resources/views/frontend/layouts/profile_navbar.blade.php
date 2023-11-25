<ul class="nav nav-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ request()->segment('1') == 'profile' ? 'active' : '' }}" aria-current="page" href="{{ route('user.profile') }}">
            {{ __('Profile Info') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment('1') == 'change' ? 'active' : '' }}" href="{{ route('user.change.pwd') }}">
            {{ __('Change Password') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment('1') == 'orders' ? 'active' : '' }}" href="{{ route('user.orders.create') }}">
            {{ __('Orders') }}
        </a>
    </li>
</ul>
