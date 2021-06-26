<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="javascript:;" id="mobile-menu-toggler">
            @icon('bar-chart-2', 'w-8 h-8 text-white transform -rotate-90')
        </a>
    </div>

    <ul class="border-t border-theme-21 py-5 hidden">
        <li>
            <a href="{{ route('dashboard.index') }}" class="menu {{ (strpos($ROUTE, 'dashboard.index') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('home')</div>
                <div class="menu__title">{{ __('in-sidebar.dashboard') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('domain.index') }}" class="menu {{ (strpos($ROUTE, 'domain.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('box')</div>
                <div class="menu__title">{{ __('in-sidebar.domains') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('subdomain.index') }}" class="menu {{ (strpos($ROUTE, 'subdomain.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('codepen')</div>
                <div class="menu__title">{{ __('in-sidebar.subdomains') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('url.index') }}" class="menu {{ (strpos($ROUTE, 'url.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('globe')</div>
                <div class="menu__title">{{ __('in-sidebar.urls') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('check.index') }}" class="menu {{ (strpos($ROUTE, 'check.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('check-square')</div>
                <div class="menu__title">{{ __('in-sidebar.checks') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('configuration.index') }}" class="menu {{ (strpos($ROUTE, 'configuration.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('settings')</div>
                <div class="menu__title">{{ __('in-sidebar.configuration') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('user.update') }}" class="menu {{ (strpos($ROUTE, 'user.') === 0) ? 'menu--active' : '' }}">
                <div class="menu__icon">@icon('user')</div>
                <div class="menu__title">{{ __('in-sidebar.profile') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('user.logout') }}" class="menu">
                <div class="menu__icon">@icon('toggle-right')</div>
                <div class="menu__title">{{ __('in-sidebar.logout') }}</div>
            </a>
        </li>
    </ul>
</div>