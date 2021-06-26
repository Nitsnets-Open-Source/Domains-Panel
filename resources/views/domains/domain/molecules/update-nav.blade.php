<div class="box flex items-center px-5">
    <div class="nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start mr-auto" role="tablist">
        <a href="{{ route('domain.update.data', $row->id) }}" class="py-4 sm:mr-8 {{ ($selected === 'data') ? 'active' : '' }}" role="tab">{{ __('domain-update.nav.data') }}</a>
        <a href="{{ route('domain.update.subdomain', $row->id) }}" class="py-4 sm:mr-8 {{ ($selected === 'subdomain') ? 'active' : '' }}" role="tab">{{ __('domain-update.nav.subdomains') }}</a>
        <a href="{{ route('domain.update.url', $row->id) }}" class="py-4 sm:mr-8 {{ ($selected === 'url') ? 'active' : '' }}" role="tab">{{ __('domain-update.nav.urls') }}</a>
        <a href="{{ route('domain.update.check', $row->id) }}" class="py-4 sm:mr-8 {{ ($selected === 'check') ? 'active' : '' }}" role="tab">{{ __('domain-update.nav.checks') }}</a>
    </div>

    @if (isset($row))

    <form action="{{ route('domain.check', $row->id) }}" method="post">
        <input type="hidden" name="_action" value="check" />

        <button class="btn btn-outline-secondary hidden sm:flex">
            @icon('refresh-cw', 'w-4 h-4 mr-2')
            {{ __('domain-update.nav.check') }}
        </button>
    </form>

    @endif
</div>