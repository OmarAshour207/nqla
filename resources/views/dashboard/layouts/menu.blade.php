<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left sidebar-p-t bg-dark" data-perfect-scrollbar>
            <div class="sidebar-heading">{{ __('Menu') }}</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item open">
                    <a class="sidebar-menu-button" href="{{ route('dashboard.index', ['type' => 'ticket']) }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text"> {{ __('Dashboard') }} </span>
                    </a>
                </li>

                {{-- Customer Service --}}
                @php
                    $customerSegments = ['orders', 'trucks', 'truck', 'loads', 'users', 'invoices', 'payments'];
                @endphp
                <li class="sidebar-menu-item {{ in_array(request()->segment(2), $customerSegments) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#customers_service">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-user-friends"></i>
                        <span class="sidebar-menu-text"> {{ __('Customer Service') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>

                    <ul class="sidebar-submenu collapse {{ in_array(request()->segment(2), $customerSegments) ? 'show' : '' }}" id="customers_service">
                        <li class="sidebar-menu-item {{ request()->segment(2) == 'orders' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Orders') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'trucks' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('trucks.index') }}">
                                <i class="fa fa-truck-moving"></i>
                                <span class="sidebar-menu-text"> {{ __('Trucks') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(3) == 'types' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('types.index') }}">
                                <i class="fa fa-truck-loading"></i>
                                <span class="sidebar-menu-text"> {{ __('Trucks Types') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'loads' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('loads.index') }}">
                                <i class="fa fa-truck-loading"></i>
                                <span class="sidebar-menu-text"> {{ __('Loads') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'drivers' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('users.index', ['type' => 'admins']) }}">
                                <i class="fa fa-user-shield"></i>
                                <span class="sidebar-menu-text"> {{ __('Admins') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'drivers' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('users.index', ['type' => 'drivers']) }}">
                                <i class="fa fa-user-cog"></i>
                                <span class="sidebar-menu-text"> {{ __('Drivers') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'users' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('users.index') }}">
                                <i class="fa fa-user-friends"></i>
                                <span class="sidebar-menu-text"> {{ __('Users') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Invoices') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Payments') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Service Providers') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $pricingSegments = ['cities', 'prices', 'insurances'];
                @endphp
                {{-- Pricing Settings --}}
                <li class="sidebar-menu-item {{ in_array(request()->segment(2), $pricingSegments) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#pricing_settings">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-money-bill-alt"></i>
                        <span class="sidebar-menu-text"> {{ __('Pricing') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>

                    <ul class="sidebar-submenu collapse {{ in_array(request()->segment(2), $pricingSegments) ? 'show' : '' }}" id="pricing_settings">

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'cities' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('cities.index') }}">
                                <i class="fa fa-building"></i>
                                <span class="sidebar-menu-text"> {{ __('Cities') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Types') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{ request()->segment(2) == 'prices' ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('prices.index') }}">
                                <i class="fa fa-money-bill"></i>
                                <span class="sidebar-menu-text"> {{ __('Pricing') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('insurances.index') }}">
                                <i class="fa fa-clinic-medical"></i>
                                <span class="sidebar-menu-text"> {{ __('Insurance') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Service Providers --}}
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#service_providers">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-globe"></i>
                        <span class="sidebar-menu-text"> {{ __('Service Providers') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="service_providers">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Data') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Financial') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Financial --}}
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#financial">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-globe"></i>
                        <span class="sidebar-menu-text"> {{ __('Financial') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="financial">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('Payment') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Settings --}}
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('settings.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-cog"></i>
                        <span class="sidebar-menu-text"> {{ __('Settings') }} </span>
                    </a>
                </li>

                {{-- Languages --}}
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboard_language">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left fa fa-globe"></i>
                        <span class="sidebar-menu-text"> {{ __('Language') }} </span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="dashboard_language">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('language', 'ar') }}">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('ar') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('language', 'en') }}">
                                <i class="fa fa-flag"></i>
                                <span class="sidebar-menu-text"> {{ __('English') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
