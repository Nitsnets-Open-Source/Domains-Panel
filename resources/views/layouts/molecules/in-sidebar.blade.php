<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('dashboard.index') }}" class="side-menu {{ (strpos($ROUTE, 'dashboard.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('home')</div>
                <div class="side-menu__title">{{ __('in-sidebar.dashboard') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('domain.index') }}" class="side-menu {{ (strpos($ROUTE, 'domain.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('box')</div>
                <div class="side-menu__title">{{ __('in-sidebar.domains') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('subdomain.index') }}" class="side-menu {{ (strpos($ROUTE, 'subdomain.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('codepen')</div>
                <div class="side-menu__title">{{ __('in-sidebar.subdomains') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('url.index') }}" class="side-menu {{ (strpos($ROUTE, 'url.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('globe')</div>
                <div class="side-menu__title">{{ __('in-sidebar.urls') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('check.index') }}" class="side-menu {{ (strpos($ROUTE, 'check.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('check-square')</div>
                <div class="side-menu__title">{{ __('in-sidebar.checks') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('configuration.index') }}" class="side-menu {{ (strpos($ROUTE, 'configuration.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('settings')</div>
                <div class="side-menu__title">{{ __('in-sidebar.configuration') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('user.update') }}" class="side-menu {{ (strpos($ROUTE, 'user.') === 0) ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">@icon('user')</div>
                <div class="side-menu__title">{{ __('in-sidebar.profile') }}</div>
            </a>
        </li>

        <li>
            <a href="{{ route('user.logout') }}" class="side-menu">
                <div class="side-menu__icon">@icon('toggle-right')</div>
                <div class="side-menu__title">{{ __('in-sidebar.logout') }}</div>
            </a>
        </li>
    </ul>
</nav>